<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\accommodationareaModel;
use App\Models\roomsModel;
use App\Http\Controllers\console;

use Illuminate\Support\Facades\Auth;

class AdressController extends Controller
{
    public function insertAddress(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {

            $id = Auth::id();

            $request->validate([
                'specifically' => 'required',
                'city' => 'required',
                'district' => 'required',
                'commune' => 'required',
            ]);

            $specifically = $request->input('specifically');
            $city = $request->input('city');
            $district = $request->input('district');
            $commune = $request->input('commune');

            $address = new accommodationareaModel();
            $address->idUser = $id; // Associate the user with the address
            $address->city = $city;
            $address->districts = $district;
            $address->wardsCommunes = $commune;
            $address->streetAddress = $specifically;

            $saved = $address->save();

            if ($saved) {
                return redirect()->route('insertAddress')->with('success', true);
            } else {
                return redirect()->route('insertAddress')->with('error', true);
            }
        } else {
            return redirect()->route('pageLogin');
        }
    }
   
    
    public function getAddress(Request $request)
    {
        // Get the authenticated user's ID
        $id = Auth::id();
    
        // Retrieve address data from the database for the authenticated user
        $dbData = DB::table('accommodationarea')
            ->select('id', 'idUser', 'city', 'districts', 'wardsCommunes', 'streetAddress')
            ->where('idUser', $id)
            ->get();
    
        // Load JSON data
        $jsonData = json_decode(file_get_contents('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json'), true);
    
        // Create an array to store the combined data
        $combinedData = [];
    
        // Iterate through the database data
        foreach ($dbData as $row) {
            $cityId = $row->city;
            $idUser = $row->idUser;
            $districtId = $row->districts;
            $wardCommuneId = $row->wardsCommunes;
    
            // Find the corresponding names from JSON
            $cityName = $this->findNameById($jsonData, $cityId);
            $districtName = $this->findDistrictNameById($jsonData, $cityId, $districtId);
            $wardCommuneName = $this->findWardCommuneNameById($jsonData, $cityId, $districtId, $wardCommuneId);
    
            // Add the extracted data to the combined array
            $combinedData[] = [
                'id' => $row->id,
                'idUser' => $idUser,
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row->streetAddress,
            ];
        }
    
        // Return the combined data as JSON
        return view('admin.addAddress', ['combinedData' => $combinedData]);
    }
    

    
    // Hàm tìm tên thành phố dựa trên ID từ JSON
    private function findNameById($jsonData, $id) {
        foreach ($jsonData as $entry) {
            if ($entry['Id'] === $id) {
                return $entry['Name'];
            }
        }
        return 'Không tìm thấy';
    }

    // Hàm tìm tên quận huyện dựa trên ID từ JSON
    private function findDistrictNameById($jsonData, $cityId, $districtId) {
        foreach ($jsonData as $entry) {
            if ($entry['Id'] === $cityId) {
                foreach ($entry['Districts'] as $district) {
                    if ($district['Id'] === $districtId) {
                        return $district['Name'];
                    }
                }
            }
        }
        return 'Không tìm thấy';
    }

// Hàm tìm tên phường xã dựa trên ID từ JSON
    private function findWardCommuneNameById($jsonData, $cityId, $districtId, $wardCommuneId) {
        foreach ($jsonData as $entry) {
            if ($entry['Id'] === $cityId) {
                foreach ($entry['Districts'] as $district) {
                    if ($district['Id'] === $districtId) {
                        foreach ($district['Wards'] as $ward) {
                            if ($ward['Id'] === $wardCommuneId) {
                                return $ward['Name'];
                            }
                        }
                    }
                }
            }
        }
        return 'Không tìm thấy';
    }

    public function editAddress(Request $request, $id) {
        // Lấy đối tượng accommodationareaModel dựa trên ID
        $idAddress = accommodationareaModel::find($id);
    
        // Kiểm tra xem đối tượng có tồn tại không
        if (!$idAddress) {
            return response()->json(['error' => 'Không tồn tại'], 404);
        }
    
        // Lấy dữ liệu từ cơ sở dữ liệu dựa trên ID
        $importProducts = DB::table('accommodationarea')
            ->select('id', 'idUser', 'city', 'districts', 'wardsCommunes', 'streetAddress')
            ->where('id', $idAddress->id)
            ->get();
    
        // Check if the collection is empty and set the specifically value
        $specifically = $importProducts->isEmpty() ? '' : $importProducts[0]->streetAddress;
    
        // Access the id of the first item in the collection
        $firstItemId = $importProducts->first()->id;
    
        // Pass the variables to the view
        return view('admin.editAddress', [
            'specifically' => $specifically,
            'importProducts' => $importProducts,
            'firstItemId' => $firstItemId
        ]);
    }
    
    public function updateAddress(Request $request, $id) {
        // Check if the user is authenticated
        if (Auth::check()) {
            $idUser = Auth::id();
            $request->validate([
                'specifically' => 'required',
                'city' => 'required',
                'district' => 'required',
                'commune' => 'required',
            ]);
    
            // Find the user's address by their ID
            $userAddress = AccommodationAreaModel::find($id);
    
            // Update the address fields
            $userAddress->idUser  = $idUser;
            $userAddress->city = $request->input('city');
            $userAddress->districts = $request->input('district');
            $userAddress->wardsCommunes = $request->input('commune');
            $userAddress->streetAddress = $request->input('specifically');
    
            $saved = $userAddress->save();
    
            if ($saved) {
                // Redirect with success message
                return redirect()->route('addAddres')->with('successUpdelete', true);
            } else {
                // Redirect with error message
                return redirect()->route('editAddress')->with('error', true);
            }
        } else {
            // User is not authenticated, redirect to login page
            return redirect()->route('pageLogin');
        }
    }
    public function deleteAddress($id) {
        if (Auth::check()) {
            // Tìm địa chỉ của người dùng dựa trên ID
            $userAddress = accommodationareaModel::find($id);
    
            // Kiểm tra xem địa chỉ có tồn tại không
            if ($userAddress) {
                // Kiểm tra xem địa chỉ có đang được sử dụng bởi phòng không
                $isAddressInUse = roomsModel::where('idAccommodationArea', $id)->exists();
     
                if ($isAddressInUse) {
                    // Nếu địa chỉ đang được sử dụng, trả về thông báo lỗi
                    return redirect()->route('addAddres')->with('errorDelete', true);
                } else {
                    // Xóa địa chỉ
                    $userAddress->delete();
                    // Chuyển hướng với thông báo thành công
                    return redirect()->route('addAddres')->with('successDelete', true);
                }
            } else {
                // Nếu địa chỉ không tồn tại, trả về thông báo lỗi
                return redirect()->route('addAddres')->with('errorDelete', true);
            }
        } else {
            // Người dùng chưa xác thực, chuyển hướng đến trang đăng nhập
            return redirect()->route('pageLogin');
        }
    }    
    
}