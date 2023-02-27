<?php
//đây là chỗ viết common controller

class Controller {
    public function render ($view, $params=null)
    {
        if($params){
            extract($params); //extract là để tách các key thành từng biến riêng, VD array 
        }
        // ob là thư viện của php, dùng để trộn các view lại với nhau. 
        //ob_start đánh dấu là ob kích hoạt. Tác dụng: bt require file là lấy hết code vào r hiển thị ra, nhưng nếu mình ko muốn hiển thị ra luôn, mà chỉ muốn lưu tạm vào ram đẻ sau két hợp với view layout thì mình dùng ob 
        ob_start ();
        
        require_once 'Views/'.$view.'.php';
        $content = ob_get_clean (); //ob_get_clean là lấy hết data ra , gán cho biến content xong xóa hết data
        require_once 'Views/layout/layout.php';

    }
}