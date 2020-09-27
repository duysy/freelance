<?php
class tintuc extends Controller
{
    function __construct()
    {
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $imagelink = $_POST['imagelink'];
            $summary = $_POST['summary'];
            if ($_POST['method'] === "edit") {
                $result = (new M_TinTuc)->updateTinTuc($id, $title, $summary, $content, $imagelink, $category);
            } else {
                $result = (new M_TinTuc)->insertTinTuc($title, $summary, $content, $imagelink, $category);
            }
            if ($result) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/tintuc");
            } else {
                echo "Không Thành Công";
            }
        } else if (isset($_GET['xoa_id'])) {
            if ((new M_TinTuc)->delTinTuc($_GET['xoa_id'])) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/tintuc");
            } else {
                echo "Xóa không thành công";
            }
        } else if (isset($_GET['edit_id'])) {
            $id = $_GET['edit_id'];
            $this->viewManage("template", [
                "template" => "tintuc",
                "resultNews" => mysqli_fetch_assoc((new M_TinTuc)->getChiTietTinTuc($id)),
                "post" => (new M_TinTuc)->getAllTinTuc()
            ]);
        } else {
            $this->viewManage("template", [
                "template" => "tintuc",
                "post" => (new M_TinTuc)->getAllTinTuc()
            ]);
        }
    }
}
