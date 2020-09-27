<?php
class dangky extends Controller
{
    function __construct()
    {
        if (isset($_POST['username']) && isset($_POST['passwork'])) {
            $username = $_POST['username'];
            $passwork = $_POST['passwork'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $id = uniqid();
            if ((new M_User)->dangKy($id, $username, $passwork, $name, $phone, $address)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/dangnhap");
            } else {
                $this->render("Tài khoản đã tồn tại hoặc nhập lỗi, vui lòng kiểm tra lại!");
            }
        } else {
            $this->render();
        }
    }
    function render($thongbaotoi=NULL){
        $this->view("template", array_merge(
            [
                "template" => "dangky",
                "thongbaotoi" => $thongbaotoi
            ],
            (new TatCa)->tatCa()
        ));

    }
}
