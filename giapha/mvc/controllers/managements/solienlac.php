<?php
class solienlac extends Controller
{
    function __construct()
    {
        // echo $_GET["eee"];
        if (isset($_POST['host']) && isset($_POST['phone'])) {
            $id = uniqid();
            $host = $_POST['host'];
            $descendant = $_POST['descendant'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            if ((new M_SoLienLac)->insertSolienLac($id, $host, $descendant, $phone, $address, $note)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/solienlac");
            } else {
                echo "Không thành công";
            }
        } else if (isset($_GET['xoa_id'])) {
            $id = $_GET['xoa_id'];
            if ((new M_SoLienLac)->delSolienLac($id)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/solienlac");
            } else {
                echo "Xóa không thành công";
            }
        } else {
            $this->viewManage("template", [
                "template" => "solienlac",
                "datacontact" => (new M_SoLienLac)->getAllSoLienLac()
            ]);
        }
    }
}
