<?php
function information()
{
    $id = $_SESSION['id_customer'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM customer WHERE id_customer = '$id'";
    $users = mysqli_query($connect, $sql);
    $cart = array();
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $amount) {
            //                Lấy tên sp và giá theo product_id
            $sql = "SELECT * FROM product WHERE id_product = '$product_id'";
            $products = mysqli_query($connect, $sql);
            foreach ($products as $product) {
                $cart[$product_id]['image'] = $product['image'];
                $cart[$product_id]['product_name'] = $product['product_name'];
                $cart[$product_id]['price'] = $product['price_product'];
                $cart[$product_id]['amount'] = $amount;
                $total += $product['price_product'] * $amount;
            }
        }
    }
    $sqlship = "SELECT * FROM shipping";
    $shipping = mysqli_query($connect, $sqlship);
    $sqlpay = "SELECT * FROM payment";
    $payment = mysqli_query($connect, $sqlpay);
    $sqlemp = "SELECT * FROM employee";
    $employee = mysqli_query($connect, $sqlemp);

    include_once 'connect/closeConnect.php';
    $check_out = array();
    $check_out['users'] = $users;
    $check_out['cart'] = $cart;
    $check_out['total'] = $total;
    $check_out['shipping'] = $shipping;
    $check_out['payment'] = $payment;
    $check_out['employee'] = $employee;
    return $check_out;
}
// function add_order_to_db(){
//     $customer_id = $_SESSION['id_customer'];
//     $date_buy = date('Y-m-d');
//     $payment_id = $_POST['id_payment'];
//     $shipping_id = $_POST['id_shipping'];
//     $admin_id = $_POST['id_employee'];
//     $status = 0;
//     include_once 'connect/openConnect.php';
//     $sqlOrder = "INSERT INTO bill (id_employee, id_customer, id_payment, id_shipping, purchase_date, status) VALUES ('$admin_id', '$customer_id', '$payment_id', '$shipping_id', '$date_buy', $status')";
//     mysqli_query($connect, $sqlOrder);

//     foreach ($_SESSION['cart'] as $product_id => $amount){
//         $sqlPriceProduct = "SELECT price FROM product WHERE id_product = '$product_id'";
//         $priceProduct = mysqli_query($connect, $sqlPriceProduct);
//         foreach ($priceProduct as $each){
//             $price = $each['price'];
//         }
//         $sql = "INSERT INTO bill_detail (order_id, id_product, amout, price) VALUES ('$orderID', '$product_id', '$amount', '$price' )";
//         mysqli_query($connect, $sql);
//     }
//     include_once 'connect/closeConnect.php';
//     unset($_SESSION['cart']);
// }
// $arr = array();
// $arr['customer'] = $customer_id;
// $arr['payment'] = $payment_id;
// $arr['shipping'] = $shipping_id;
// $arr['employee'] = $admin_id;
// $arr['date'] = $date_buy;
// $arr['status'] = $status;
// return var_dump($arr);
function add_order_to_db()
{
    $customer_id = $_SESSION['id_customer'];
    $date_buy = date('Y-m-d');
    $payment_id = $_POST['id_payment'];
    $shipping_id = $_POST['id_shipping'];
    $admin_id = $_POST['id_employee'];
    $total = $_POST['total'];
    $status = 0;

    include_once 'connect/openConnect.php';
    $sqlOrder = "INSERT INTO `bill`(`id_employee`, `id_customer`, `id_payment`, `id_shipping`, `purchase_date`, `status`, `total`) VALUES ('$admin_id','$customer_id','$payment_id','$shipping_id','$date_buy','$status','$total')";
    mysqli_query($connect, $sqlOrder);
    $orderID = mysqli_insert_id($connect); // Lấy id_bill vừa được thêm vào
    $sqlOrderID = "SELECT MAX(id_bill) as order_id FROM bill WHERE id_customer = '$customer_id'";
    $orderIDs = mysqli_query($connect, $sqlOrderID);
    foreach ($orderIDs as $value) {
        $orderID = $value['order_id'];
    }
    foreach ($_SESSION['cart'] as $product_id => $amount) {
        $sqlPriceProduct = "SELECT price_product FROM product WHERE id_product = '$product_id'";
        $priceProduct = mysqli_query($connect, $sqlPriceProduct);
        foreach ($priceProduct as $each) {
            $price = $each['price_product'];
        }
        $sql = "INSERT INTO `bill_detail`(`id_bill`, `id_product`, `amount`, `price`) VALUES ('$orderID','$product_id','$amount','$price')";
        mysqli_query($connect, $sql);
    }
    include_once 'connect/closeConnect.php';
    unset($_SESSION['cart']);
}
function history()
{
    $customer_id = $_SESSION['id_customer'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM bill WHERE id_customer = '$customer_id'";
    $bill = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $bill;
}
function history_details(){
    $customer_id = $_SESSION['id_customer'];
    $id_bill = $_POST['id_bill'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT bill_detail.*, bill.*, product.*, payment.*, shipping.*, author.* FROM bill_detail INNER JOIN bill ON bill_detail.id_bill = bill.id_bill INNER JOIN product ON bill_detail.id_product = product.id_product INNER JOIN author ON product.id_author = author.id_author INNER JOIN payment ON bill.id_payment = payment.id_payment INNER JOIN shipping ON bill.id_shipping = shipping.id_shipping WHERE bill.id_customer = '$customer_id' AND bill.id_bill = '$id_bill' LIMIT 0, 25";
    $history = mysqli_query($connect, $sql);
    // $sql = "SELECT bill_detail.*, bill.*, product.*, payment.*, shipping.*, author.* FROM bill_detail INNER JOIN bill ON bill_detail.id_bill = bill.id_bill INNER JOIN product ON bill_detail.id_product = product.id_product INNER JOIN author ON product.id_author = author.id_author INNER JOIN payment ON bill.id_payment = payment.id_payment INNER JOIN shipping ON bill.id_shipping = shipiing.id_shipping WHERE id_customer = '$customer_id' AND id_bill = '$id_bill'";
    // $history = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $history;
}
switch ($action) {
    case '':
        $KH = information();
        break;
    case 'add-to-db':
        add_order_to_db();
        break;
    case 'history':
        $bills = history();
        break;
    case 'history-details':
        $history = history_details();
        break;
}
