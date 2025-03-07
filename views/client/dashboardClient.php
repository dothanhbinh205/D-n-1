
<?php include './views/client/layout/headerHome.php' ?>


    <!-- bat dau moi -->
    <!-- product section start -->
    <section class="product_section mb-96">
        <div class="container">
            <div class="product_header d-flex justify-content-between  mb-50">
                <div class="section_title">
                    <h2>Sản phẩm mới</h2>
                </div>

                
                   
            </div>
            <div class="product_container row">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="product_slick slick_slider_activation" data-slick='{
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
                                <!-- <?php echo "<pre>";
                                                                    print_r($listProductLastes);  
                                                                    ?> -->
                                <!-- sản phẩm -->
                                
                                <?php foreach ($listProductLastes as $product) : ?> 
                                    <?php if ($product->status == 1):   // Chỉ hiển thị sản phẩm có status == 1 ?>
                                    <article class="col single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="<?='?action=product-details&product_id='.$product->product_id?>">
                                                    <img class="primary_img" src="<?=$product->image ?>"
                                                        alt="consectetur">
                                                </a>
                                                
                                            </div>
                                            <div class="product_content text-center">
                                                <!-- <div class="product_ratting">
                                                    <ul class="d-flex justify-content-center">
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><span>(4)</span></li>
                                                    </ul>
                                                </div> -->
                                                <h4 class="product_name"><a href="###"><?= $product->name ?></a>
                                                </h4>
                                                <div class="price_box">
                                                    <span class="current_price"><?= number_format($product->price, 0, ',', '.') ?>đ</span>
                                                    <span class="old_price"><?= number_format($product->sale_price , 0, ',', '.')?>đ</span>
                                                </div>

                                                    <div class="add_to_cart">
                                                        <!-- <form action="?action=addToCart" method="POST"> -->
                                                            <!-- <input type="hidden" name="product_id" value="<?php echo $product->product_id ?>">
                                                            <input type="hidden" name="quantity" value="1"> -->
                                                            <a class="btn btn-primary" href="<?='?action=product-details&product_id='.$product->product_id?>" >Mua ngay</a>
                                                        <!-- </form> -->
                                                    </div>

                                            </div>
                                        </figure>
                                    </article>
                                    <?php endif; ?>
                                <?php endforeach; ?> 
                                <!-- kết thúc sản phẩm -->

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->


    <!-- banner section start -->
    <section class="banner_section mb-109">
        <div class="container">
            
            <div class="banner_container d-flex">
                <figure class="single_banner position-relative">
                    <img src="public/client/assets/img/bg/m40pezoh9j22rf0z4lf1800x833.webp" alt="">
                    <figcaption class="banner_text position-absolute">
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- product section start -->
    <section class="product_section mb-96">
        <div class="container">
            <div class="product_header d-flex justify-content-between  mb-50">
                <div class="section_title">
                    <h2>Áo phao nam</h2>
                </div>
                <div class="all_product">
                        <a href="?action=CategoryProductClient&id=14">Xem thêm</a>
                    </div>
                

            </div>
            <div class="product_container row">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="product_slick slick_slider_activation" data-slick='{
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
                            
                            <!-- sản phẩm -->
                                
                            <?php foreach ($aophao as $product) : ?> 
                                    
                                    <?php if ($product->status == 1):   // Chỉ hiển thị sản phẩm có status == 1 ?>
                                    <article class="col single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="<?='?action=product-details&product_id='.$product->product_id?>">
                                                    <img class="primary_img" src="<?=$product->image ?>"
                                                        alt="consectetur">
                                                </a>
                                                
                                            </div>
                                            <div class="product_content text-center">
                                                <!-- <div class="product_ratting">
                                                    <ul class="d-flex justify-content-center">
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><span>(4)</span></li>
                                                    </ul>
                                                </div> -->
                                                <h4 class="product_name"><a href="###"><?= $product->name ?></a>
                                                </h4>
                                                <div class="price_box">
                                                    <span class="current_price"><?= number_format($product->price, 0, ',', '.') ?>đ</span>
                                                    <span class="old_price"><?= number_format($product->sale_price , 0, ',', '.')?>đ</span>
                                                </div>

                                                <div class="add_to_cart">
                                                        <!-- <form action="?action=addToCart" method="POST"> -->
                                                            <!-- <input type="hidden" name="product_id" value="<?php echo $product->product_id ?>">
                                                            <input type="hidden" name="quantity" value="1"> -->
                                                            <a class="btn btn-primary" href="<?='?action=product-details&product_id='.$product->product_id?>" >Mua ngay</a>
                                                        <!-- </form> -->
                                                    </div>

                                            </div>
                                        </figure>
                                    </article>
                                    <?php endif; ?>
                                <?php endforeach; ?> 
                                <!-- kết thúc sản phẩm -->
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->

    <!-- banner section start -->
    <section class="banner_section mb-109">
        <div class="container">           
                <div class="banner_container d-flex">
                    <figure class="single_banner position-relative">
                        <img src="public/client/assets/img/bg/Sale_1366x532_061124_1.webp" alt="">
                    </figure>
                </div>
        </div>
    </section>
    
    <!-- banner section end -->

    <!-- product section start -->
    <section class="product_section mb-96">
        <div class="container">
            <div class="product_header d-flex justify-content-between  mb-50">
                <div class="section_title">
                    <h2>Sản phẩm áo len</h2>
                </div>
                <div class="all_product">
                        <a href="?action=CategoryProductClient&id=17">Xem thêm</a>
                    </div>
                
                    

            </div>
            <div class="product_container row">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="product_slick slick_slider_activation" data-slick='{
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
                            <!-- sản phẩm -->
                                
                            <?php foreach ($aolen as $product) : ?> 
                                    <?php if ($product->status == 1):   // Chỉ hiển thị sản phẩm có status == 1 ?>
                                    <article class="col single_product">
                                        <figure>
                                            <div class="product_thumb">
                                                <a href="<?='?action=product-details&product_id='.$product->product_id?>">
                                                    <img class="primary_img" src="<?=$product->image ?>"
                                                        alt="consectetur">
                                                </a>
                                                
                                            </div>
                                            <div class="product_content text-center">
                                                <!-- <div class="product_ratting">
                                                    <ul class="d-flex justify-content-center">
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star"></i></a></li>
                                                        <li><span>(4)</span></li>
                                                    </ul>
                                                </div> -->
                                                <h4 class="product_name"><a href="###"><?= $product->name ?></a>
                                                </h4>
                                                <div class="price_box">
                                                    <span class="current_price"><?= number_format($product->price, 0, ',', '.') ?>đ</span>
                                                    <span class="old_price"><?= number_format($product->sale_price , 0, ',', '.')?>đ</span>
                                                </div>

                                                <div class="add_to_cart">
                                                        <!-- <form action="?action=addToCart" method="POST"> -->
                                                            <!-- <input type="hidden" name="product_id" value="<?php echo $product->product_id ?>">
                                                            <input type="hidden" name="quantity" value="1"> -->
                                                            <a class="btn btn-primary" href="<?='?action=product-details&product_id='.$product->product_id?>" >Mua ngay</a>
                                                        <!-- </form> -->
                                                    </div>

                                            </div>
                                        </figure>
                                    </article>
                                    <?php endif; ?>
                                <?php endforeach; ?> 
                                <!-- kết thúc sản phẩm -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->

    


    
    <?php include './views/client/layout/miniCart.php' ?>

    <?php include './views/client/layout/footerHome.php' ?>



