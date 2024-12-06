<?php include ('./views/client/layout/header.php'); ?>
<!-- <?= var_dump($product) ?>
<?= var_dump($variant) ?> -->
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area breadcrumbs_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="?action=client">Trang chủ</a></li>
                            <li><a href="?action=product&product_id=<?= $category_id?>"><?= $product['category_name'] ?></a></li>
                            <li><?= $product['name'] ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <section class="product_details mb-135">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                <div class="product_zoom_gallery">
    <div class="zoom_gallery_inner d-flex">
                <div class="zoom_tab_img">
                    <?php
                    // Trích xuất mảng `gallery` và chuyển đổi từ JSON nếu cần
                    $images = json_decode($product['gallery']); // Dữ liệu của bạn
                    if (is_array($images)) {
                        foreach ($images as $image) {
                            // Hiển thị từng ảnh nhỏ (thumbnail)
                            echo '<a class="zoom_tabimg_list" href="javascript:void(0)">
                                    <img src="' . $image . '" alt="tab-thumb" onclick="changeImage(this)" />
                                </a>';
                        }
                        }
                        ?>
                    </div>

                        <div class="product_zoom_main_img">
                            <div class="large-img">
                                <!-- Ảnh lớn, hiển thị mặc định là ảnh đầu tiên trong mảng -->
                                <img src="<?= $product['image']; ?>" alt="Large Image" width="100%" id="largeImage">
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // Hàm thay đổi ảnh lớn khi người dùng click vào ảnh nhỏ
                    function changeImage(thumbnail) {
                        var largeImage = document.getElementById("largeImage");
                        largeImage.src = thumbnail.src; // Cập nhật src của ảnh lớn
                    }
                </script>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       
                            <h1><div class="product-name">
                            <?= $product['name'] ?>
                </div> </h1>
                            <div class="product_ratting_review d-flex align-items-center">
                                <div class=" product_ratting">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_review">
                                    <ul class="d-flex">
                                        <li>4 đánh giá</li>
                                        <li>Viết đánh giá ngay</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="price_box">
                                <span class="current_price"><?=  $product['price'] ?></span>
                            </div>
                            <div class="product_availalbe">
    <ul class="d-flex">
        <li><i class="icon-layers icons"></i> Chỉ còn: <span id="quantity_display"><?= $product['quantity'] ?></span> sản phẩm </li>
        <li>Trạng thái: <span class="stock">Còn hàng</span></li>
    </ul>
</div>

<!-- Form chọn biến thể -->
<form action="?action=addToCart" method="post">
    <div class="product_variant">
        <!-- Chọn biến thể màu -->
        <div class="filter__list widget_color d-flex align-items-center">
            <h3>Màu sắc</h3>
            <?php
            $currentColor = null;
            usort($variant, function ($a, $b) {
                return strcmp($a['color'], $b['color']);
            });

            foreach ($variant as $va) {
                extract($va);

                if ($currentColor !== $color) {
                    echo '
                        <div class="size-item">
                            <input type="radio" name="color" id="color_' . htmlspecialchars($color) . '" 
                                   value="' . htmlspecialchars($color) . '" class="color" 
                                   data-quantity="' . htmlspecialchars($quantity) . '" 
                                   data-size="' . htmlspecialchars($size) . '" required>
                            <label for="color_' . htmlspecialchars($color) . '" class="color-label" >
                                ' . htmlspecialchars($color) . '
                            </label>
                        </div>
                    ';
                    $currentColor = $color;
                }
            }
            ?>
        </div>

        <!-- Chọn biến thể size -->
        <div class="filter__list widget_size d-flex align-items-center">
            <h3>Kích thước</h3>
            <?php
            $currentSize = null;
            usort($variant, function ($a, $b) {
                return strcmp($a['size'], $b['size']);
            });

            foreach ($variant as $va) {
                extract($va);

                if ($currentSize !== $size) {
                    echo '
                        <div class="size-item">
                            <input type="radio" name="size" id="size_' . htmlspecialchars($size) . '" 
                                   value="' . htmlspecialchars($size) . '" class="size" 
                                   data-quantity="' . htmlspecialchars($quantity) . '" required>
                            <label for="size_' . htmlspecialchars($size) . '" class="size-label">
                                ' . htmlspecialchars($size) . '
                            </label>
                        </div>
                    ';
                    $currentSize = $size;
                }
            }
            ?>
        </div>
        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
        <!-- Chọn số lượng -->
        <div class="variant_quantity_btn d-flex align-items-center">
            <button id="decrement" type="button">-</button>
            <input type="number" name="quantity" id="quantity" value="1" min="1">
            <button id="increment" type="button">+</button>
        </div>
        <!-- <input type="hidden" name="size" >
        <input type="hidden" name="color" > -->
        <button type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>

    </div>
