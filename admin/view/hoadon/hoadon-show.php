<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Hóa đơn /</span>Hiển thị
        </h4>

        <div class="row">
            <!-- Basic Buttons -->

            <div class="col-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?controller=hoadon&action=addbill"><i class="bx bx-plus"></i>Thêm hóa đơn</a>
                    </li>
                </ul>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Danh sách hóa đơn</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Người mua</th>
                                <th>Ngày mua</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <?php
                                foreach ($array['infor'] as $bill){
                            ?>
                                <tr>
                                    <td>
                                        <?= $bill['id_bill'] ?>
                                    </td>
                                    <td>
                                        <?= $bill['name_customer'] ?>
                                    </td>
                                    <td>
                                        <?= $bill['purchase_date'] ?>
                                    </td>
                                    <td>
                                        <?php if ($bill['status'] == 0) {
                                            echo "Chờ xử lý";
                                        } elseif($bill['status'] == 1) {
                                            echo "Đang xử lý";
                                        }elseif($bill['status'] == 2) {
                                            echo "Đang giao";
                                        }elseif($bill['status'] == 3) {
                                            echo "Đã giao hàng";
                                        } ?>
                                    </td>
                                    <td>
                                        <?= $bill['total'] ?>
                                    </td>
                                    <td>
                                        <a style="color: white" href="index.php?controller=hoadon&action=detail&id=<?= $bill['id_bill'] ?>"><button type="button" class="btn btn-success">Xem chi tiết</button></a>
                                        <a style="color: white" href="index.php?controller=hoadon&action=edit&id=<?= $bill['id_bill'] ?>"><button type="button" class="btn btn-info">Sửa</button></a>
                                        <a style="color: white" href="index.php?controller=hoadon&action=destroy&id=<?= $bill['id_bill'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                                                <!--                        Chia số trang-->
                                                <div class="" style="display: flex ;justify-content: center ; margin-top: 50px">
                            <nav aria-label="...">
                                <ul class="pagination pagination-lg">
                                    <?php
                                    for ($i = 1; $i <= $array['page']; $i++) {
                                        ?>
                                        <li class="page-item">
                                            <form method="post" action="index.php?controller=hoadon&page=<?= $i ?>">
                                                <input type="hidden" name="search" value="<?= $array['search'] ?>">
                                                <input type="hidden" name="page" value="<?= $i ?>">
                                                <button class="page-link"><?= $i ?></button>
                                            </form>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <!--                        Chia số trang-->

                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>

