<?php
class lichsu extends Controller
{
    function __construct()
    {
        if (isset($_POST['content'])) {
            $content = $_POST['content'];
            if ((new M_LichSu)->updateLichSu($content)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/lichsu");
            }else {
                echo "Không thành công";
            }
        } else {
            $this->viewManage("template", [
                "template" => "lichsu",
                "resultNews" => mysqli_fetch_assoc((new M_LichSu)->getLichSu())
            ]);
        }
    }
}
