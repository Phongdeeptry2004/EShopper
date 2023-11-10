<section>
    <?php
    if ($_SESSION['user']) {
        $id = $_SESSION['user']['id'];
        $tk = showonetk($id);
        print_r($tk);
    }
    ?>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="<?php
                                    if ($tk[0]['avatar'] == '') {
                                        echo 'view/img/avatardefaul.png';
                                    } else echo $tk[0]['avatar'];
                                    ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?php echo $tk[0]['user'] ?></h5>
                        <p class="text-muted mb-4"><?php echo $tk[0]['vaitro'] ?></p>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="index.php?act=formupdateinfor"><button type="button" class="btn btn-outline-primary ms-1">Chỉnh sửa thông tin</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Họ tên đầy đủ</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $tk[0]['hoten'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $tk[0]['email'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Số điện thoại</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $tk[0]['phone'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Bảng sản phẩm</h4>
                        <div class="table-responsive">

                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>

                                        <th class="border-top-0">Ngày đặt hàng</th>
                                        <th class="border-top-0">Ngày giao hàng</th>
                                        <th class="border-top-0">address</th>
                                        <th class="border-top-0">Tổng</th>
                                        <th class="border-top-0">Trạng Thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (showalldhbyid($id) as $key) :
                                        $sua = 'index.php?act=ctdonhang&id='.$key['id'];
                                    ?>
                                        <tr>
                                            <td><?php echo $key['ngaydathang'] ?></td>
                                            <td><?php echo $key['ngaygiaohang'] ?></td>
                                            <td><?php echo $key['address'] ?></td>
                                            <td><?php echo $key['tong'] ?></td>
                                            <td><?php echo $key['trangthai'] ?></td>
                                            <td>
                                                <a href="<?php echo $xoa ?>"><input class='btn btn-primary' type="submit" value="Chi tiết"></a>
                                                <!-- <a href="<?php echo $trangthai ?>"><input class='btn btn-primary' type="submit" value="Update Trạng Thái"></a> -->
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>