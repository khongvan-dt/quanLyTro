<?php

    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\DB;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\accommodationareaModel;
    use App\Models\roomsModel;
    use App\Models\serviceModel;
    use App\Models\serviceFeeSummaryModel;
    use App\Models\tenantModel;


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
                $idAccommodationArea = $address->id; // Get the ID of the newly created accommodationareaModel

                $request->validate([
                    'idNumberFloors' => 'required',
                    'roomName' => 'required',
                    'idserviceFeeSummary' => 'required',
                    'capacity' => 'required',
                    'idServices' => 'required',
                    'priceRoom' => 'required',
                    'interior' => 'required',
                ]);

                $idNumberFloors = $request->input('idNumberFloors');
                $idserviceFeeSummary = $request->input('idserviceFeeSummary');
                $idServices = $request->input('idServices');
                $roomName = $request->input('roomName');
                $interior = $request->input('interior');
                $capacity = $request->input('capacity');
                $priceRoom = $request->input('priceRoom');
    
                $room = new roomsModel();
                $room->user_id = $id;
                $room->idAccommodationArea = $idAccommodationArea;
                $room->idNumberFloors = $idNumberFloors;
                $room->idserviceFeeSummary = $idserviceFeeSummary;
                $room->idServices = $idServices;
                $room->roomName = $roomName;
                $room->interior = $interior;
                $room->capacity = $capacity;
                $room->priceRoom = $priceRoom;

                $roomSaved = $room->save();

                if ($roomSaved) {
                    return redirect()->route('insertAddress')->with('success', true);
                } else {
                    // If saving room fails, you might want to handle this scenario accordingly
                    return redirect()->route('insertAddress')->with('error', true);
                }
            } else {
                return redirect()->route('insertAddress')->with('error', true);
            }
        } else {
            return redirect()->route('pageLogin');
        }
    }

    
    public function DeleteId($id, Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            
            // Check if there are records with the specified conditions
            $idDelete = tenantModel::where('idRoomTenant', $id)->count(); 
        
            if ($idDelete > 0) {
                return redirect()->route('addAddres')->with('errorDelete1', true);
            } else {
                $roomDelete = roomsModel::where('user_id', $userId)->find($id);
        
                if ($roomDelete) {
                    // Tìm địa chỉ của người dùng dựa trên idAccommodationArea
                    $userAddress = accommodationareaModel::find($roomDelete->idAccommodationArea);
        
                    // Kiểm tra xem địa chỉ có tồn tại không
                    if ($userAddress) {
                        // Kiểm tra xem địa chỉ có đang được sử dụng bởi phòng không
                        $isAddressInUse = roomsModel::where('idAccommodationArea', $userAddress->id)->exists();
        
                        if (!$isAddressInUse) {
                            // Xóa địa chỉ
                            $userAddress->delete();
                        }
                    } else {
                        return redirect()->route('addAddres')->with('errorDelete1', true);
                    }
        
                    // Xóa phòng
                    $roomDelete->delete();
        
                    // Chuyển hướng với thông báo thành công
                    return redirect()->route('addAddres')->with('successDelete', true);
                } else {
                    return redirect()->route('addAddres')->with('errorDelete1', true);
                }
            }
        } else {
            return redirect()->route('pageLogin');
        }
        
    }

        public function getAddress(Request $request) 
        {
            // Get the authenticated user's ID
            $id = Auth::id();
            $serviceFeeSummary = serviceFeeSummaryModel::where('idUser', $id)->get();

            $Services = serviceModel::where('idUser', $id)->get();
            $rooms = DB::table('room')
            ->leftJoin('users', 'room.user_id', '=', 'users.id')
            ->leftJoin('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
            ->leftJoin('servicefeesummary', 'room.idserviceFeeSummary', '=', 'servicefeesummary.id')
            ->leftJoin('services', 'room.idServices', '=', 'services.id')
            ->leftJoin('tenant', 'room.id', '=', 'tenant.idRoomTenant')
            ->select('room.*',
            'accommodationArea.id as accommodationAreaID','accommodationArea.city', 'accommodationArea.districts', 'accommodationArea.wardsCommunes', 'accommodationArea.streetAddress',
                'room.idNumberFloors as number_floors_name', 'servicefeesummary.name as service_fee_summary_name',
            
                'services.electricityBill', 'services.waterBill', 'services.wifiFee', 'services.cleaningFee', 'services.parkingFee', 'services.fine',
                'services.other_fees', 'services.sumServices', 'room.roomName', 'room.priceRoom', 'room.interior', 'room.capacity',
                'tenant.idRoomTenant') 
            ->where('room.user_id', $id)
            ->get();
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
            return view('admin.addAddress', ['combinedData' => $combinedData,'Services'=> $Services, 'rooms'=> $rooms,'serviceFeeSummary'=>$serviceFeeSummary]);
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
            $idUser = Auth::id();
            // Lấy đối tượng accommodationareaModel dựa trên ID
        
                $Services = serviceModel::where('idUser', $idUser)->get();
            $serviceFeeSummary = serviceFeeSummaryModel::where('idUser', $idUser)->get();
            $room = roomsModel::where('user_id', $idUser)
            ->join('accommodationarea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
            ->where('idAccommodationArea', $id)
            ->first();
                
        
        
            $importProducts = DB::table('accommodationarea')
            ->select('id', 'idUser', 'city', 'districts', 'wardsCommunes', 'streetAddress')
            ->where('id', $id)
            ->first(); // Use first() to get a single model instance
        
    
    // Kiểm tra xem bộ sưu tập có trống không và đặt giá trị cụ thể
    $specifically = $importProducts ? $importProducts->streetAddress : '';

        
            // Access the id of the first item in the collection
    $firstItemId = $importProducts ? $importProducts->id : null;
        
            // Pass the variables to the view
            return view('admin.editAddress', [
                'specifically' => $specifically,
                'importProducts' => $importProducts,
                'firstItemId' => $firstItemId,'serviceFeeSummary'=>$serviceFeeSummary,'Services'=> $Services,'room'=> $room
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
                    'idNumberFloors' => 'required',
                    'roomName' => 'required',
                    'priceRoom' => 'required',
                    'capacity' => 'required',
                    'interior' => 'required',
                ]);
        
                // Find the user's address by their ID
                $userAddress = AccommodationAreaModel::find($id);
        
                // Update the address fields
                $userAddress->idUser  = $idUser;
                $userAddress->city = $request->input('city');
                $userAddress->districts = $request->input('district');
                $userAddress->wardsCommunes = $request->input('commune');
                $userAddress->streetAddress = $request->input('specifically');
        
                $savedAddress = $userAddress->save();

                $userRoom = RoomsModel::where('user_id', $idUser)
                ->where('idAccommodationArea', $id)
                ->first();
            
                // Update the room fields
                $userRoom->idNumberFloors = $request->input('idNumberFloors');
                $userRoom->roomName = $request->input('roomName');
                $userRoom->priceRoom = $request->input('priceRoom');
                $userRoom->capacity = $request->input('capacity');
                $userRoom->interior = $request->input('interior');
                
                $savedRoom = $userRoom->save(); // Save the changes to the database
                if ($savedAddress && $savedRoom) {
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
        
        
    }