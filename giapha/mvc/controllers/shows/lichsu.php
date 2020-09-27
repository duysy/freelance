<?php
class lichsu extends Controller
{
    function __construct()
    {
        $this->view("template", array_merge(
            [
                "template" => "lichsu",
                "resultNews" => mysqli_fetch_assoc((new M_LichSu)->getLichSu()),
            ],(new TatCa)->tatCa()
        ));
    }
}
