<?php
class OrderControllers{
    public $orderModel;
    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }
    // Lấy danh sách của order
    public function listOrder()
    {
        if (!isset($_SESSION['name'])) {
            header('location:?action=login'); // Chuyển hướng đến trang đăng nhập
            exit();
        }
        // Kiểm tra quyền của người dùng phải có role =1 thì mới được vào admin
        if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 0) {
            header('location:?action=403'); // Chuyển hướng đến trang lỗi không đủ quyền
            exit();
        }
        $orders = $this->orderModel->allOrder();
        // Tham chiếu giá trị status
        $statusShow = [
            0 => 'Chờ xác nhận',
            1 => 'Đã xác nhận',
            2 => 'Đang vận chuyển',
            3 => 'Hoàn thành',
         ];
        require_once './views/admin/Order/showOrder.php';
    }
    public function updateOrder()
    {
        if (!isset($_SESSION['name'])) {
            header('location:?action=login'); // Chuyển hướng đến trang đăng nhập
            exit();
        }
        // Kiểm tra quyền của người dùng phải có role =1 thì mới được vào admin
        if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 0) {
            header('location:?action=403'); // Chuyển hướng đến trang lỗi không đủ quyền
            exit();
        }
        $id =  $_GET['id'];
        $orderEdit = $this->orderModel->find($id);
        require_once './views/admin/Order/Order.php';
    }
    public function updateOrder_POST()
    {   
        
        // var_dump( $id =  $_POST['order_detail_id']);
        $id = $_GET['id'];
        $status = $_POST['status'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $updated_at = date('Y-m-d H:i:s');
        $this->orderModel->updateOrder($id,$status,$updated_at);
        // require_once './views/admin/Order/Order.php';
        header('location:?action=listOrders');
    }    
    
    // Chi tiết đơn hàng 
    public function showOrder()
    {   
        if (!isset($_SESSION['name'])) {
            header('location:?action=login'); // Chuyển hướng đến trang đăng nhập
            exit();
        }
        // Kiểm tra quyền của người dùng phải có role =1 thì mới được vào admin
        if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 0) {
            header('location:?action=403'); // Chuyển hướng đến trang lỗi không đủ quyền
            exit();
        }
        $id = $_GET['id'];
        $showOrder = $this->orderModel->allShow($id);
        require_once './views/admin/Order/showOrderDetails.php';
        // var_dump($showOrder);
    }
    } 
    
?>