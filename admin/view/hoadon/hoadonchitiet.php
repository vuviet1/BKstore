<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Hóa đơn chi tiết /</span>Hiển thị
        </h4>

        <div class="row">
            <!-- Basic Buttons -->

            <div class="col-12">


                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Chi tiết hóa đơn </h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($detail as $product){
                            ?>
                            <tr>
                                <td>
                                    <?= $product['id_bill'] ?>
                                </td>
                                <td>
                                    <?= $product['product_name'] ?>
                                </td>
                                <td>
                                    <img src="img/<?= $product['image'] ?>" alt="" width="150px" height = "150px">
                                </td>
                                <td>
                                    <?= $product['amount'] ?>
                                </td>
                                <td>
                                    <?= $product['price'] ?>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <?php
                        foreach ($detail as $bill){
                        ?>
                        <form id="detail" method="POST" action="index.php?controller=hoadon&action=detail">
                            <div class="row">
                                <div class="mb-3 col-md-6 ">
                                    <label for="name_customer" class="form-label">Khách hàng</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            name="name_customer"
                                            value=" <?= $bill['name_customer'] ?>"
                                            readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email" class="form-label">Ngày mua</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            name="email"
                                            value=" <?= $bill['purchase_date'] ?>"
                                            readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="status" class="form-label">Trạng thái</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            name="status"
                                            value="<?php if ($bill['status'] == 0) {
                                                echo "Chờ xử lý";
                                            } elseif($bill['status'] == 1) {
                                                echo "Đang xử lý";
                                            }elseif($bill['status'] == 2) {
                                                echo "Đang giao";
                                            }elseif($bill['status'] == 3) {
                                                echo "Đã giao hàng";
                                            } ?>"
                                            readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email" class="form-label">Tổng tiền</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            name="email"
                                            value="<?= $bill['total'] ?>"
                                            readonly
                                    />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email" class="form-label">Phương thức thanh toán</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            name="email"
                                            value="<?= $bill['name_payment'] ?>"
                                            readonly
                                    />
                                </div>

                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Phương thức vận chuyển</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            name="total"
                                            value="<?= $bill['name_shipping'] ?>"
                                            readonly
                                    />
                                </div>

                        </form>
                            <?php
                        }
                        ?>
                        <div class="mt-2">
                            <button type="reset" class="btn btn-outline-secondary"><a style="color: #8592a3" href="index.php?controller=hoadon">Quay lại</a></button>
                        </div>
                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>


