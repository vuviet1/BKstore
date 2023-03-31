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
    $sqlCount = "SELECT COUNT(*) AS count_record FROM payment WHERE name_payment LIKE '%$search%'";
    $counts = mysqli_query($connect, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT * FROM payment WHERE name_payment LIKE '%$search%' LIMIT $start, $end";
    $payment = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $payment;
    $array['page'] = $countPage;
    return $array;
}
function edit(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM payment WHERE id_payment = '$id'";
    $PTTT = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $PTTT;
}
function update(){
    $id = $_POST['id'];
    $name = $_POST['pttt'];
    include_once 'connect/openConnect.php';
    $sql_check = "SELECT id_payment FROM payment WHERE name_payment = '$name'";
    $query_check = mysqli_query($connect, $sql_check);
    if (mysqli_num_rows($query_check) > 1) {
        // Payment already exists
        $message = "Phương thức đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new payment
        $sql = "UPDATE payment SET name_payment = '$name' WHERE id_payment = '$id'";
        mysqli_query($connect, $sql);
        $message = "Sửa phương thức thành công";
        echo "<script>alert('$message');</script>";
        return 0;
    }
    include_once 'connect/closeConnect.php';
    
}
//function lưu dữ liệu lên db
function store(){
    $name = $_POST['pttt'];
    include_once 'connect/openConnect.php';
    $sql_check = "SELECT id_payment FROM payment WHERE name_payment = '$name'";
    $query_check = mysqli_query($connect, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // Product already exists
        $message = "Phương thức đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // Insert new product
        $sql = "INSERT INTO payment(name_payment) VALUES ('$name')";

        mysqli_query($connect, $sql);
        $message = "Thêm phương thức thành công";
        echo "<script>alert('$message');</script>";
        return 0;
        echo "<script>alert('$message');</script>";
    }
    include_once 'connect/closeConnect.php';
}
function destroy(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "DELETE FROM payment WHERE id_payment = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    echo 'Xóa thành công phương thức';
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
    case 'store':
        //lưu dữ liệu lên db
        $check = store();
        break;
    case 'edit':
        //Lấy dữ liệu từ DB về dựa trên id
        $PTTT = edit();
        break;
    case 'update':
        //chỉnh sửa dữ liệu lên db
        $check = update();
        break;
    case 'destroy':
        //xóa dữ liệu trên db
        destroy();
        break;
    
}