<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Nhà xuất bản /</span>Hiển thị
        </h4>

        <div class="row">
            <!-- Basic Buttons -->

            <div class="col-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?controller=nxb&action=add"><i class="bx bx-plus"></i>Thêm nhà xuất bản</a>
                    </li>
                </ul>


                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Danh sách nhà xuất bản</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên nhà xuất bản</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($array['infor'] as $nxb){
                            ?>
                            <tr>
                                <td>
                                    <?= $nxb['id_publishing_company'] ?>
                                </td>
                                <td>
                                    <?= $nxb['publishing_company_name'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info"><a style="color: white" href="index.php?controller=nxb&action=edit&id=<?= $nxb['id_publishing_company'] ?>">Sửa</a></button>
                                    <button type="button" class="btn btn-danger"><a style="color: white" href="index.php?controller=nxb&action=destroy&id=<?= $nxb['id_publishing_company'] ?>">Xóa</a></button>
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
                                            <form method="post" action="index.php?controller=nxb&page=<?= $i ?>">
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