</form>

                            <!-- end /////// -->
                            <div class="product_sku">
                                <p><span>SKU: </span> <?php echo $product_id ?></p>
                            </div>
                            <div class="product_tags d-flex">
                                <span>tags: </span>
                                <ul class="d-flex">
                                    <li><a href="#">thời trang,</a></li>
                                    <li><a href="#">áo nam,</a></li>
                                    <li><a href="#">giá rẻ</a></li>
                                </ul>
                            </div>
                            <!-- Phần mạng xã hội -->
                            <div class="priduct_social d-flex">
                                <span>SHARE: </span>
                                <ul>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-118">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button border-bottom">
                            <ul class="nav" role="tablist">
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews          </a>
                                </li>                    
                        </ul>
                        </div>
                        <div class="tab-content"> 
                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>1 review for Donec eu furniture</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul class="d-flex">
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                       <li><a href="#"><i class="icon-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p><strong>admin </strong>- September 12, 2018</p>
                                                <span>roadthemes</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published.  Required fields are marked </p>
                                    </div>
                                    <div class="product_ratting mb-10">
                                       <h3>Your rating</h3>
                                        <ul class="d-flex">
                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                               <li><a href="#"><i class="icon-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment" ></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author"  type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email"  type="text">
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--product area start-->
    <section class="product_area related_products mb-118">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title mb-50">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="product_container row">
                <div class=" product_slick slick_slider_activation" data-slick='{
                    "slidesToShow": 4,
                    "slidesToScroll": 1,
                    "arrows": true,
                    "dots": false,
                    "autoplay": false,
                    "speed": 300,
                    "infinite": true,
                    "responsive":[
                      {"breakpoint":992, "settings": { "slidesToShow": 3 } },
                      {"breakpoint":768, "settings": { "slidesToShow": 2 } },
                      {"breakpoint":300, "settings": { "slidesToShow": 1 } }
                     ]
                }'>
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="product-details.html" >
                                        <img class="primary_img" src="assets/img/product/product1.jpg" alt="consectetur">
                                    </a>
                                    <div class="product_action">
                                        <ul>
                                            <li class="wishlist"><a href="#" data-tippy="Wishlist" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-heart icons"></i></a></li>

                                            <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-size-fullscreen icons"></i></a></li>
                                            <li class="compare"><a data-tippy="Compare" href="#" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-refresh icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <figcaption class="product_content text-center">
                                    <div class="product_ratting">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><span>(4)</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="product-details.html">Basic Joggin Shorts</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">$26.00</span>
                                        <span class="old_price">$62.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a class="btn btn-primary" href="#" data-tippy="Add To Cart"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="product-details.html" >
                                        <img class="primary_img" src="assets/img/product/product2.jpg" alt="consectetur">
                                    </a>
                                    <div class="product_action">
                                        <ul>
                                            <li class="wishlist"><a href="#" data-tippy="Wishlist" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-heart icons"></i></a></li>

                                            <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-size-fullscreen icons"></i></a></li>
                                            <li class="compare"><a data-tippy="Compare" href="#" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-refresh icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_label">
                                        <span>-20%</span>
                                    </div>
                                </div>
                                <figcaption class="product_content text-center">
                                    <div class="product_ratting">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><span>(6)</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="product-details.html">Make Thing Happen T-Shirts</a></h4>
                                    <div class="price_box">
                                        <span class="text-black">$38.00</span>

                                    </div>
                                    <div class="add_to_cart">
                                        <a class="btn btn-primary" href="#" data-tippy="Add To Cart"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="product-details.html" >
                                        <img class="primary_img" src="assets/img/product/product3.jpg" alt="consectetur">
                                    </a>
                                    <div class="product_action">
                                        <ul>
                                            <li class="wishlist"><a href="#" data-tippy="Wishlist" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-heart icons"></i></a></li>

                                            <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-size-fullscreen icons"></i></a></li>
                                            <li class="compare"><a data-tippy="Compare" href="#" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-refresh icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_label">
                                        <span>-18%</span>
                                    </div>
                                </div>
                                <figcaption class="product_content text-center">
                                    <div class="product_ratting">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><span>(2)</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="product-details.html">Basic White Simple Sneaker</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">$43.00</span>
                                        <span class="old_price">$46.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a class="btn btn-primary" href="#" data-tippy="Add To Cart"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="product-details.html" >
                                        <img class="primary_img" src="assets/img/product/product4.jpg" alt="consectetur">
                                    </a>
                                    <div class="product_action">
                                        <ul>
                                            <li class="wishlist"><a href="#" data-tippy="Wishlist" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-heart icons"></i></a></li>

                                            <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-size-fullscreen icons"></i></a></li>
                                            <li class="compare"><a data-tippy="Compare" href="#" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-refresh icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <figcaption class="product_content text-center">
                                    <div class="product_ratting">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><span>(8)</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="product-details.html">Simple Rounded Sunglasses</a></h4>
                                    <div class="price_box">
                                       <span class="text-black">$42.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a class="btn btn-primary" href="#" data-tippy="Add To Cart"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="product-details.html" >
                                        <img class="primary_img" src="assets/img/product/product1.jpg" alt="consectetur">
                                    </a>
                                    <div class="product_action">
                                        <ul>
                                            <li class="wishlist"><a href="#" data-tippy="Wishlist" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-heart icons"></i></a></li>

                                            <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-size-fullscreen icons"></i></a></li>
                                            <li class="compare"><a data-tippy="Compare" href="#" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-refresh icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <figcaption class="product_content text-center">
                                    <div class="product_ratting">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><span>(12)</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="product-details.html">Basic Joggin Shorts</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">$26.00</span>
                                        <span class="old_price">$362.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a class="btn btn-primary" href="#" data-tippy="Add To Cart"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a href="product-details.html" >
                                        <img class="primary_img" src="assets/img/product/product2.jpg" alt="consectetur">
                                    </a>
                                    <div class="product_action">
                                        <ul>
                                            <li class="wishlist"><a href="#" data-tippy="Wishlist" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-heart icons"></i></a></li>

                                            <li class="quick_view"><a data-toggle="modal" data-target="#modal_box" data-tippy="Quick View" href="#" data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-size-fullscreen icons"></i></a></li>
                                            <li class="compare"><a data-tippy="Compare" href="#" data-tippy-inertia="true" data-tippy-delay="50"
                                            data-tippy-arrow="true" data-tippy-placement="left"><i class="icon-refresh icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_label">
                                        <span>-20%</span>
                                    </div>
                                </div>
                                <figcaption class="product_content text-center">
                                    <div class="product_ratting">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                                            <li><span>(14)</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="product_name"><a href="product-details.html">Simple Rounded Sunglasses</a></h4>
                                    <div class="price_box">
                                        <span class="current_price">$35.00</span>
                                        <span class="old_price">$38.00</span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a class="btn btn-primary" href="#" data-tippy="Add To Cart"  data-tippy-inertia="true" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-placement="top">Add To Cart</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->
    
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const decrementButton = document.getElementById("decrement");
        const incrementButton = document.getElementById("increment");
        const quantityInput = document.getElementById("quantity");
        const quantityDisplay = document.querySelector('.product_availalbe span'); // Phần tử hiển thị số lượng sản phẩm

        const colorInputs = document.querySelectorAll('input[name="color"]');
        const sizeInputs = document.querySelectorAll('input[name="size"]');

        // Hàm tự động chọn kích thước khi chọn màu
        function autoSelectSize() {
            const selectedColor = document.querySelector('input[name="color"]:checked');
            if (selectedColor) {
                // Lấy kích thước từ thuộc tính data-size của màu đã chọn
                const correspondingSize = selectedColor.getAttribute('data-size');
                
                // Deselect tất cả các lựa chọn kích thước trước đó
                sizeInputs.forEach(function (sizeInput) {
                    sizeInput.checked = false;
                });

                // Chọn kích thước tương ứng với màu đã chọn
                const sizeToSelect = document.querySelector(`input[name="size"][value="${correspondingSize}"]`);
                if (sizeToSelect) {
                    sizeToSelect.checked = true;
                }
            }
            updateQuantity(); // Cập nhật số lượng khi kích thước được chọn tự động
        }

        // Hàm cập nhật số lượng từ lựa chọn màu sắc hoặc kích thước
        function updateQuantity() {
            let selectedColor = document.querySelector('input[name="color"]:checked');
            let selectedSize = document.querySelector('input[name="size"]:checked');

            let availableQuantity = 0;
            if (selectedColor) {
                availableQuantity = selectedColor.getAttribute('data-quantity');
            } else if (selectedSize) {
                availableQuantity = selectedSize.getAttribute('data-quantity');
            }

            // Cập nhật hiển thị số lượng còn lại trong phần product_availalbe
            if (quantityDisplay) {
                quantityDisplay.textContent = availableQuantity; // Cập nhật giá trị số lượng
            }

            // Đảm bảo rằng số lượng không vượt quá số lượng tối đa của biến thể
            if (parseInt(quantityInput.value) > availableQuantity) {
                quantityInput.value = availableQuantity;
            }
        }

        // Cập nhật số lượng khi thay đổi lựa chọn màu sắc hoặc kích thước
        colorInputs.forEach(function (colorInput) {
            colorInput.addEventListener('change', function () {
                autoSelectSize(); // Tự động chọn kích thước khi màu thay đổi
                updateQuantity();  // Cập nhật số lượng khi màu thay đổi
            });
        });

        sizeInputs.forEach(function (sizeInput) {
            sizeInput.addEventListener('change', updateQuantity); // Cập nhật số lượng khi kích thước thay đổi
        });

        // Điều khiển các nút giảm và tăng số lượng
        decrementButton.addEventListener("click", function () {
            let currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
            updateQuantity(); // Cập nhật lại số lượng hiển thị bên ngoài
        });

        incrementButton.addEventListener("click", function () {
            let currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
            updateQuantity(); // Cập nhật lại số lượng hiển thị bên ngoài
        });

        // Đảm bảo rằng giá trị của số lượng không vượt quá số lượng tối đa của biến thể
        quantityInput.addEventListener('input', function () {
            let currentQuantity = parseInt(quantityInput.value);
            let selectedColor = document.querySelector('input[name="color"]:checked');
            let selectedSize = document.querySelector('input[name="size"]:checked');

            let maxQuantity = 0;
            if (selectedColor) {
                maxQuantity = parseInt(selectedColor.getAttribute('data-quantity'));
            } else if (selectedSize) {
                maxQuantity = parseInt(selectedSize.getAttribute('data-quantity'));
            }

            // Nếu số lượng nhập vào vượt quá giới hạn, đặt lại giá trị của số lượng
            if (currentQuantity > maxQuantity) {
                quantityInput.value = maxQuantity;
            } else if (currentQuantity < 1) {
                quantityInput.value = 1;
            }
            updateQuantity(); // Cập nhật lại số lượng hiển thị bên ngoài
        });

        // Cập nhật lần đầu khi trang được tải
        updateQuantity();
    });
