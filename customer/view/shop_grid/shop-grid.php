
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg"  style="background-color: #7fad39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Book Store</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục sản phẩm</h4>
                            <form action="in" method="POST">
                            <ul>
                                <li><a href="index.php?controller=shop-grid">Sách Thiếu Nhi</a></li>
                                <li><a href="index.php?controller=shop-grid">Sách Văn Học</a></li>
                                <li><a href="index.php?controller=shop-grid">Sách Kỹ Năng Sống</a></li>
                                <li><a href="index.php?controller=shop-grid">Sách Quản Lý Kinh Doanh</a></li>
                                <li><a href="index.php?controller=shop-grid">Sách Giáo Khoa - Tham Khảo</a></li>
                                <li><a href="index.php?controller=shop-grid">Sách Ngoại Ngữ</a></li>
                            </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">

<!--                    <div class="filter__item">-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-4 col-md-5">-->
<!--                                <div class="filter__sort">-->
<!--                                    <span>Sort By</span>-->
<!--                                    <select>-->
<!--                                        <option value="0">Default</option>-->
<!--                                        <option value="0">Default</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-md-4">-->
<!--                                <div class="filter__found">-->
<!--                                    <h6><span>16</span> Products found</h6>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="row">
                                <?php
                                    foreach($array['infor'] as $product){
                                ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
<!--                                DANH MỤC SẢN PHẨM -Start-->
                                <div class="product__item__pic set-bg" data-setbg="img/<?=$product['image']?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="index.php?controller=shop-details&action=detail&id=<?=$product['id_product']?>"><i class="fa fa-info"></i></a></li>
                                        <li><a href="index.php?controller=shop-cart&action=add&id=<?=$product['id_product']?>"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="index.php?controller=shop-details&action=detail&id=<?=$product['id_product']?>"><?=$product['product_name']?></a></h6>
                                    <h5 style="color: red"><?=$product['price_product']?> VND</h5>
                                </div>
                            </div>
                        </div>
                                <?php
                                    }
                                ?>
<!--                                DANH MỤC SẢN PHẨM - END -->
                    </div>
<!--                    CHIA SỐ TRANG-->
                    <div style="display: flex ;justify-content: center ; margin-top: 50px">
                        <nav aria-label="...">
                            <ul class="pagination pagination-lg">
                                <?php
                                for ($i = 1; $i <= $array['page']; $i++) {
                                    ?>
                                    <li class="page-item">
                                        <form method="post" action="index.php?controller=shop-grid&page=<?= $i ?>"">
                                        <input type="hidden" name="search" value="<?= $array['search'] ?>">
                                        <input type="hidden" name="page" value="<?= $i ?>">
                                        <button class="page-link" style="color: #7fad39"><?= $i ?></button>
                                        </form>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
<!--                    CHIA SỐ TRANG-->
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

