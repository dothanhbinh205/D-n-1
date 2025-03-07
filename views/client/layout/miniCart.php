<!--mini cart-->
<?php 
$cartTotal = 0; // Khởi tạo tổng tiền giỏ hàng
?>

<!-- Kiểm tra nếu giỏ hàng có dữ liệu -->
<?php if (isset($_SESSION['myCart']) && count($_SESSION['myCart']) > 0): ?>

    <div class="mini_cart">
        <div class="cart_gallery">
            <!-- Header mini cart -->
            <div class="cart_close">
                <div class="cart_text">
                    <h3>Giỏ hàng</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="icon-close icons"></i></a>
                </div>
            </div>

            <!-- Lặp qua từng sản phẩm trong giỏ hàng -->
            <?php foreach ($_SESSION['myCart'] as $index => $pro): ?>
                <?php $cartTotal += $pro['price'] * $pro['quantity']; // Cộng tổng tiền ?>

                <div class="cart_item">
                    <!-- Hình ảnh sản phẩm -->
                    <div class="cart_img">
                        <a href="#"><img src="<?= BASE_URL . $pro['image'] ?>" alt="<?= $pro['name'] ?>"></a>
                    </div>

                    <!-- Thông tin sản phẩm -->
                    <div class="cart_info">
                        <a href="#"><?= $pro['name'] ?></a>
                        <p><?= $pro['quantity'] ?> x <span><?= number_format($pro['price'], 0, ',', '.') ?>đ</span></p>
                    </div>

                    <!-- Nút xóa sản phẩm -->
                    <!-- <div class="cart_remove">
                        <a href="#" data-index="<?= $index ?>"><i class="icon-close icons"></i></a>
                    </div> -->
                </div>

            <?php endforeach; ?>
        </div>

        <!-- Hiển thị tổng tiền -->
        <div class="mini_cart_table">
            <div class="cart_table_border">
                <div class="cart_total mt-10">
                    <span>Tổng tiền:</span>
                    <span class="price"><?= number_format($cartTotal, 0, ',', '.') ?>đ</span>
                </div>
            </div>
        </div>

        <!-- Footer mini cart -->
        <div class="mini_cart_footer">
            <div class="cart_button">
                <a href="?action=addToCart"><i class="fa fa-shopping-cart"></i> Xem giỏ hàng</a>
            </div>
            <div class="cart_button">
                <a href="?action=show_checkout"><i class="fa fa-sign-in"></i> Thanh toán</a>
            </div>
        </div>
    </div>

<?php else: ?>
    <!-- Thông báo giỏ hàng trống -->
    <!-- <p>Giỏ hàng của bạn đang trống</p> -->
<?php endif; ?>

    <!--mini cart end-->

   