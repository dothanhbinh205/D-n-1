<?php
class registerController{
    public $registerModel;
    public function __construct()
    { 
         $this->registerModel = new registerModel();  
    }
    public function all_register()
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
        $register = $this->registerModel->all_register();
        require_once './views/admin/login/show-acc.php';
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->registerModel->delete($id);
        header('location:?action=all_register');
    }

    public function createRegister()
    {
        require_once './views/admin/login/register.php';
    }
    public function createRegisterPost()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $this->registerModel->inset($name,$email,$password,$phone,$address);
        header('location:?action=login');
    }
    
} 
 ?>