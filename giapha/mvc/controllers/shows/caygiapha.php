<?php
class caygiapha extends Controller
{
    function __construct()
    {
        if (isset($_GET['style'])) {
            if ($_GET['style'] === "treelist") {
                $this->view("caygiaphatreelist", [
                    "tree" => "<ul id='myUL'>" .  (new M_CayGiaPha)->drawTree("root", "treelist", 1) . "</ul>"
                ]);
            } else if ($_GET['style'] === "treeflex") {
                $this->view("caygiaphatreeflex", [
                    "tree" => "<ul>" .  (new M_CayGiaPha)->drawTree("root", "treeflex", 1) . "</ul>"
                ]);
            }
        } else {
            $this->view("caygiaphatreeflex", [
                "tree" => "<ul>" .  (new M_CayGiaPha)->drawTree("root", "treeflex", 1) . "</ul>"
            ]);
        }
    }
}
