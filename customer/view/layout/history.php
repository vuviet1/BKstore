<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" style="background-color: #7fad39">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Lịch sử mua hàng</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <form action="index.php?controller=check-out&action=history-details" method="post">
                        <thead>
                            
                        <tr>
                            <th class="shoping__product">Số thứ tự</th>
                            <th>Ngày mua</th>
                            <th>Trạng thái</th>
                            <th>Giá</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($bills as $bill) {
                                ?>
                                <!--                                    dùng PHP để hiển thị giỏ-->
                                <tr>
                                    <td class="shoping__cart__item">
                                        <input type="hidden" name="id_bill" value="<?=$bill['id_bill']?>">
                                        <?=$i?>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?=$bill['purchase_date']?>
                                    </td>
                                    <td class="shoping__cart__quantity">
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
                                    <td class="shoping__cart__item__close">
                                        <?=$bill['total']?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <button type="submit" class="site-btn">Chi tiết</button>
                                    </td>
                                </tr>

                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </form>
                    </table>
                </div>
            
            </div>
        </div>
    </div>

</section>
<!-- Shoping Cart Section End -->