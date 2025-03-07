<?php include('./views/admin/layout/header.php'); ?>

<div class="content-area">
    <div class="container py-5">
        <h2 class="text-center mb-4">Chi Tiết Đơn Hàng</h2>
        <a href="?action=listOrders">Quay lại trang Đơn hàng</a>
        <section class="h-100 gradient-custom">
            <div class="card" style="border-radius: 10px;">
                
                <div class="card-body p-4">
              
                    <?php   $totalPrice = 0; // Khởi tạo biến tổng tiền
                    foreach ($showOrder as $item) { 
                        $totalPrice += $item['order_price'];
                        ?>
                        <div class="card shadow-sm border mb-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="<?= $item['image'] ?>"
                                            alt="Ảnh sản phẩm"
                                            class="img-fluid rounded"
                                            style="width: 100%; height: auto;">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p class="text-muted mb-0">Khách hàng: <?= $item['customer_name'] ?></p>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p class="text-muted mb-0">Địa chỉ: <?= $item['address'] ?></p>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p class="text-muted mb-0 small">Giá: <?=number_format($item['order_price'], 0, ',', '.')  ?> đ</p> 
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p class="text-muted mb-0 small">SL: <?= $item['quantity'] ?></p>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p class="text-muted mb-0 small">SDT: <?= $item['phone'] ?></p>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p class="text-muted mb-0 small">Ngày đặt: <?= $item['detail_created_at'] ?></p>
                                    </div>
                                </div>
                                <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-footer border-0 px-4 py-5 text-white"
                    style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <h5 class="d-flex align-items-center justify-content-end text-uppercase mb-0">
                        Tổng tiền đơn hàng:
                        <span class="h2 mb-0 ms-2"><?= number_format($totalPrice, 0, ',', '.') ?> đ</span>
                    </h5>
                </div>
                    </div>
<?php include('./views/admin/layout/footer.php'); ?>