<?php include ('./views/client/layout/header.php'); ?>
<style>
    /* Base styling for the container */
.condition {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style for each step form */
.step-cart, .step-checkout, .step-complete {
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.step-cart svg, .step-checkout svg, .step-complete svg {
    margin-right: 10px;
    transition: transform 0.3s ease;
}

/* Text styling for steps */
.step-complete p, .step-checkout p, .step-cart p {
    font-size: 14px;
    color: rgb(153, 153, 153);
    font-weight: bold;
    margin: 0;
}

.step-complete:hover p, .step-checkout:hover p, .step-cart.active p {
    color: #C92027;
}

.step-complete:hover svg, .step-checkout:hover svg, .step-cart.active svg {
    transform: scale(1.1);
    fill: #C92027;
}

/* Dotline separator */
.dotline {
    flex-grow: 1;
    height: 1px;
    background-color: #ddd;
    margin: 0 15px;
}

/* Active step */
.step-cart.active p {
    color: #C92027;
}

.step-cart.active svg {
    fill: #C92027;
}

/* Responsive styling */
@media (max-width: 768px) {
    .condition {
        flex-direction: column;
        align-items: flex-start;
    }

    .dotline {
        display: none;
    }

    .step-cart, .step-checkout, .step-complete {
        margin-bottom: 10px;
    }
}
</style>

      <!--breadcrumbs area start-->
    <div class="breadcrumbs_area breadcrumbs_other">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
                        <ul>
                        <div class="condition">
                    <form class="step-cart active">
                        <svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.901086 20.3C0.694829 20.3 0.49699 20.2182 0.350956 20.0726C0.204923 19.9269 0.122616 19.7293 0.122086 19.523V5.77004C0.121428 5.66723 0.141077 5.56529 0.179905 5.47009C0.218734 5.37489 0.275979 5.28829 0.348355 5.21526C0.420732 5.14224 0.506815 5.08422 0.601666 5.04454C0.696518 5.00486 0.79827 4.9843 0.901086 4.98404H3.28709C3.44223 3.69357 4.06487 2.50469 5.03724 1.64221C6.00962 0.779738 7.26433 0.303467 8.56409 0.303467C9.86385 0.303467 11.1186 0.779738 12.0909 1.64221C13.0633 2.50469 13.6859 3.69357 13.8411 4.98404H16.2221C16.3254 4.98364 16.4278 5.0037 16.5233 5.04306C16.6189 5.08242 16.7057 5.14031 16.7788 5.21337C16.8518 5.28644 16.9097 5.37324 16.9491 5.46878C16.9884 5.56432 17.0085 5.66671 17.0081 5.77004V19.523C17.0076 19.6257 16.9868 19.7272 16.947 19.8218C16.9072 19.9165 16.8492 20.0023 16.7762 20.0745C16.7032 20.1466 16.6166 20.2037 16.5216 20.2424C16.4265 20.2811 16.3247 20.3007 16.2221 20.3H0.901086ZM4.86409 4.98404H12.2641C12.1169 4.10917 11.6645 3.31475 10.9871 2.74183C10.3097 2.16891 9.45125 1.85454 8.56409 1.85454C7.67692 1.85454 6.81845 2.16891 6.14108 2.74183C5.46372 3.31475 5.01128 4.10917 4.86409 4.98404Z" fill="#C92027"></path>
                            <path d="M12.7541 8.65607V6.78107H14.5011V8.65607C14.5011 9.00107 14.1101 9.28107 13.6281 9.28107C13.1461 9.28107 12.7541 9.00107 12.7541 8.65607ZM2.62207 8.65607V6.78107H4.36907V8.65607C4.36907 9.00107 3.97807 9.28107 3.49507 9.28107C3.01207 9.28107 2.62207 9.00107 2.62207 8.65607Z" fill="white" ></path>
                        </svg>
                        <p onclick="window.location.replace('index.php?action=addToCart')">GIỎ HÀNG</p>
                    </form>
                    <div class="dotline"></div>
                    <div class="step-checkout">
                        <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.35 0.806049C13.2609 0.652538 13.1331 0.525046 12.9794 0.436268C12.8257 0.347491 12.6515 0.300525 12.474 0.300049H8.70996V4.75205H15.633L13.35 0.806049Z" fill="rgb(153, 153, 153)"></path>
                            <path d="M7.65586 0.300049H3.85586C3.67808 0.300351 3.5035 0.347343 3.34959 0.43632C3.19568 0.525297 3.06784 0.653138 2.97886 0.807049L0.703857 4.75205H7.65386V0.300049H7.65586Z" fill="rgb(153, 153, 153)"></path>
                            <path d="M0.326904 5.80707V17.0591C0.327434 17.3879 0.458386 17.7032 0.691032 17.9357C0.923679 18.1681 1.23903 18.2988 1.56791 18.2991H14.7619C15.0908 18.2988 15.4061 18.1681 15.6388 17.9357C15.8714 17.7032 16.0024 17.3879 16.0029 17.0591V5.80707H0.326904ZM10.5599 10.5391L7.83191 13.2671C7.78296 13.3161 7.72482 13.355 7.66081 13.3816C7.59681 13.4081 7.5282 13.4218 7.4589 13.4218C7.38961 13.4218 7.321 13.4081 7.257 13.3816C7.193 13.355 7.13486 13.3161 7.08591 13.2671L5.8069 11.9881C5.75437 11.9399 5.71212 11.8816 5.68272 11.8167C5.65332 11.7518 5.63736 11.6816 5.63581 11.6103C5.63426 11.5391 5.64716 11.4683 5.67371 11.4021C5.70027 11.336 5.73994 11.2759 5.79034 11.2255C5.84073 11.1751 5.90081 11.1354 5.96694 11.1089C6.03308 11.0823 6.10391 11.0694 6.17516 11.071C6.24641 11.0725 6.31661 11.0885 6.38153 11.1179C6.44645 11.1473 6.50475 11.1895 6.55291 11.2421L7.4589 12.1481L9.8149 9.79207C9.86389 9.74309 9.92204 9.70423 9.98604 9.67772C10.05 9.65121 10.1186 9.63757 10.1879 9.63757C10.2572 9.63757 10.3258 9.65121 10.3898 9.67772C10.4538 9.70423 10.5119 9.74309 10.5609 9.79207C10.6099 9.84105 10.6487 9.89921 10.6753 9.96321C10.7018 10.0272 10.7154 10.0958 10.7154 10.1651C10.7154 10.2343 10.7018 10.3029 10.6753 10.3669C10.6487 10.4309 10.6099 10.4891 10.5609 10.5381L10.5599 10.5391Z" fill="rgb(153, 153, 153)"></path>
                        </svg>
                        <p>THANH TOÁN</p>
                    </div>
                    <div class="dotline"></div>
                    <div class="step-complete ">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.3259 9.70705V0.930049C16.3259 0.762962 16.2596 0.602719 16.1414 0.484572C16.0233 0.366424 15.863 0.300049 15.6959 0.300049L11.3039 0.300049V6.52405C11.3043 6.63809 11.2736 6.75007 11.2153 6.84807C11.157 6.94607 11.0732 7.0264 10.9728 7.08049C10.8724 7.13459 10.7592 7.16042 10.6453 7.15524C10.5314 7.15005 10.421 7.11404 10.3259 7.05105L8.32593 5.73905L6.32593 7.05105C6.23091 7.11324 6.12084 7.14859 6.00738 7.15336C5.89391 7.15812 5.78127 7.13213 5.68136 7.07813C5.58146 7.02413 5.49801 6.94413 5.43984 6.8466C5.38167 6.74906 5.35095 6.63761 5.35093 6.52405V0.300049H0.955928C0.788841 0.300049 0.628598 0.366424 0.51045 0.484572C0.392303 0.602719 0.325928 0.762962 0.325928 0.930049L0.325928 14.23C0.325928 14.3128 0.342223 14.3947 0.373884 14.4711C0.405544 14.5476 0.45195 14.617 0.51045 14.6755C0.568951 14.734 0.638402 14.7804 0.714837 14.8121C0.791272 14.8438 0.873195 14.86 0.955928 14.86H10.0709C10.3089 13.3875 11.0752 12.0522 12.2265 11.1037C13.3777 10.1553 14.8351 9.65877 16.3259 9.70705Z" fill="rgb(153, 153, 153)" ></path>
                            <path d="M8.67093 4.45905L10.0439 5.35905V0.300049H6.60693V5.35805L7.97993 4.45805C8.08259 4.39063 8.20277 4.35479 8.32559 4.35497C8.44841 4.35514 8.56847 4.39133 8.67093 4.45905Z" fill="rgb(153, 153, 153)" ></path>
                            <path d="M16.5559 12.4811C15.8103 12.4811 15.0814 12.7022 14.4614 13.1164C13.8414 13.5307 13.3582 14.1195 13.0729 14.8083C12.7875 15.4972 12.7129 16.2553 12.8583 16.9866C13.0038 17.7179 13.3629 18.3896 13.8901 18.9169C14.4173 19.4441 15.0891 19.8032 15.8204 19.9486C16.5517 20.0941 17.3097 20.0194 17.9986 19.7341C18.6875 19.4488 19.2763 18.9656 19.6905 18.3456C20.1048 17.7256 20.3259 16.9967 20.3259 16.2511C20.3248 15.2515 19.9273 14.2932 19.2205 13.5865C18.5137 12.8797 17.5554 12.4821 16.5559 12.4811ZM18.7759 15.5811L16.2959 18.0621C16.2044 18.1535 16.0803 18.2049 15.9509 18.2049C15.8215 18.2049 15.6974 18.1535 15.6059 18.0621L14.2429 16.6991C14.1961 16.6541 14.1587 16.6002 14.133 16.5406C14.1073 16.4811 14.0937 16.4169 14.0931 16.3521C14.0924 16.2872 14.1047 16.2228 14.1293 16.1627C14.1538 16.1026 14.1901 16.048 14.236 16.0021C14.2818 15.9562 14.3365 15.92 14.3965 15.8954C14.4566 15.8709 14.521 15.8586 14.5859 15.8592C14.6508 15.8599 14.7149 15.8735 14.7745 15.8992C14.8341 15.9249 14.8879 15.9623 14.9329 16.0091L15.9509 17.0271L18.0859 14.8921C18.178 14.8035 18.3011 14.7547 18.4289 14.756C18.5566 14.7572 18.6788 14.8085 18.7691 14.8989C18.8594 14.9892 18.9107 15.1113 18.912 15.2391C18.9133 15.3668 18.8644 15.49 18.7759 15.5821V15.5811Z" fill="rgb(153, 153, 153)"></path>
                        </svg>
                        <p>HOÀN THÀNH ĐƠN HÀNG</p>
                    </div>
</div>
                        </ul>
                        
                        <h3>Giỏ hàng</h3>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!-- <?php echo var_dump($_SESSION['myCart']) ?> -->
     <!--shopping cart area start -->
    <div class="shopping_cart_area">
        <div class="container">
            <form action="#">
                <div class="cart_page_inner mb-60">
                    <div class="row">
                        <div class="col-12">
                            <div class="cart_page_tabel">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Thông Tin</th>
                                        <th>Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Tổng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php $cartTotal = 0; // Biến tổng giá trị giỏ hàng ?>
                                    <?php if(isset($_SESSION['myCart']) && count($_SESSION['myCart'])>0){
                                    foreach ($_SESSION['myCart'] as $index => $pro) : ?>
                                        <?php $cartTotal += $pro['price'] * $pro['quantity']; ?>
                                        <tr class="border-top" data-index="<?= $index ?>">
                                            <td>
                                                <div class="cart_product_thumb">
                                                    <img src="<?= BASE_URL . $pro['image'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart_product_text">
                                                    <h4><?= $pro['name'] ?></h4>
                                                    <ul>
                                                        <li><i class="ion-ios-arrow-right"></i> Màu sắc : <span><?= $pro['color'] ?></span></li>
                                                        <li><i class="ion-ios-arrow-right"></i> Kích thước : <span><?= $pro['size'] ?></span></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart_product_price">
                                                    <span><?= number_format($pro['price'], 0, ',', '.') ?>đ</span>
                                                </div>
                                            </td>
                                           
                                            <td class="product_quantity">
                                                <div class="cart_product_quantity">
                                                    <input 
                                                        min="1" 
                                                        
                                                        value="<?= $pro['quantity'] ?>" 
                                                        type="number" 
                                                        class="quantity-input" 
                                                        data-price="<?= $pro['price'] ?>" 
                                                        data-index="<?= $index ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart_product_price total-price">
                                                    <span><?= number_format($pro['price'] * $pro['quantity'], 0, ',', '.') ?>đ</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="cart_product_remove text-right">
                                                    <a href="" class="remove-item" data-index="<?= $index ?>"><i class="ion-android-close"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; } 
                                    else{
                                        // echo "Giỏ hàng của bạn đang trống";
                                    }?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr class="cart_grandtotal  ">
                                        <td colspan="4" class="text-right text-danger" style="font-size: 30px;">Tổng cộng:</td>
                                        <td colspan="2" class="cart-total text-danger " >
                                            <span style="font-size: 30px;"><?= number_format($cartTotal, 0, ',', '.') ?>đ</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            </div>
                            <div class="cart_page_button border-top d-flex justify-content-between grand_totall_area" style="height:200px;background-color:#aecfed ">
                                
                                <div class="shopping_continue_btn">
                                    <a href="?action=addToCart&emptyCart=1" class="btn btn-primary">XOÁ TOÀN BỘ GIỎ HÀNG</a>
                                    <button  type="submit" class="btn btn-primary">TIẾP TỤC MUA SẮM</button>
                                </div>
                                <!--Tổng tiền  -->
                                <div class="col-lg-4 col-md-6 col-sm-8">
                                <div class="grand_totall_area" style="background-color:#aecfed">
                                <div class="mb-2  border-bottom " >
                                    
                                    <!-- <div class="cart_grandtotal d-flex justify-content-between ">
                                        <p style="font-size: 28px;" class="cart-total" >Tổng</p>
                                        <span style="font-size: 28px;" ><?= number_format($cartTotal, 0, ',', '.') ?>đ
                                            </span>
                                    </div> -->
                                </div>
                                <div class="proceed_checkout_btn" >
                                    <a class="btn btn-primary" href="?action=show_checkout">Tiến Hành Thanh Toán</a>
                                </div>
                                </div>
                            </div>
                            </div>
                         </div>
                     </div>
                 </div>
                 <!--coupon code area start-->
                <div class="cart_page_bottom">
                    <div class="row">
                        
                        <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="shopping_coupon_calculate">
                                <h3 class="border-bottom">Mã Giảm Giá   </h3>
                                <p>Enter your coupon code if you have one.</p>
                                <input class="border" placeholder="Enter your code" type="text">
                                <button class="btn btn-primary" type="submit">apply coupon</button>
                            </div>
                        </div> -->
                        
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
     <!--shopping cart area end -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const cartTable = document.querySelector('table');
    const cartTotal = document.querySelector('.cart-total span');

    // Gửi AJAX để cập nhật số lượng
    function updateQuantity(index, quantity) {
        fetch('?action=update_cart_quantity', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `index=${index}&quantity=${quantity}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Cập nhật tổng tiền sản phẩm
                const row = cartTable.querySelector(`tr[data-index="${index}"]`);
                const totalCell = row.querySelector('.total-price span');
                totalCell.textContent = data.productTotal.toLocaleString('vi-VN') + 'đ';

                // Cập nhật tổng tiền giỏ hàng
                cartTotal.textContent = data.cartTotal.toLocaleString('vi-VN') + 'đ';
            } else {
                alert(data.message || 'Có lỗi xảy ra!');
            }
        });
    }

    // Gửi AJAX để xóa sản phẩm
    function removeItem(index) {
        fetch('?action=remove_cart_item', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `index=${index}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Xóa dòng sản phẩm khỏi bảng
                const row = cartTable.querySelector(`tr[data-index="${index}"]`);
                row.remove();

                // Cập nhật tổng tiền giỏ hàng
                cartTotal.textContent = data.cartTotal.toLocaleString('vi-VN') + 'đ';
            } else {
                alert(data.message || 'Có lỗi xảy ra!');
            }
        });
    }

    // Lắng nghe thay đổi số lượng
    cartTable.addEventListener('input', function (e) {
        if (e.target.classList.contains('quantity-input')) {
            const quantity = parseInt(e.target.value, 10);
            const index = e.target.dataset.index;

            updateQuantity(index, quantity);
        }
    });

    // Lắng nghe sự kiện xóa sản phẩm
    cartTable.addEventListener('click', function (e) {
        if (e.target.closest('.remove-item')) {
            const index = e.target.closest('.remove-item').dataset.index;

            if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
                removeItem(index);
            }
        }
    });
});

</script>
     <?php include ('./views/client/layout/footer.php'); ?>
     <?php include './views/client/layout/miniCart.php' ?>