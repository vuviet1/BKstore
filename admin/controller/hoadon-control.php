<?php


//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//Kiểm tra hành động đang thực hiện
switch ($action) {
    case '':
        //Hiển thị danh sách các
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hoadon-show.php';
        break;
    case 'detail':
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hoadonchitiet.php';
        break;
    case 'showproduct':
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hd-sp.php';
        break;
    case 'hdct-add':
        //Hiển thị danh sách các
        include_once 'view/hoadon/hoadonchitet-add.php';
        break;
    case 'addbill':
        //Hiển thị danh sách các
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hoadon-add.php';
        break;
    case 'edit':
        //Hiển thị danh sách các
        include_once 'view/hoadon/hoadon-edit.php';
        break;
    case 'create':
        include_once 'model/hoadon-model.php';
        break;
    case 'addproduct':
        include_once 'model/sp-model.php';
        include_once 'view/hoadon/hoadon-add.php';
        break;
    case 'store':
        include_once 'model/hoadon-model.php';
        break;
}