<?php
//function lấy dữ liệu từ db
function index(){
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM employee";
    $array = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $array;
}
function edit(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM employee WHERE id_employee = '$id'";
    $NV = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $NV;
}
function update(){
    $id = $_POST['id'];
    $name = $_POST['name_nv'];
    $username = $_POST['user_nv'];
    $password = $_POST['pass_nv'];
    $email = $_POST['email_nv'];
    $phone = $_POST['phone_nv'];
    include_once 'connect/openConnect.php';
    $sql = "UPDATE employee SET name_employee = '$name',username = '$username',password = '$password',email = '$email',phone_number = '$phone' WHERE id_employee = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}
//function lưu dữ liệu lên db
function store(){
    $name = $_POST['name_nv'];
    $username = $_POST['user_nv'];
    $password = $_POST['pass_nv'];
    $email = $_POST['email_nv'];
    $phone = $_POST['phone_nv'];
    include_once 'connect/openConnect.php';
    $sql = "INSERT INTO employee(name_employee,username,password,email,phone_number) VALUES ('$name','$username','$password','$email','$phone')";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
}
function destroy(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "DELETE FROM employee WHERE id_employee = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
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
        store();
        break;
    case 'edit':
        //Lấy dữ liệu từ DB về dựa trên id
        $NV = edit();
        break;
    case 'update':
        //chỉnh sửa dữ liệu lên db
        update();
        break;
    case 'destroy':
        //xóa dữ liệu trên db
        destroy();
        break;
}