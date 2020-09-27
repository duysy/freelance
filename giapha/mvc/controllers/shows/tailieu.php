<?php
class tailieu extends Controller
{
    function __construct()
    {
        $this->view("template",array_merge(
            [
                "template" => "tailieu",
                "post" => (new M_TinTuc)->getAllTinTuc(),
                "resultNews" => mysqli_fetch_assoc((new M_TaiLieu)->getTaiLieu())
            ],(new TatCa)->tatCa()
        ));
    }
}
