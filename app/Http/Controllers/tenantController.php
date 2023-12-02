<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tenantModel;
use App\Models\contractModel;
use App\Models\pathModel;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


use Illuminate\Support\Facades\Auth;

class tenantController extends Controller
{
    public function exportToWord()
    {
        // Tạo một đối tượng PHPWord
        $phpWord = new PhpWord();

        // Tạo một văn bản mới và thêm nội dung
        $section = $phpWord->addSection();
        $section->addText('CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM
        Độc lập - Tự do - Hạnh phúc
        
        HỢP ĐỒNG THUÊ NHÀ TRỌ
        (Số: ……………./HĐTNO)
        Hôm nay, ngày …. tháng …. năm ….., Tại ………………………..Chúng tôi gồm có:
        BÊN CHO THUÊ (BÊN A):
        Ông/bà: ………………………………………. Năm sinh: …………………..
        CMND/CCCD số: ………… Ngày cấp ………….. Nơi cấp ………………
        Hộ khẩu: …………………………………………..……………………………
        Địa chỉ:…………………………………………..………………………………
        Điện thoại: …………………………………………..…………………………
        Là chủ sở hữu nhà ở: …………………………………………..……………
        Các chứng từ sở hữu và tham khảo về nhà ở đã được cơ quan có thẩm quyền cấp cho Bên A gồm có: 
        ………………..…………………………………………
        ………………..…………………………………………
        BÊN THUÊ (BÊN B):
        Ông/bà: ……………………………………. Năm sinh: …………………..
        CMND/CCCD số: …………… Ngày cấp: ……………….. Nơi cấp: ……
        Hộ khẩu: ……………………………………………..………………………
        Địa chỉ:…………………………………………..……………………………
        Điện thoại: ……………………………………………..…… Fax:……………
        Mã số thuế:……………………………………………………………………
        Tài khoản số: ………………………… Mở tại ngân hàng: ………………
        Hai bên cùng thỏa thuận ký hợp đồng với những nội dung sau:
        ĐIỀU 1. ĐỐI TƯỢNG CỦA HỢP ĐỒNG
        Bên A đồng ý cho Bên B thuê căn hộ (căn nhà) tại địa chỉ ….. thuộc sở hữu hợp pháp của Bên A.
        Chi tiết căn hộ như sau:
        Bao gồm: Ban công, hệ thống điện nước đã sẵn sàng sử dụng được, các bóng đèn trong các phòng và hệ thống công tắc, các bồn rửa mặt, bồn vệ sinh đều sử dụng tốt.
        ĐIỀU 2. GIÁ CHO THUÊ NHÀ Ở VÀ PHƯƠNG THỨC THANH TOÁN
        2.1. Giá cho thuê nhà ở là ............ đồng/ tháng (Bằng chữ: ………………………..)
        Giá cho thuê này đã bao gồm các chi phí về quản lý, bảo trì và vận hành nhà ở.
        2.2. Các chi phí sử dụng điện, nước, điện thoại và các dịch vụ khác do bên B thanh toán cho bên cung cấp điện, nước, điện thoại và các cơ quan quản lý dịch vụ.
        2.3. Phương thức thanh toán: bằng ……………………., trả vào ngày .......... hàng tháng.
        ĐIỀU 3. THỜI HẠN THUÊ VÀ THỜI ĐIỂM GIAO NHẬN NHÀ Ở
        3.1. Thời hạn thuê ngôi nhà nêu trên là ………năm kể từ ngày… tháng … năm …..
        3.2. Thời điểm giao nhận nhà ở là ngày ........ tháng ........ năm ….........
        ĐIỀU 4. NGHĨA VỤ VÀ QUYỀN CỦA BÊN A
        4.1. Nghĩa vụ của bên A:
        a) Giao nhà ở và trang thiết bị gắn liền với nhà ở (nếu có) cho bên B theo đúng hợp đồng;
        b) Phổ biến cho bên B quy định về quản lý sử dụng nhà ở;
        c) Bảo đảm cho bên B sử dụng ổn định nhà trong thời hạn thuê;
        d) Bảo dưỡng, sửa chữa nhà theo định kỳ hoặc theo thỏa thuận; nếu bên A không bảo dưỡng, sửa chữa nhà mà gây thiệt hại cho bên B, thì phải bồi thường;
        e) Tạo điều kiện cho bên B sử dụng thuận tiện diện tích thuê;
        f) Nộp các khoản thuế về nhà và đất (nếu có);
        g) Hướng dẫn, đôn đốc bên B thực hiện đúng các quy định về đăng ký tạm trú.
        4.2. Quyền của bên A:
        a) Yêu cầu bên B trả đủ tiền thuê nhà đúng kỳ hạn như đã thỏa thuận;
        b) Trường hợp chưa hết hạn hợp đồng mà bên A cải tạo nhà ở và được bên B đồng ý thì bên A được quyền điều chỉnh giá cho thuê nhà ở. Giá cho thuê nhà ở mới do các bên thoả thuận; trong trường hợp không thoả thuận được thì bên A có quyền đơn phương chấm dứt hợp đồng thuê nhà ở và phải bồi thường cho bên B theo quy định của pháp luật;
        c) Yêu cầu bên B có trách nhiệm trong việc sửa chữa phần hư hỏng, bồi thường thiệt hại do lỗi của bên B gây ra;
        d) Cải tạo, nâng cấp nhà cho thuê khi được bên B đồng ý, nhưng không được gây phiền hà cho bên B sử dụng chỗ ở;
        e) Được lấy lại nhà cho thuê khi hết hạn hợp đồng thuê, nếu hợp đồng không quy định thời hạn thuê thì bên cho thuê muốn lấy lại nhà phải báo cho bên thuê biết trước ........ ngày;
        f) Đơn phương chấm dứt thực hiện hợp đồng thuê nhà nhưng phải báo cho bên B biết trước ít nhất ......ngày nếu không có thỏa thuận khác và yêu cầu bồi thường thiệt hại nếu bên B có một trong các hành vi sau đây:
        - Không trả tiền thuê nhà liên tiếp trong ...... trở lên mà không có lý do chính đáng;
        - Sử dụng nhà không đúng mục đích thuê như đã thỏa thuận trong hợp đồng;
        - Tự ý đục phá, cơi nới, cải tạo, phá dỡ nhà ở đang thuê;
        - Bên B chuyển đổi, cho mượn, cho thuê lại nhà ở đang thuê mà không có sự đồng ý của bên A;
        - Làm mất trật tự, vệ sinh môi trường, ảnh hưởng nghiêm trọng đến sinh hoạt của những người xung quanh đã được bên A hoặc tổ trưởng tổ dân phố nhắc nhở mà vẫn không khắc phục;
        - Thuộc trường hợp khác theo quy định của pháp luật.
        ĐIỀU 5. NGHĨA VỤ VÀ QUYỀN CỦA BÊN B
        5.1. Nghĩa vụ của bên B:
        a) Sử dụng nhà đúng mục đích đã thỏa thuận, giữ gìn nhà ở và có trách nhiệm trong việc sửa chữa những hư hỏng do mình gây ra;
        b) Trả đủ tiền thuê nhà đúng kỳ hạn đã thỏa thuận;
        c) Trả tiền điện, nước, điện thoại, vệ sinh và các chi phí phát sinh khác trong thời gian thuê nhà;
        d) Trả nhà cho bên A theo đúng thỏa thuận.
        e) Chấp hành đầy đủ những quy định về quản lý sử dụng nhà ở;
        f) Không được chuyển nhượng hợp đồng thuê nhà hoặc cho người khác thuê lại trừ trường hợp được bên A đồng ý bằng văn bản;
        g) Chấp hành các quy định về giữ gìn vệ sinh môi trường và an ninh trật tự trong khu vực cư trú;
        h) Giao lại nhà cho bên A trong các trường hợp chấm dứt hợp đồng.
        5.2. Quyền của bên B:
        a) Nhận nhà ở và trang thiết bị gắn liền (nếu có) theo đúng thoả thuận;
        b) Được đổi nhà đang thuê với bên thuê khác, nếu được bên A đồng ý bằng văn bản;
        c) Được cho thuê lại nhà đang thuê, nếu được bên cho thuê đồng ý bằng văn bản;
        d) Được thay đổi cấu trúc ngôi nhà nếu được bên A đồng ý bằng văn bản;
        e) Yêu cầu bên A sửa chữa nhà đang cho thuê trong trường hợp nhà bị hư hỏng nặng;
        g) Được ưu tiên ký hợp đồng thuê tiếp, nếu đã hết hạn thuê mà nhà vẫn dùng để cho thuê;
        h) Được ưu tiên mua nhà đang thuê, khi bên A thông báo về việc bán ngôi nhà;
        i) Đơn phương chấm dứt thực hiện hợp đồng thuê nhà nhưng phải báo cho bên A biết trước ít nhất 30 ngày nếu không có thỏa thuận khác và yêu cầu bồi thường thiệt hại nếu bên A có một trong các hành vi sau đây:
        - Không sửa chữa nhà ở khi có hư hỏng nặng;
        - Tăng giá thuê nhà ở bất hợp lý hoặc tăng giá thuê mà không thông báo cho bên thuê nhà ở biết trước theo thỏa thuận;
        - Quyền sử dụng nhà ở bị hạn chế do lợi ích của người thứ ba.
        ĐIỀU 6. QUYỀN TIẾP TỤC THUÊ NHÀ Ở
        6.1. Trường hợp chủ sở hữu nhà ở chết mà thời hạn thuê nhà ở vẫn còn thì bên B được tiếp tục thuê đến hết hạn hợp đồng. Người thừa kế có trách nhiệm tiếp tục thực hiện hợp đồng thuê nhà ở đã ký kết trước đó, trừ trường hợp các bên có thỏa thuận khác. Trường hợp chủ sở hữu không có người thừa kế hợp pháp theo quy định của pháp luật thì nhà ở đó thuộc quyền sở hữu của Nhà nước và người đang thuê nhà ở được tiếp tục thuê theo quy định về quản lý, sử dụng nhà ở thuộc sở hữu nhà nước.
        6.2. Trường hợp chủ sở hữu nhà ở chuyển quyền sở hữu nhà ở đang cho thuê cho người khác mà thời hạn thuê nhà ở vẫn còn thì bên B được tiếp tục thuê đến hết hạn hợp đồng; chủ sở hữu nhà ở mới có trách nhiệm tiếp tục thực hiện hợp đồng thuê nhà ở đã ký kết trước đó, trừ trường hợp các bên có thỏa thuận khác.
        6.3. Khi bên B chết mà thời hạn thuê nhà ở vẫn còn thì người đang cùng sinh sống với bên B được tiếp tục thuê đến hết hạn hợp đồng thuê nhà ở, trừ trường hợp thuê nhà ở công vụ hoặc các bên có thỏa thuận khác hoặc pháp luật có quy định khác.
        ĐIỀU 7. TRÁCH NHIỆM DO VI PHẠM HỢP ĐỒNG
        Trong quá trình thực hiện hợp đồng mà phát sinh tranh chấp, các bên cùng nhau thương lượng giải quyết; trong trường hợp không tự giải quyết được, cần phải thực hiện bằng cách hòa giải; nếu hòa giải không thành thì đưa ra Tòa án có thẩm quyền theo quy định của pháp luật.
        ĐIỀU 8. CÁC THỎA THUẬN KHÁC
        8.1. Việc sửa đổi, bổ sung hoặc hủy bỏ hợp đồng này phải lập thành văn bản mới có giá trị để thực hiện.
        8.2. Việc chấm dứt hợp đồng thuê nhà ở được thực hiện khi có một trong các trường hợp sau đây:
        a) Hợp đồng thuê nhà ở hết hạn; trường hợp trong hợp đồng không xác định thời hạn thì hợp đồng chấm dứt sau 90 ngày, kể từ ngày bên A thông báo cho bên B biết việc chấm dứt hợp đồng;
        b) Nhà ở cho thuê không còn;
        c) Nhà ở cho thuê bị hư hỏng nặng, có nguy cơ sập đổ hoặc thuộc khu vực đã có quyết định thu hồi đất, giải tỏa nhà ở hoặc có quyết định phá dỡ của cơ quan nhà nước có thẩm quyền; nhà ở cho thuê thuộc diện bị Nhà nước trưng mua, trưng dụng để sử dụng vào các mục đích khác.
        Bên A phải thông báo bằng văn bản cho bên B biết trước 30 ngày về việc chấm dứt hợp đồng thuê nhà ở quy định tại điểm này, trừ trường hợp các bên có thỏa thuận khác;
        d) Hai bên thoả thuận chấm dứt hợp đồng trước thời hạn;
        e) Bên B chết hoặc có tuyên bố mất tích của Tòa án mà khi chết, mất tích không có ai đang cùng chung sống;
        f) Chấm dứt khi một trong các bên đơn phương chấm dứt thực hiện hợp đồng thuê nhà ở.
        ĐIỀU 9. CAM KẾT CỦA CÁC BÊN
        Bên A và bên B chịu trách nhiệm trước pháp luật về những lời cùng cam kết sau đây:
        9.1. Đã khai đúng sự thật và tự chịu trách nhiệm về tính chính xác của những thông tin về nhân thân đã ghi trong hợp đồng này.
        9.2. Thực hiện đúng và đầy đủ tất cả những thỏa thuận đã ghi trong hợp đồng này; nếu bên nào vi phạm mà gây thiệt hại, thì phải bồi thường cho bên kia hoặc cho người thứ ba (nếu có).
        Trong quá trình thực hiện nếu phát hiện thấy những vấn đề cần thoả thuận thì hai bên có thể lập thêm Phụ lục hợp đồng. Nội dung Phụ lục hợp đồng có giá trị pháp lý như hợp đồng chính.
        9.3. Hợp đồng này có giá trị kể từ ngày hai bên ký kết.
        Hợp đồng được lập thành ………. (………..) bản, mỗi bên giữ một bản và có giá trị như nhau.
        Bên thuê
        (Ký, ghi rõ họ tên)	Bên cho thuê
        (Ký, ghi rõ họ tên)
        ');

      // Lưu tệp tin Word
      $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
      $filePath = storage_path('app/public/HopDong.docx'); // Đổi đường dẫn để lưu vào thư mục public
      $objWriter->save($filePath);
  
      // Trả về đường dẫn tới tệp tin để tải về
      return response()->download($filePath)->deleteFileAfterSend(true);

    }
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
            $insertTenant->phoneNumber = $phoneNumber;
            $saved= $insertTenant->save();
            $request->validate([
                'endDate' => 'required',
                'startDate' => 'required',
                'file' => 'required|file',
                'path'=>'required'
            ]);
            
            $file = $request->file('file');
            $endDate = $request->input('endDate');
            $startDate = $request->input('startDate');
            $path = $request->input('path');

            
            // Đường dẫn trên máy tính của bạn
            $localPath = $path;
            
            // Tên file được giữ nguyên từ tên file gốc
            $originalFileName = $file->getClientOriginalName();
            
            // Di chuyển file vào thư mục trên máy tính của bạn và giữ nguyên tên file
            $file->move($localPath, $originalFileName);
            
            // Lấy đường dẫn trên máy tính của bạn
            $localFilePath = $localPath . $originalFileName;
            
            $insertContract = new contractModel();
            $insertContract->idUser = $id;
            $insertContract->idRoomContract = $roomId;
            $insertContract->startDate = $startDate;
            $insertContract->endDate = $endDate;
            $insertContract->file = $localFilePath;
            
            $saved2 = $insertContract->save();
            
            
            if ($saved &&  $saved2 ) {
                return redirect()->route('tenant')->with('success', true);
            } else {
                return redirect()->route('tenant')->with('error', true);
            }
        }


    }
    public function deleteContract($id, Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $contract = ContractModel::where('idUser', $userId)->where('idRoomContract', $id)->first();
    
            if ($contract) {
                
                $tenant = TenantModel::where('idUser', $userId)->where('idRoomTenant', $id)->first();
                if ($contract->delete()) {
                    if ($tenant) {
                        $tenant->delete();
                    }
    
                    return redirect()->route('tenant')->with('successDelete', true);
                } else {
                    return redirect()->route('tenant')->with('errorDelete', true);
                }
            } else {
                return redirect()->route('tenant')->with('errorDelete', true);
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

        $listPath = pathModel::where('idUser', $id)->get();
        // Lấy dữ liệu từ JSON
        $jsonData = json_decode(file_get_contents('https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json'), true);

        $rooms = DB::table('room')
        ->join('users', 'room.user_id', '=', 'users.id')
        ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
        ->join('totalFloors', 'room.idTotalFloors', '=', 'totalFloors.id')
        ->join('numberFloors', 'room.idNumberFloors', '=', 'numberFloors.id')
        ->join('servicefeesummary', 'room.idserviceFeeSummary', '=', 'servicefeesummary.id')
        ->join('services', 'room.idServices', '=', 'services.id')
        ->leftJoin('tenant', 'room.id', '=', 'tenant.idRoomTenant') 
        ->select(
            'room.*',
            'accommodationArea.city',
            'accommodationArea.districts',
            'accommodationArea.wardsCommunes',
            'accommodationArea.streetAddress',
            'room.idNumberFloors as number_floors_name',
            'servicefeesummary.name as service_fee_summary_name',
            'services.electricityBill',
            'services.waterBill',
            'services.wifiFee',
            'services.cleaningFee',
            'services.parkingFee',
            'services.fine',
            'services.other_fees',
            'services.sumServices',
            'room.roomName',
            'room.priceRoom',
            'room.interior',
            'room.capacity'
        )
        ->where('room.user_id', $id)
        ->whereNull('tenant.id'); 
    
    $rooms = $rooms->get();
    
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
            'contract.*',
            'accommodationArea.city',  'accommodationArea.districts',  
            'accommodationArea.wardsCommunes','accommodationArea.streetAddress', 
            'room.priceRoom  as price',
            'room.roomName'
            
        )
        ->join('users', 'tenant.idUser', '=', 'users.id')
        ->join('room', 'tenant.idRoomTenant', '=', 'room.id')
        ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
        ->join('services', 'tenant.idUser', '=', 'services.idUser')
        ->join('contract', 'contract.idRoomContract', '=', 'tenant.idRoomTenant')
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
                'id' => $row1->idRoomContract,
                'city' => $cityName,
                'district' => $districtName,
                'wardCommune' => $wardCommuneName,
                'streetAddress' => $row1->streetAddress,
                'roomName' => $row1->roomName,
                'price' => $row1->price,
                'interior' => $row1->interior,
                'capacity' => $row1->capacity,
                'residentName'=>$row1->residentName,
                'email'=>$row1->email,
                'phone'=>$row1->phoneNumber,

                'file'=>$row1->file

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
            'listPath' => $listPath
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


