<?php
class chitietthongbao extends Controller
{
    function __construct()
    {
        if ($_GET['id']) {
            $id = $_GET['id'];
            $this->view("template",array_merge(
                [
                    "template" => "chitietthongbao",
                    "resultNews" => mysqli_fetch_assoc((new M_ThongBao)->getThongBao($id)),
                ],(new TatCa)->tatCa()
            ));
        }
        header("Location:" . $_SERVER["URL_SERVER"] . "/");
    }
}
