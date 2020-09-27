<?php
class trangchu extends Controller
{
    function __construct()
    {
        $this->view("template", array_merge(
            [
                "template" => "trangchu",
                "linkanh" => mysqli_fetch_all((new M_LinkAnh)->getLinkAnh())
            ],(new TatCa)->tatCa()
        ));
    }
}
