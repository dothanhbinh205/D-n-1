<style>
#file-info {
    display: none;
}

input {
    display: none;
}

</style>

<?php include ('./views/admin/layout/header.php'); ?>
<section id="sidebar">
    <a href="index.php" class="brand">
        <img src="../uploads/logo_owenstore.svg" alt="">
    </a>
    <ul class="side-menu top">
        <li>
            <a href="index.php?action=admin">
                <i class='bx bxs-home'></i>
                <span class="text">Trang Chủ</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=home-dm">
                <i class='bx bxs-category-alt'></i>
                <span class="text">Danh Mục</span>
            </a>
        </li>
        <li class="active">
            <a href="index.php?action=product">
                <i class='bx bxs-window-alt'></i>
                <span class="text">Sản Phẩm</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=listOrders">
                <i class='bx bxs-calendar-check'></i>
                <span class="text">Đơn Hàng</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=showComment">
                <i class='bx bxs-chat'></i>
                <span class="text">Phản Hồi</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=all_register">
                <i class='bx bxs-group'></i>
                <span class="text">Tài Khoản</span>
            </a>
        </li>
       

    </ul>
    <ul class="side-menu">
        <li>
            <a href="index.php?action=logout" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Đăng Xuất</span>
            </a>
        </li>
    </ul>
</section>

