<?php
//function lấy dữ liệu từ db
function index(){
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM bill WHERE status LIKE '%$search%'";
    $counts = mysqli_query($connect, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 3;
    $sql = "SELECT bill.*, employee.name_employee, customer.name_customer, customer.address, customer.phone_number, payment.name_payment, shipping.name_shipping FROM bill INNER JOIN employee ON bill.id_employee = employee.id_employee INNER JOIN customer ON bill.id_customer = customer.id_customer INNER JOIN payment ON bill.id_payment = payment.id_payment INNER JOIN shipping ON bill.id_shipping = shipping.id_shipping WHERE status LIKE '%$search%' LIMIT $start, $end";
    $bill = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $bill;
    $array['page'] = $countPage;
    return $array;
}

function addBill_detail(){
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM product";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $product;
}

function showproduct(){
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM product WHERE product_name LIKE '%$search%'";
    $counts = mysqli_query($connect, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT product.*, publishing_company.publishing_company_name, author.name_author, category.name_category FROM product INNER JOIN publishing_company ON product.id_publishing_company = publishing_company.id_publishing_company INNER JOIN author ON product.id_author = author.id_author INNER JOIN category ON product.id_category = category.id_category WHERE product_name LIKE '%$search%' LIMIT $start, $end";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $product1 = array();
    $product1['search'] = $search;
    $product1['infor'] = $product;
    $product1['page'] = $countPage;
    return $product1;
}

function detail(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT bill_detail.*, bill.*,customer.*, product.*, payment.*, shipping.* FROM bill_detail 
    INNER JOIN bill ON bill_detail.id_bill = bill.id_bill 
    INNER JOIN customer ON bill.id_customer = customer.id_customer 
    INNER JOIN product ON bill_detail.id_product = product.id_product
    INNER JOIN payment ON bill.id_payment = payment.id_payment 
    INNER JOIN shipping ON bill.id_shipping = shipping.id_shipping WHERE  bill.id_bill = '$id' LIMIT 0, 25";
    $detail = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $detail;
}

function add_to_cart(){
    //        Lấy được id của sản phẩm vừa được thêm vào
    $product_id = $_GET['id'];
    //        Lưu lên session id sản phầm và số lượng mặc định là 1
    //        Kiểm tra xem giỏ hàng đã tồn tại hay chưa
    if (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]++;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$product_id] = 1;
    }
}

function view_cart()
{
    include_once 'connect/openConnect.php';
    $cart = array();
    $infor = array();
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
    include_once 'connect/closeConnect.php';
    $infor['cart'] = $cart;
    $infor['total'] = $total;
    return $infor;
}


function addBill()
{
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM customer";
    $customer = mysqli_query($connect, $sql);
    $sqlemployee = "SELECT * FROM employee";
    $employee = mysqli_query($connect, $sqlemployee);
    $sqlpayment = "SELECT * FROM payment";
    $payment = mysqli_query($connect, $sqlpayment);
    $sqlshipping = "SELECT * FROM shipping";
    $shipping = mysqli_query($connect, $sqlshipping);
    include_once 'connect/closeConnect.php';
    $arr = array();
    $arr['customer'] = $customer;
    $arr['employee'] = $employee;
    $arr['payment'] = $payment;
    $arr['shipping'] = $shipping;
    return $arr;
}



function addProduct(){
//    Lưu sản phẩm lên session
//    $id = $_GET['id'];
//    include_once 'connect/openConnect.php';
//    $sqlproduct = "SELECT * FROM product";
//    $product = mysqli_query($connect, $sqlproduct);
//    include_once 'connect/closeConnect.php';
//    return $product;

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

function storeProduct(){
    $id = $_POST['id'];
    include_once 'connect/openConnect.php';
    $sql_check = "SELECT id_product FROM product WHERE id_product = '$id'";
    $query_check = mysqli_query($connect, $sql_check);
        // Insert new product
        $sql = "INSERT INTO bill (product_name, image, publication_date, number_of_pages, size, price_product, describes, id_publishing_company, id_category, id_author)
                VALUES ('$name', '$img', '$date', '$page', '$size', '$price', '$describes', '$publis', '$category', '$author')";
        mysqli_query($connect, $sql);
        return 0;
    include_once 'connect/closeConnect.php';
}


//function lưu dữ liệu lên db
function store(){

}

//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])){
    $action= $_GET['action'];
}

switch ($action){
    case '':
        //lấy dữ liệu từ db
        $array = index();
        break;
    case 'detail':
        $detail = detail();
        break;
    case 'showproduct':
        $product1 = showProduct();
        break;
    case 'view_cart':
        $infor = view_cart();
        break;
    case 'addproduct':
        $product1 = add_to_cart();
        break;
    case 'addbill':
        $arr = addBill();
        break;
    case 'edit':
        break;
    case 'store':
        //lưu dữ liệu lên db
        break;


}