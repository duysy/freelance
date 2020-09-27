<?php
class chitietthongtinthanhvien extends Controller
{
    function __construct()
    {

        if (isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['address'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $introduce = $_POST['introduce'];
            if ((new M_CayGiaPha)->updateCayGiaPha($id,$name,$contact,$address,$introduce)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/caygiapha&add_id={$id}");
            } else {
                echo "Không thành công";
            }
        } else if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->viewManage("template", [
                "template" => "chitietthongtinthanhvien",
                "info" => mysqli_fetch_assoc((new M_CayGiaPha)->getCayGiaPha($id))
            ]);
        }
    }
}
