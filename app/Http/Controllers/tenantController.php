<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class tenantController extends Controller
{
    public function getDisplay(Request $request)
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

  
        $rooms = DB::table('room')
        ->join('users', 'room.user_id', '=', 'users.id')
        ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
        ->join('totalFloors', 'room.idTotalFloors', '=', 'totalFloors.id')
        ->join('numberFloors', 'room.idNumberFloors', '=', 'numberFloors.id')
        ->join('servicefeesummary', 'room.idserviceFeeSummary', '=', 'servicefeesummary.id')
        ->join('services', 'room.idServices', '=', 'services.id')
        ->select('room.*',
         'accommodationArea.city',  'accommodationArea.districts',  'accommodationArea.wardsCommunes','accommodationArea.streetAddress', 
         'room.idNumberFloors  as number_floors_name', 'servicefeesummary.name as service_fee_summary_name',
          'services.electricityBill','services.waterBill','services.wifiFee','services.cleaningFee','services.parkingFee','services.fine',
          'services.other_fees','services.sumServices','room.roomName','room.priceRoom','room.interior','room.capacity')
        ->where('room.user_id', $id)
        ->get();
       
        $data = [];

        foreach ($rooms as $row1) {
            $cityId = $row1->city;
            $districtId = $row1->districts;
            $wardCommuneId = $row1->wardsCommunes;
        
            // Tìm tên tương ứng từ JSON
            $cityName = $this->findNameById($jsonData, $cityId);
            $districtName = $this->findDistrictNameById($jsonData, $cityId, $districtId);
            $wardCommuneName = $this->findWardCommuneNameById($jsonData, $cityId, $districtId, $wardCommuneId);
        
            // Thêm dữ liệu đã trích xuất vào mảng kết hợp
            $data[] = [
                'id' => $row1->id,
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row1->streetAddress,
                'number_floors_name' => $row1->number_floors_name,
                'service_fee_summary_name' => $row1->service_fee_summary_name,
                'electricityBill' => $row1->electricityBill,
                'waterBill' => $row1->waterBill,
                'wifiFee' => $row1->wifiFee,
                'cleaningFee' => $row1->cleaningFee,
                'parkingFee' => $row1->parkingFee,
                'fine' => $row1->fine,
                'other_fees' => $row1->other_fees,
                'sumServices' => $row1->sumServices,
                'roomName' => $row1->roomName,
                'priceRoom' => $row1->priceRoom,
                'interior' => $row1->interior,
                'capacity' => $row1->capacity,
            ];
        }
        // dd($rooms);
        // exit();
        // // Now $combinedData contains the combined information
        
        return view('admin.tenant')->with([
          
            'data'=> $data,
            'rooms'=> $rooms
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
   }


