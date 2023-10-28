<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\totalFlorModel;
use Illuminate\Support\Facades\DB;
use App\Models\numberFloorsModel;
use App\Models\roomsModel;

class addRoomController extends Controller
{
    public function getFloor(){
        $listFloors = totalFlorModel::all();
        return view('admin.addRoom', ['listFloors' => $listFloors]);
    }
    
    public function getNumberFloors(Request $request) {
        $totalFloorId = $request->input('totalFloorId');
    
        // Truy vấn dữ liệu "Tầng" dựa trên $totalFloorId
        $numberFloors = NumberFloorsModel::where('idTotalFloors', $totalFloorId)->pluck('floors', 'id')->toArray();
    
        // Trả về dữ liệu dưới dạng JSON
        return response()->json($numberFloors);
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
                'id' => $row->id, // Thêm ID vào mảng
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row->streetAddress,
            ];
        }
        return response()->json(['data' => $combinedData]);

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
