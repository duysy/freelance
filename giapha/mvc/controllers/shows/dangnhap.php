<?php
class dangnhap extends Controller
{
    function __construct()
    {
        if (isset($_POST['username']) && isset($_POST['passwork'])) {
            $username = $_POST['username'];
            $passwork = $_POST['passwork'];
            if ((new M_User)->dangNhap($username, $passwork)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly");
            } else {
                $this->view("template", array_merge(
                    [
                        "template" => "dangnhap",
                        "thongbaotoi" => "Tài khoản không tồn tại hoặc nhập lỗi, vui lòng kiểm tra lại!"
                    ],
                    (new TatCa)->tatCa()
                ));
            }
        } else {
            $this->view("template", array_merge(
                [
                    "template" => "dangnhap",
                ],
                (new TatCa)->tatCa()
            ));
        }
    }
}
