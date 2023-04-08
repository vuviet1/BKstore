<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Hóa đơn chi tiết /</span>Thêm sản phẩm
        </h4>
        <div class="row">
            <div class="col-12">
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Danh sách sản phẩm</h5>
                    <div style="display: flex;justify-content: right">
                        <div class="mb-3 col-md-3">
                            <input class="form-control" type="text" id="name" name="name" value="" autofocus/>
                        </div>
                        <button type="submit" class="mb-3" style="display: block;color: #697a8d;
    background-color: #fff;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                            <i class="bx bx-search fs-4 lh-0"></i>
                        </button>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($product1['infor'] as $product){
                                ?>
                                <tr>
                                    <td>
                                        <?= $product['id_product'] ?>
                                    </td>
                                    <td>
                                        <?= $product['product_name'] ?>
                                    </td>
                                    <td>
                                        <img src="img/<?= $product['image'] ?>" alt="" width="150px" height = "150px">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary"><a style="color: white" href="index.php?controller=hoadon&action=addproduct&id=<?= $product['id_product'] ?>">Chọn</a></button>
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
                                    for ($i = 1; $i <= $product1['page']; $i++) {
                                        ?>
                                        <li class="page-item">
                                            <form method="post" action="index.php?controller=hoadon&action=showproduct&page=<?= $i ?>">
                                                <input type="hidden" name="search" value="<?= $product1['search'] ?>">
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
                        <button style="margin-left: 20px; margin-bottom: 20px;" type="button" class="btn btn-secondary"><a style="color: white" href="index.php?controller=hoadon&action=addbill">Trở lại</a></button>
                    </div>
                </div>

                <!--/ Basic Bootstrap Table -->
            </div>