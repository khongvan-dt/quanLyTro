<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tenantModel;
use App\Models\contractModel;


use Illuminate\Support\Facades\Auth;

class tenantController extends Controller
{
   
    public function insertTenant(Request $request){
        if (Auth::check()) {
            $id = Auth::id();
            $request->validate([
                'tenant'=>'required',
                'roomId'=>'required',
                'email'=>'required',
                'phoneNumber'=>'required'
            ]);
            $tenant= $request->input('tenant');
            $roomId= $request->input('roomId');
            $email=$request->input('email');
            $phoneNumber=$request->input('phoneNumber');
           
            $insertTenant = new tenantModel();
            $insertTenant->idUser=$id;
            $insertTenant->idRoomTenant= $roomId;
            $insertTenant->residentName= $tenant;
            $insertTenant->email= $email;
            if($phoneNumber & strlen($phoneNumber)===10){
                $insertTenant->phoneNumber= $phoneNumber;
            } else {
                return redirect()->route('tenant')->with('errorPhoneNumber', true);
            }

            $saved = $insertTenant->save();
            if ($saved) {
                return redirect()->route('tenant')->with('success', true);
            } else {
                return redirect()->route('tenant')->with('error', true);
            }
        }


    }
    public function deleteTenant($id,Request $request){

        if (Auth::check()) {
            $userId = Auth::id();
            
            // Check if there are records with the specified conditions
            $idDelete = contractModel::where('idRoomContract', $id)->count(); 
    
            if ($idDelete > 0) {
                return redirect()->route('tenant')->with('errorDelete1', true);
            } else {
                $ContractDelete = tenantModel::where('idUser', $userId)->find($id);
    
                if ($ContractDelete) {
                    $ContractDelete->delete();
                    return redirect()->route('tenant')->with('successDelete', true);
                } else {
                    return redirect()->route('tenant')->with('errorDelete', true);
                }
            }
        } else {
            return redirect()->route('pageLogin');
        }
    }
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
        $tenants = TenantModel::select(
            'tenant.*',
            'accommodationArea.city',  'accommodationArea.districts',  
            'accommodationArea.wardsCommunes','accommodationArea.streetAddress', 
            'room.priceRoom  as price',
            'room.roomName'
            
        )
        ->join('users', 'tenant.idUser', '=', 'users.id')
        ->join('room', 'tenant.idRoomTenant', '=', 'room.id')
        ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
        ->join('services', 'tenant.idUser', '=', 'services.idUser')
        ->where('tenant.idUser', $id)
        ->get();
        $data1 = [];

        foreach ($tenants as $row1) {
            $cityId = $row1->city;
            $districtId = $row1->districts;
            $wardCommuneId = $row1->wardsCommunes;

            // Tìm tên tương ứng từ JSON
            $cityName = $this->findNameById($jsonData, $cityId);
            $districtName = $this->findDistrictNameById($jsonData, $cityId, $districtId);
            $wardCommuneName = $this->findWardCommuneNameById($jsonData, $cityId, $districtId, $wardCommuneId);

            // Thêm dữ liệu đã trích xuất vào mảng kết hợp
            $data1[] = [
                'id' => $row1->id,
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row1->streetAddress,
                'roomName' => $row1->roomName,
                'price' => $row1->price,
                'interior' => $row1->interior,
                'capacity' => $row1->capacity,
                'residentName'=>$row1->residentName,
                'email'=>$row1->email

            ];
        }
        $tenants2 = TenantModel::select(
            'tenant.*',
            'accommodationArea.*',
            'room.*'
        )
        ->join('users', 'tenant.idUser', '=', 'users.id')
        ->join('room', 'tenant.idRoomTenant', '=', 'room.id')
        ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
        ->where('tenant.idUser', $id)
        ->where('accommodationArea.idUser', $id)
        ->where('room.user_id', $id)
        ->get();
    
        $data2 = [];
    
        foreach ($tenants2 as $row1) {
            $cityId = $row1->city;
            $districtId = $row1->districts;
            $wardCommuneId = $row1->wardsCommunes;
    
            // Tìm tên tương ứng từ JSON
            $cityName = $this->findNameById($jsonData, $cityId);
            $districtName = $this->findDistrictNameById($jsonData, $cityId, $districtId);
            $wardCommuneName = $this->findWardCommuneNameById($jsonData, $cityId, $districtId, $wardCommuneId);
    
            // Thêm dữ liệu đã trích xuất vào mảng kết hợp
            $data2[] = [
                'tenant.id' => $row1->id,
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row1->streetAddress,
                'roomName' => $row1->roomName,
                'price' => $row1->price,
                'interior' => $row1->interior,
                'capacity' => $row1->capacity,
                'residentName' => $row1->residentName,
                'email' => $row1->email,
                'phoneNumber' => $row1->phoneNumber
            ];
        }
        return view('admin.tenant')->with([
            'data'=> $data,
            'data1'=>$data1,
            'data2' => $data2,       
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


