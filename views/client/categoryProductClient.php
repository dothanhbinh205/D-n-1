<?php include ('./views/client/layout/header.php'); ?>
<?php
// Lấy category_id từ URL
$category_id = isset($_GET['id']) ? $_GET['id'] : null;

// Lọc sản phẩm theo category_id nếu có
$filteredProducts = $category_id
    ? array_filter($products, function ($product) use ($category_id) {
        return $product['category_id'] == $category_id;
    })
    : $products;
?>
    <div class="shop_section shop_reverse">
        <div class="container">
            <div class="row">
            <div class="shop_banner d-flex align-items-center"  data-bgimg="public/client/assets/img/bg/Sale_1366x532_061124_1.webp">
                    </div>
                <div class="col-lg-3 col-md-12">
                   <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h2>Danh mục</h2>
                                <ul>
                                    <li class="widget_sub_categories"><a href="javascript:void(0)" data-toggle="collapse" data-target="#men">Áo Nam</a>
                                        <ul class="widget_dropdown_categories collapse show" id="men">
                                            <?php foreach ($listCategories as $category): ?>
                                                <li><a href="<?= '?action=CategoryProductClient&id='.$category['category_id'] ?>"><?php echo $category['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->

                    <!--breadcrumbs area start-->
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="?action=client">Trang chủ</a></li>
                            <li><a href="?action=CategoryProductClient">Áo Nam</a></li>
                        </ul>
                    </div>
                    <!--breadcrumbs area end-->

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper d-flex justify-content-between align-items-center">
                        <!-- <div class="page_amount">
                            <p><span>1.260</span> Products Found</p>
                        </div> -->
                        <div class="toolbar_btn_wrapper d-flex align-items-center">
                            <div class="view_btn">
                                <a class="view" href="#">XEM</a>
                            </div>
                            <div class="shop_toolbar_btn">
                                <ul class="d-flex align-items-center">
                                    <li><a href="#" class="active btn-grid-3" data-role="grid_3" data-tippy="3"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top"><i class="ion-grid"></i></a></li>

                                    <li><a href="#" class="btn-list" data-role="grid_list" data-tippy="List" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top"><i class="ion-navicon"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                     <!--shop toolbar end-->
                     <div class="row shop_wrapper">
                        <!-- bat dau -->
                        <?php foreach ($filteredProducts as $product): ?>
                            <?php if ($product['status'] == 1): ?> 
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 ">
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="<?='?action=product-details&product_id='.$product['product_id'] ?>" >
                                                <img class="primary_img" src="<?= $product['image']; ?>" alt="consectetur">
                                            </a>  
 
                                        </div>
                                        <div class="product_content grid_content text-center">
                                            
                                            <h4 class="product_name">
                                                <a href="<?= '?action=product-details&product_id='.$product['product_id'] ?>">
                                                        <?= htmlspecialchars($product['product_name']); ?>
                                                </a>
                                            </h4>
                                            <div class="price_box">
                                                <span class="current_price"><?= number_format($product['price'], 0, ',', '.') ?>đ</span>
                                                <span class="old_price"><?= number_format($product['sale_price'], 0, ',', '.') ?>đ</span>
                                            </div>
                                            <div class="add_to_cart">
                                                <form action="?action=addToCart" method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button class="btn btn-primary" href="#" name="add_to_cart"  data-tippy="Mua ngay"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top" >Mua ngay</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="product_list_content">
                                            <h4 class="product_name"><a href="<?= '?action=product-details&product_id='.$product['product_id'] ?>"><?= $product['product_name'] ?></a></h4>
                                            <p><a href="#">shows</a></p>
                                            <div class="price_box">
                                                <span class="current_price"><?= number_format($product['price'], 0, ',', '.') ?>đ</span>
                                                <span class="old_price"><?= number_format($product['sale_price'], 0, ',', '.') ?>đ</span>
                                            </div>
                                            <div class="product_desc">
                                                <p><?= $product['description'] ?></p>
                                            </div>

                                            <div class="add_to_cart">
                                                <form action="?action=addToCart" method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button class="btn btn-primary" href="#" name="add_to_cart"  data-tippy="Add To Cart"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top" >Mua ngay</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (empty($filteredProducts)): ?>
                            <p>Không có sản phẩm nào trong danh mục này.</p>
                        <?php endif; ?>
                        <!-- end -->
                      
                    </div>
                    <!-- <?php var_dump($product) ?> -->
                    <!-- <div class="pagination_style pagination justify-content-center">
                        <ul class="d-flex">
                            <li><a href="#"> << </a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="current" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div> -->

                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->
    <?php include './views/client/layout/miniCart.php' ?>
    <?php include ('./views/client/layout/footer.php'); ?>

