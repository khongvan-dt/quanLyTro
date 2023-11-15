<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\totalFlorModel;
use Illuminate\Support\Facades\DB;
use App\Models\numberFloorsModel;
use App\Models\serviceFeeSummaryModel;
use App\Models\serviceModel;
use App\Models\roomsModel;

use Illuminate\Support\Facades\Auth;




class addRoomController extends Controller
{
    
    
    public function getAddress(Request $request)
    { 
        $id = Auth::id();
        // Lấy dữ liệu từ cơ sở dữ liệu
        $dbData =  DB::table('accommodationarea')
        ->select('id', 'idUser', 'city', 'districts', 'wardsCommunes', 'streetAddress')
        ->where('idUser', $id)
        ->get();
        // $listFloors = totalFlorModel::all();
        // Lấy dữ liệu từ JSON
        $jsonData = json_decode(file_get_contents('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json'), true);

        $listFloors = totalFlorModel::where('idUser', $id)->get();
        $serviceFeeSummary = serviceFeeSummaryModel::where('idUser', $id)->get();
        $Services = serviceModel::where('idUser', $id)->get();
        $id = 123; // replace with the actual value of idUser you want to filter on

        $rooms = DB::table('room')
            ->join('users', 'room.user_id', '=', 'users.id')
            ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
            ->join('totalFloors', 'room.idTotalFloors', '=', 'totalFloors.id')
            ->join('numberFloors', 'room.idNumberFloors', '=', 'numberFloors.id')
            ->join('servicefeesummary', 'room.idserviceFeeSummary', '=', 'servicefeesummary.id')
            ->join('services', 'room.idServices', '=', 'services.id')
            ->select('room.*',
             'accommodationArea.city',  'accommodationArea.districts',  'accommodationArea.wardsCommunes','accommodationArea.streetAddress', 
            
             'numberFloors.name as number_floors_name', 'servicefeesummary.name as service_fee_summary_name', 'services.name as services_name')
            ->where('users.idUser', $id)
            ->get();
        
    

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
                'id' => $row->id, // Thêm ID vào mảng
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row->streetAddress,
            ];
        }
        return view('admin.addRoom')->with([
            'combinedData' => $combinedData,
            'listFloors' => $listFloors,
            'serviceFeeSummary' => $serviceFeeSummary,
            'Services'=> $Services,
            'room'=> $rooms,
        ]);

        

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

    public function getNumberFloors(Request $request) {
        $totalFloorId = $request->input('totalFloorId');
    
        // Query the "Tầng" data based on $totalFloorId
        $numberFloors = NumberFloorsModel::where('idTotalFloors', $totalFloorId)->pluck('floors', 'id')->toArray();
        return response()->json($numberFloors);
    }
    
    public function insertRoom(Request $request)
    { 
        // dd($request->all()); // Add this line to display the data
        // exit(0);
        if (Auth::check()) {
            $id = Auth::id();
    
            $request->validate([
                'idAccommodationArea' => 'required',
                'idTotalFloors' => 'required',
                'idNumberFloors' => 'required',
                'idserviceFeeSummary' => 'required',
                'idServices' => 'required',
                'roomName' => 'required',
                'interior' => 'required',
                'capacity' => 'required',
                'priceRoom' => 'nullable|numeric',

            ]);
           
            $idAccommodationArea = $request->input('idAccommodationArea');
            $idTotalFloors = $request->input('idTotalFloors');
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
            $room->idTotalFloors = $idTotalFloors;
            $room->idNumberFloors = $idNumberFloors;
            $room->idserviceFeeSummary = $idserviceFeeSummary;
            $room->idServices = $idServices;
            $room->roomName = $roomName;
            $room->interior = $interior;
            $room->capacity = $capacity;
            $room->priceRoom = $priceRoom;
        
            $saved = $room->save();
        
            if ($saved) {
                return redirect()->route('addRoom')->with('success', true);
            } else {
                return redirect()->route('addRoom')->with('error', true);
            }
        }
    }
    
}
