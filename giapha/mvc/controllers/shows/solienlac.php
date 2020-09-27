<?php
class solienlac extends Controller
{
    function __construct()
    {
        $this->view("template", array_merge(
            [
                "template" => "solienlac",
                "datacontact" => (new M_SoLienLac)->getAllSoLienLac(),
                
            ],(new TatCa)->tatCa()
        ));
    }
}
