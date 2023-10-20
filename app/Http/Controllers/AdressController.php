<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\accommodationareaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        // Lấy dữ liệu từ cơ sở dữ liệu
        $dbData = DB::table('accommodationarea')->select('id', 'city', 'districts', 'wardsCommunes', 'streetAddress')->get();

        // Lấy dữ liệu từ JSON
        $jsonData = json_decode(file_get_contents('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json'), true);

        // Tạo một mảng kết hợp để lưu dữ liệu đã trích xuất
        $combinedData = [];

        // Duyệt qua dữ liệu từ cơ sở dữ liệu
        foreach ($dbData as $row) {
            $cityId = $row->city;
            $districtId = $row->districts;
            $wardCommuneId = $row->wardsCommunes;

            // Tìm tên tương ứng từ JSON
            $cityName = $this->findNameById($jsonData, $cityId);
            $districtName = $this->findDistrictNameById($jsonData, $cityId, $districtId);
            $wardCommuneName = $this->findWardCommuneNameById($jsonData, $cityId, $districtId, $wardCommuneId);

            // Thêm dữ liệu đã trích xuất vào mảng kết hợp
            $combinedData[] = [
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row->streetAddress,
            ];
        }

        return view('admin.addAddress', compact('combinedData'));
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

    public function updateAddress(Request $request) {}
}