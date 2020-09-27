<?php
class gioithieu extends Controller
{
    function __construct()
    {

        if (isset($_POST['content'])) {
            $content = $_POST['content'];
            if ((new M_GioiThieu)->updateGioiThieu($content)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/gioithieu");
            } else {
                if ((new M_GioiThieu)->insertGioiThieu($content)) {
                    header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/gioithieu");
                } else {
                    echo "Không thành công";
                }
            }
        } else {
            $this->viewManage("template", [
                "template" => "gioithieu",
                "resultNews" => mysqli_fetch_assoc((new M_GioiThieu)->getGioiThieu())
            ]);
        }
    }
}
