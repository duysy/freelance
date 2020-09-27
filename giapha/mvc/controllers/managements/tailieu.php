<?php
class tailieu extends Controller
{
    function __construct()
    {
        if (isset($_POST['content'])) {
            $content = $_POST['content'];
            if ((new M_TaiLieu)->updateTaiLieu($content)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/tailieu");
            } else if ((new M_TaiLieu)->insertTaiLieu($content)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/tailieu");
            } else {
                echo "Không thành công";
            }
        } else {
            $this->viewManage("template", [
                "template" => "tailieu",
                "resultNews" => mysqli_fetch_assoc((new M_TaiLieu)->getTaiLieu())
            ]);
        }
    }
}