<section id="content">
<nav>
        <i class='bx bx-menu'></i>
        <a href="?action=admin" class="nav-link">Trang Chủ</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Tìm Kiếm...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell'></i>
            <span class="num">8</span>
        </a>
        <div class="header_account">
                                <ul class="d-flex">
                                    <li class="header_search"><a href="#"><i class="icon-magnifier icons"></i></a></li>
                                    <li class="account_link">
                                        <a href="#"><i class="icon-user icons"></i> Tài Khoản</a>
                                        <ul class="dropdown_account_link">
                                            <?php if (isset($_SESSION['name'])) { ?>
                                                <li><a href="?action=profile"><i class="fas fa-user-circle"></i> Xin Chào <?= ($_SESSION['name']['name']) ?>!</a></li>
                                                <li><a href="?action=profile"><i class="fas fa-user-cog"></i> Quản Lý Tài Khoản</a></li>
                                                <?php if ($_SESSION['role_id'] == 0) { // Quản trị viên ?>
                                                    <li><a href="?action=admin"><i class="fas fa-tools"></i> Truy Cập Trang Admin</a></li>
                                                <?php } ?>
                                                <li><a href="?action=logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a></li>
                                            <?php } else { ?>
                                                <li><a href="?action=login"><i class="fas fa-sign-in-alt"></i> Đăng Nhập</a></li>
                                                <li><a href="?action=register"><i class="fas fa-user-plus"></i> Đăng Kí</a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    


                                </ul>
                            </div>
    </nav>
    <!-- NAVBAR -->

    <main class="my-5">
        <div class="container">
            <h3 class="text-center">Thêm Sản Phẩm</h3>
            <form  method="post" style="width:1000px; margin:0 auto;"
                class="mt-3 mb-5" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-group mb-3">
                    <label for="category_id">Tên Danh Mục</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="0" selected disabled>Chọn Danh Mục</option>
                            <?php foreach ($listCategories as $cate): ?> 
                                <option value="<?= $cate['category_id'] ?>"><?= $cate['name'] ?></option>
                            <?php endforeach; ?>   
                        </select>
                        <span class="err text-danger" id="categoryErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" name="product_name" id="name" class="form-control">
                    <span class="err text-danger" id="nameErr"></span>
                    
                </div>

                <div class="form-group mb-3">
                    <label for="img">Hình Ảnh</label>
                    <input type="file" name="product_image" id="img" class="form-control d-block">

                    <span class="err text-danger" id="imgErr"></span>
                </div>
                <div class="form-group mb-3">
                    <label for="gallery">Bộ sưu tập</label>
                    <input type="file" name="product_gallery[]" id="gallery" class="form-control d-block" multiple>
                    <span class="err text-danger" id="galleryErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="product_description"> Mô Tả</label>
                    <input type="text" name="product_description" id="product_description" class="form-control">
                    <span class="err text-danger" id="infoErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Giá</label>
                    <input type="text" name="product_price" id="price" class="form-control">
                    <span class="err text-danger" id="priceErr"></span>
                </div>

                <div class="form-group mb-3">
                    <label for="sale">Sale</label>
                    <input type="text" name="product_sale_price" id="sale" class="form-control">
                    
                </div>

                
                <div id="variant_list">
                    <div class="variant_item mb-3">
                        <label>Kích Cỡ</label>
                        <input type="text" name="variant_size[]" class="form-control" placeholder="S, M, L">
                        <span class="err text-danger" id="variantSizeErr0"></span>
                        <label>Màu Sắc</label>
                        <input type="text" name="variant_color[]" class="form-control" placeholder="Đỏ, Xanh, Vàng">
                        <span class="err text-danger" id="variantColorErr0"></span>
                        <label>Số Lượng</label>
                        <input type="number" name="variant_quantity[]" id="variant_quantity[]" class="form-control" placeholder="Số lượng">
                        <span class="err text-danger" id="variantQuantityErr0"></span>
                    </div>
                </div>
                <button type="button" id="add_variant" class="btn btn-primary mt-3">Thêm Biến Thể</button>
                <div class="form-group mb-3">
                    <input type="submit" name="themmoi" value="Thêm Sản Phẩm Mới" class="btn btn-dark px-5">
                </div>
            </form>
        </div>
    </main>


</section>
<script>
function validateForm() {
    // Reset errors
    resetErrors();

    // Validate category
    var category = document.getElementById('category_id');
    if (category.value.trim() === '0') {
        displayError('categoryErr', 'Vui lòng chọn danh mục');
        category.focus();
        return false;
    }

    // Validate name
    var name = document.getElementById('name');
    if (name.value.trim() === '') {
        displayError('nameErr', 'Vui lòng nhập tên sản phẩm');
        name.focus();
        return false;
    }
    // Validate image
    var img = document.getElementById('img');
    if (img.files.length === 0) {
        displayError('imgErr', 'Vui lòng chọn hình ảnh');
        img.focus();
        return false;
    }
    var gallery = document.getElementById('gallery');
    if (gallery.value.trim() === '') {
        displayError('galleryErr', 'Vui lòng chọn 4 ảnh chi tiết');
        gallery.focus();
        return false;
    }
    var product_description = document.getElementById('product_description');
    if (product_description.value.trim() === '') {
        displayError('infoErr', 'Vui lòng nhập mô tả');
        product_description.focus();
        return false;
    }
   // Validate price
   var price = document.getElementById('price');
    if (price.value.trim() === '' || isNaN(price.value.trim()) || parseFloat(price.value.trim()) <= 0) {
        displayError('priceErr', 'Vui lòng nhập giá tiền hợp lệ');
        price.focus();
        return false;
    }
    // Validate variant quantity
    var quantities = document.getElementsByName('variant_quantity[]');
    var validQuantity = true; // Biến kiểm tra số lượng hợp lệ
    quantities.forEach(function (quantity, index) {
        if (quantity.value.trim() === '' || isNaN(quantity.value.trim()) || parseFloat(quantity.value.trim()) <= 0) {
            // Hiển thị thông báo lỗi cho từng variant quantity
            displayError('variantQuantityErr' + index, 'Vui lòng nhập số lượng hợp lệ cho biến thể ' + (index + 1));
            validQuantity = false;
        }
    });

    if (!validQuantity) {
        return false; // Nếu có lỗi ở bất kỳ variant nào, không cho phép gửi form
    }
    // var price = document.getElementById('sale');
    // if (sale.value.trim() === '' || isNaN(sale.value.trim()) || parseFloat(sale.value.trim()) <= 0) {
    //     displayError('saleErr', 'Vui lòng nhập giá tiền hợp lệ');
    //     price.focus();
    //     return false;
    // }

    // Validate variant size
    var sizes = document.getElementsByName('variant_size[]');
    var validSize = true; // Biến kiểm tra size hợp lệ
    sizes.forEach(function (size, index) {
        if (size.value.trim() === '') {
            // Hiển thị thông báo lỗi cho từng variant size
            displayError('variantSizeErr' + index, 'Vui lòng nhập kích cỡ hợp lệ cho biến thể ' + (index + 1));
            validSize = false;
        }
    });

    if (!validSize) {
        return false; // Nếu có lỗi ở bất kỳ variant size nào, không cho phép gửi form
    }

    // Validate variant color
    var colors = document.getElementsByName('variant_color[]');
    var validColor = true; // Biến kiểm tra color hợp lệ
    colors.forEach(function (color, index) {
        if (color.value.trim() === '') {
            // Hiển thị thông báo lỗi cho từng variant color
            displayError('variantColorErr' + index, 'Vui lòng nhập màu sắc hợp lệ cho biến thể ' + (index + 1));
            validColor = false;
        }
    });

    if (!validColor) {
        return false; // Nếu có lỗi ở bất kỳ variant color nào, không cho phép gửi form
    }

    return true;
}

// Function to reset error messages
function resetErrors() {
    var errorElements = document.getElementsByClassName('err');
    for (var i = 0; i < errorElements.length; i++) {
        errorElements[i].innerText = '';
    }
}

// Function to display error message
function displayError(elementId, message) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerText = message;
}

document.getElementById('add_variant').addEventListener('click', function () {
        const variantList = document.getElementById('variant_list');
        const newVariant = document.querySelector('.variant_item').cloneNode(true);
        newVariant.querySelectorAll('input').forEach(input => input.value = '');
        variantList.appendChild(newVariant);
    });

    document.getElementById('variant_list').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove_variant')) {
            e.target.parentElement.remove();
        }
    });
</script>

<?php include ('./views/admin/layout/footer.php'); ?>
