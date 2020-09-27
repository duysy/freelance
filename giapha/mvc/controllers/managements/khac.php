<?php
class khac extends Controller
{
    function __construct()
    {
        if (isset($_POST['thongbao'])) {
            $title = $_POST['title'];
            $thongbao = $_POST['thongbao'];
            if ($_POST['methol'] === 'insert') {
                $id = uniqid();
                (new M_ThongBao)->insertThongBao($id, $title, $thongbao);
            } else if ($_POST['methol'] === 'update') {
                $edit_id = $_POST['edit_id'];
                (new M_ThongBao)->updateThongBao($edit_id, $title, $thongbao);
            }
        } else if (isset($_POST['video'])) {
            $video = $_POST['video'];
            (new M_Video)->updateVideo($video);
        } else if (isset($_POST['tuyenngon'])) {
            $tuyenngon = $_POST['tuyenngon'];
            $id = uniqid();
            (new M_TuyenNgon)->updateTuyenNgon($tuyenngon);
        } else if (isset($_POST['methol']) && $_POST['methol'] == "editLinkImg") {
            if (isset($_POST['link1'])) {
                (new M_LinkAnh)->updateLink("link1", $_POST['link1']);
            }
            if (isset($_POST['link2'])) {
                (new M_LinkAnh)->updateLink("link2", $_POST['link2']);
            }
            if (isset($_POST['link3'])) {
                (new M_LinkAnh)->updateLink("link3", $_POST['link3']);
            }
        } else {
            if (isset($_GET['edit_id'])) {
                $id = $_GET['edit_id'];
                $this->viewManage("template", [
                    "template" => "khac",
                    "thongbao" => (new M_ThongBao)->getAllThongBao(),
                    "editthongbao" => mysqli_fetch_assoc((new M_ThongBao)->getThongBao($id)),
                    "video" => mysqli_fetch_assoc((new M_Video)->getVideo()),
                    "tuyenngon" => mysqli_fetch_assoc((new M_TuyenNgon)->getTuyenNgon()),
                    "linkanh" => mysqli_fetch_all((new M_LinkAnh)->getLinkAnh())
                ]);
                return;
            } else {
                if (isset($_GET['xoa_id'])) {
                    $id = $_GET['xoa_id'];
                    if ((new M_ThongBao)->delThongBao($id)) {
                        header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/khac");
                        return;
                    }
                    echo "Xóa thất bại";
                }
            }
        }
        $this->viewManage("template", [
            "template" => "khac",
            "thongbao" => (new M_ThongBao)->getAllThongBao(),
            "video" => mysqli_fetch_assoc((new M_Video)->getVideo()),
            "tuyenngon" => mysqli_fetch_assoc((new M_TuyenNgon)->getTuyenNgon()),
            "linkanh" => mysqli_fetch_all((new M_LinkAnh)->getLinkAnh())
        ]);
    }
}
