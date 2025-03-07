<?php 
require_once './models/ProductQuery.php';
require_once './commons/function.php';

class HomeClientControllers {

    public $productQuery;
    public $categoryQuery;
    public $cartModels;
    public $loginModel;
    public $commentModel;
    public function __construct() {
        $this->productQuery = new ProductQuery();
        $this->loginModel = new LoginModel();
        $this->commentModel = new commentModel();
    }

    // trang sản phẩm hiện thị view trang chủ
    public function home(){
        $listCategories = $this->productQuery->getAllCategories();
        $listProductLastes = $this->productQuery->getTop4ProductLastes();
        $aophao = $this->productQuery->get_products_by_category_aophao(14);
        $aolen = $this->productQuery->get_products_by_category_aolen(17);
        // var_dump($aophao) ;
        require_once './views/client/dashboardClient.php';
    }
    public function productDetails()
    {
        $product_id = $_GET['product_id'];
        $listCategories = $this->productQuery->getAllCategories();
        $product = $this->productQuery->getDetailSan($product_id);
        $variant = $this->productQuery->getProductByVariant($product_id);
        $allComment = $this->commentModel->allComment($product_id);
        // if (isset($_GET['product_id'])) {
        //     $product_id = $_GET['product_id'];
        //     $product = $this->productQuery->get_product_by_id($product_id);
        //     $variant = $this->productQuery->get_product_by_variant($product_id);
        // }
        include "./views/client/product-details.php";
        
    }
    // public function miniProduct(){
    //     $product_id = $_GET['product_id'];
    //     $product = $this->productQuery->getDetailSan($product_id);
    //     $variant = $this->productQuery->get_product_by_variant($product_id);
    //     include './views/client/layout/modalPoduct.php';
    // }
    public function categoryProductClient(){
        
        $listCategories = $this->productQuery->getAllCategories();
        
        if (isset($_GET['id'])) {
            $category_id = $_GET['id'];
            $products = $this->productQuery->getProductsByCategory($category_id);
        } else {
            $products = $this->productQuery->getAllProductCate();
        }
        include './views/client/categoryProductClient.php';
    }
    // 
    public function addToCart(){
        // yêu cầu người dùng đăng nhập thì mới đặt được hàng
        // if (!isset($_SESSION['name'])) {
        //     echo "<script>alert('Vui lòng đăng nhập để đặt hàng.');</script>";
        //     header('location:?action=login'); // Chuyển hướng đến trang đăng nhập
        //     exit();
        // }
        // Xóa toàn bộ giỏ hàng nếu được yêu cầu
        if (isset($_GET['emptyCart']) && ($_GET['emptyCart']) == 1) {
            unset($_SESSION['myCart']);
            header('Location: ?action=addToCart');
            exit();
        }
         // Loại bỏ các sản phẩm bị ẩn khỏi giỏ hàng
        if (isset($_SESSION['myCart']) && is_array($_SESSION['myCart'])) {
            foreach ($_SESSION['myCart'] as $key => $value) {
                $product = $this->productQuery->find($value['product_id']);
                if (!$product || $product->status == 0) {
                    unset($_SESSION['myCart'][$key]); // Xóa sản phẩm khỏi giỏ hàng
                }
            }
            // Reset lại các chỉ số của mảng
            $_SESSION['myCart'] = array_values($_SESSION['myCart']);
        }
        
        // Xử lý khi người dùng thêm sản phẩm vào giỏ hàng
        if (isset($_POST['add_to_cart']) && $_POST['product_id'] > 0 ) {
            $product_id = $_POST['product_id'];
            
            $quantity = isset($_POST['quantity']) && $_POST['quantity'] > 0 ? (int)$_POST['quantity'] : 1;

            $size = $_POST['size'] ?? null;
            $color = $_POST['color'] ?? null;
            // Tìm thông tin sản phẩm từ database
            $product = $this->productQuery->find($product_id);
            if (!$product) {
                // Nếu không tìm thấy sản phẩm, dừng xử lý
                header('Location: ?action=addToCart&error=notfound');
                exit();
            }
            // Kiểm tra trạng thái sản phẩm
            if ($product->status == 0) {
                // Nếu sản phẩm bị ẩn, không cho thêm vào giỏ hàng
                
                header('Location: ?action=cart');
                exit();
            }
        
            // Kiểm tra biến thể có tồn tại không
            // $variant = $this->productQuery->checkVariant($product_id, $size, $color);
            // if (!$variant) {
            //     echo "Biến thể không tồn tại.";
            //     exit();
            // }
            

    
            // Khởi tạo giỏ hàng nếu chưa tồn tại
            if (!isset($_SESSION['myCart']) || !is_array($_SESSION['myCart'])) {
                $_SESSION['myCart'] = [];
            }
            
            // Kiểm tra sản phẩm có tồn tại trong giỏ hàng không
            $product_exists = false;
            foreach ($_SESSION['myCart'] as $key => $value) {
                if ($value['product_id'] == $product_id && $value['color'] == $color && $value['size'] == $size) {
                    $product_exists = true;
    
                    // Không thay đổi số lượng nếu người dùng chỉ tải lại trang
                // Chỉ tăng số lượng nếu `quantity` được cập nhật từ form
                $_SESSION['myCart'][$key]['quantity'] = max($_SESSION['myCart'][$key]['quantity'], $quantity);
    
                    // Cập nhật lại tổng giá trị sản phẩm
                    $_SESSION['myCart'][$key]['total'] = $_SESSION['myCart'][$key]['quantity'] * $_SESSION['myCart'][$key]['price'];
                    break;
                }
            }
    
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            if (!$product_exists) {
                $array_pro = [
                    "product_id" => $product->product_id,
                    "image" => $product->image,
                    "name" => $product->name,
                    "price" => $product->price,
                    "total" => $product->price * $quantity,
                   "color" => $_POST['color'],
                    "size" => $_POST['size'],
                "quantity" => $_POST['quantity']
                ];
                
                array_push($_SESSION['myCart'], $array_pro);
            }
        }
       
    
        // Hiển thị trang giỏ hàng
        include './views/client/cart.php';
    }
    public function updateCartQuantity()
    {
        if (isset($_POST['index']) && isset($_POST['quantity'])) {
            $index = (int)$_POST['index'];
            $quantity = (int)$_POST['quantity'];

            // Kiểm tra nếu giỏ hàng và sản phẩm tồn tại
            if (isset($_SESSION['myCart'][$index])) {
                $_SESSION['myCart'][$index]['quantity'] = $quantity;
                $_SESSION['myCart'][$index]['total'] = $_SESSION['myCart'][$index]['price'] * $quantity;

                // Tính tổng giỏ hàng
                $cartTotal = array_reduce($_SESSION['myCart'], function ($total, $item) {
                    return $total + $item['total'];
                }, 0);

                // Trả về dữ liệu cập nhật
                echo json_encode([
                    'status' => 'success',
                    'productTotal' => $_SESSION['myCart'][$index]['total'],
                    'cartTotal' => $cartTotal
                ]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không tồn tại']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
        }
    }
    public function removeCartItem()
    {
        if (isset($_POST['index'])) {
            $index = (int)$_POST['index'];

            // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
            if (isset($_SESSION['myCart'][$index])) {
                unset($_SESSION['myCart'][$index]);
                $_SESSION['myCart'] = array_values($_SESSION['myCart']); // Sắp xếp lại chỉ số mảng

                // Tính tổng giỏ hàng
                $cartTotal = array_reduce($_SESSION['myCart'], function ($total, $item) {
                    return $total + $item['total'];
                }, 0);

                // Trả về dữ liệu cập nhật
                echo json_encode(['status' => 'success', 'cartTotal' => $cartTotal]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Sản phẩm không tồn tại']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
        }
    }
    public function search() {
        $results = [];
        if (isset($_POST['kyw']) && !empty($_POST['kyw'])) {
            $keyword = trim($_POST['kyw']);
            $results = $this->productQuery->searchProducts($keyword);
        }

        // Trả dữ liệu về view
        require './views/client/searchResults.php';
    }


}



?> 