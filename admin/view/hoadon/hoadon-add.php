
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div>
        <?php
        $test = 0;
        if($test == 1){
            echo "<div style='color:red' >This name already exists!</div>";
        }
        ?>
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hóa đơn /</span> Thêm hóa đơn</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Hóa đơn</h5>

                    <hr class="my-0" />
                    <div style="display: flex ;justify-content: right; margin-top: 15px; margin-right: 20px">
                        <ul class="nav nav-pills flex-column flex-md-row mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?controller=hoadon&action=showproduct"><i
                                            class="bx bx-plus"></i>Thêm sản phẩm</a>
                            </li>
                        </ul>
                    </div>

                    <hr class="my-0" />

<!--                 Danh sách sản phẩm   -->

                    <div class="card">
                        <h5 class="card-header">Danh sách sản phẩm</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($infor['cart'] as $product){
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $product['id_product'] ?>
                                        </td>
                                        <td>
                                            <?= $product['product_name'] ?>
                                        </td>
                                        <td>
                                            <img style="width: 150px" src="img/<?= $product['image'] ?>" alt="" >
                                        </td>
                                        <td>
                                            <?= $product['amount'] ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger"><a style="color: white" href="index.php?controller=sp&action=destroy&id=<?= $product['id_product'] ?>">Xóa</a></button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

<!--                Danh sách sản phẩm    -->

                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="index.php?controller=hoadon&action=addbill">
                            <div class="row">
                                <div class="mb-3 col-md-6 ">
                                    <label for="customer" class="form-label">Tên khách hàng</label>
                                    <select class="form-control" type="text" id="customer" name="customer">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($arr['customer'] as $customer) {
                                            ?>
                                            <option value="<?= $customer['name_customer'] ?>">
                                                <?= $customer['name_customer'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="employee" class="form-label">Tên nhân viên xử lý</label>
                                    <select class="form-control" type="text" id="employee" name="employee">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($arr['employee'] as $customer) {
                                            ?>
                                            <option value="<?= $customer['name_employee'] ?>">
                                                <?= $customer['name_employee'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="purchase_date" class="form-label">Ngày mua</label>
                                    <input
                                        class="form-control"
                                        type="date"
                                        id="purchase_date"
                                        name="purchase_date"
                                        value=""
                                    />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="payment" class="form-label">Phương thức thanh toán</label>
                                    <select class="form-control" type="text" id="payment" name="payment">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($arr['payment'] as $payment) {
                                            ?>
                                            <option value="<?= $payment['name_payment'] ?>">
                                                <?= $payment['name_payment'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="shipping" class="form-label">Phương thức vận chuyển</label>
                                    <select class="form-control" type="text" id="shipping" name="shipping">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($arr['shipping'] as $shipping) {
                                            ?>
                                            <option value="<?= $shipping['name_shipping'] ?>">
                                                <?= $shipping['name_shipping'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Tổng giá</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            id="total"
                                            name="total"
                                            value=""
                                            readonly
                                    />
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Thêm hóa đơn</button>
                                    <button type="reset" class="btn btn-outline-secondary"><a style="color: #8592a3" href="index.php?controller=hoadon">Hủy bỏ</a></button>
                                </div>
                        </form>
                    </div>
                    <!-- /Thông tin -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

