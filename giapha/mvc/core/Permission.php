<?php
class Permission
{
    function direction($controller)
    {
        if ($_SESSION['permission'] == 0) { // cho master vao tat ca
            return $controller;
        } else if ($_SESSION['permission'] == 1) {
            $listView = [
                "tintuc",
                "khac"
            ];
            if (in_array($controller, $listView)) {
                return $controller;
            } else {
                return "quyentruycap";
            }
        }else{
            return "quyentruycap";
        }
    }
}