</script>
    
    <?php include './views/client/layout/modalPoduct.php' ?>
    <?php include './views/client/layout/miniCart.php' ?>
    <?php include ('./views/client/layout/footer.php'); ?>
    <style>
        .variant_quantity_btn {
    display: flex;
    align-items: center;
    gap: 10px; /* Khoảng cách giữa các phần tử */
}

.variant_quantity_btn button {
    width: 30px;
    height: 30px;
    background-color: #1a4594; /* Màu cam cho nút */
    color: #fff; /* Màu chữ */
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background-color 0.3s ease;
}

.variant_quantity_btn button:hover {
    background-color: #e63900; /* Màu khi hover */
}

.variant_quantity_btn input[type="number"] {
    width: 60px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 5px;
    outline: none;
    -moz-appearance: textfield; /* Loại bỏ mũi tên trong Firefox */
}

.variant_quantity_btn input[type="number"]::-webkit-inner-spin-button,
.variant_quantity_btn input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none; /* Loại bỏ mũi tên trong Chrome */
    margin: 0;
}

button[name="add_to_cart"] {
    background-color: #1a4594; /* Màu cam cho nút */
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-left: 20px;
}

button[name="add_to_cart"]:hover {
    background-color: #e63900; /* Màu khi hover */
}
    </style>


