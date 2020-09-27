<?php
class chitietthongtinthanhvien extends Controller
{
    function __construct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->view("template", array_merge(
                [
                    "template" => "chitietthongtinthanhvien",
                    "info" => mysqli_fetch_assoc((new M_CayGiaPha)->getCayGiaPha($id)),
                ],
                (new TatCa)->tatCa()
            ));
        }
        $this->view("template", array_merge(
            [
                "template" => "chitietthongtinthanhvien",
            ],
            (new TatCa)->tatCa()
        ));
    }
}
