<?php
class lienhe extends Controller
{
    function __construct()
    {
        if (isset($_POST['content'])) {
            $content = $_POST['content'];
            (new M_LienHe)->updatecontentLienHe($content);
        } else if (isset($_GET['xoa_id'])) {
            $id = $_GET['xoa_id'];
            (new M_LienHe)->delLienHe($id);
        }
        $this->viewManage("template", [
            "template" => "lienhe",
            "post" => (new M_TinTuc)->getAllTinTuc(),
            "datacontact" => (new M_LienHe)->getLienHe(),
            "datacontent" => mysqli_fetch_assoc((new M_LienHe)->getContentLienHe())
        ]);
    }
}
