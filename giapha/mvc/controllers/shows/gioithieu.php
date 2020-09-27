<?php
class gioithieu extends Controller
{
    function __construct()
    {
        $this->view("template", array_merge(
            [
                "template" => "gioithieu",
                "resultNews" => mysqli_fetch_assoc((new M_GioiThieu)->getGioiThieu()),
            ],
            (new TatCa)->tatCa()
        ));
    }
}
