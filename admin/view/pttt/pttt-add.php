
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Phương thức thanh toán /</span> Thêm phương thức thanh toán</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="pttt" method="POST" action="index.php?controller=pttt&action=store">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="pttt" class="form-label">Tên phương thức thanh toán</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="pttt"
                                        name="pttt"
                                        value=""
                                        autofocus
                                    />
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Thêm phương thức thanh toán</button>
                                    <button type="reset" class="btn btn-outline-secondary"><a style="color: #8592a3" href="index.php?controller=pttt">Hủy bỏ</a></button>
                                </div>
                        </form>
                    </div>
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

