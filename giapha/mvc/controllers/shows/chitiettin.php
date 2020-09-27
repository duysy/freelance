<?php
class chitiettin extends Controller
{
    function __construct()
    {
        $id = $_GET['id'];
        $result = (new M_TinTuc)->getChiTietTinTuc($id);
        if ($result) {
            $this->view("template", array_merge(
                [
                    "template" => "chitiettin",
                    "resultNews" => mysqli_fetch_assoc($result),
                ],
                (new TatCa)->tatCa()
            ));
        } else {
            header("Location:" . $_SERVER["URL_SERVER"] . "/page404");
        }
    }
}
