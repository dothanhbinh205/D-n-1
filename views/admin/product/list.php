

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

    <main>
    <h3 class="text-center">Quản Lý Sản Phẩm</h3>
    <a href="index.php?action=product-create">Thêm sản phẩm mới</a>
    <table class="table table-show-category">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Hình Ảnh</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Ngày Nhập</th>
                <th>Ngày chỉnh sửa</th>
                <th>Trạng thái</th>
                <th>Cập nhật trạng thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // var_dump($danhSachProduct);
            foreach ($danhSachProduct as $key => $product) : ?>
                <tr>
                    <!-- <?php var_dump($product) ?> -->
                    <td> <?= $key +1 ?> </td>
                    <td> <?= $product['name'] ?></td>
                    <td>
                        <div style="height: 60px; width: 60px">
                            <img style="max-height:100%; max-width:100%;" src="<?=  $product['image'] ?>">
                        </div>
                    </td>
                    <td> <?= number_format($product['price'], 0, ',', '.') ?> đ </td>
                    <td><?= $product['category_name'] ?></td>
                    <td><?=  $product['created_at'] ?></td>
                    <td>
                    <?=  $product['updated_at'] ?>
                    </td>
                    <!-- <td><?=  $product['status'] ==1 ? 'Còn bán' : 'Dừng bán'  ?> </td> -->
                        <!-- <a href="?action=product-edit&id=<?= $product->product_id ?>">Sửa</a>
                        <a href="?action=product-delete&id=<?= $product->product_id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a> -->
<!-- Hiển thị trạng thái -->
<td>
                <?= $product['status'] == 1 ? '<span class="text-success">Còn bán</span>' : '<span class="text-danger">Dừng bán</span>' ?>
            </td>

            <!-- Nút hành động cập nhật trạng thái -->
            <td>
                <form method="POST" action="?action=update-product-status">
                    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                    <input type="hidden" name="new_status" value="<?= $product['status'] == 1 ? 0 : 1 ?>">
                    <button type="submit" class="btn btn-sm <?= $product['status'] == 1 ? 'btn-danger' : 'btn-success' ?>">
                        <?= $product['status'] == 1 ? 'Dừng bán' : 'Còn bán' ?>
                    </button>
                </form>
                
            </td>
                        <td>
                            <!-- <a href="<?= '?action=product-details&product_id='.$product['product_id'] ?>">
                            <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                            </a> -->
                            <a href="<?= '?action=product-form-edit&id='.$product['product_id'] ?>"><i class="bx bx-edit"></i></a>
                        </td>
                        <td>

                        </td>
                </tr>
                <?php endforeach ?>
        </tbody>
    </table >
    

<?php include ('./views/admin/layout/footer.php'); ?>