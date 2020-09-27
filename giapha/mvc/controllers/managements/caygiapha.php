<?php
class caygiapha extends Controller
{
    function __construct()
    {
        $thongbaotoi = "";
        if (isset($_POST['add_id']) && isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['address'])) {
            $add_id = $_POST['add_id'];
            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $introduce = $_POST['introduce'];
            $newid = uniqid();
            $ketqua = (new M_CayGiaPha)->getCayGiaPha($add_id); // Lấy danh sách id cần add
            if ($ketqua) {
                $data =  mysqli_fetch_assoc($ketqua);
                if (strpos($data['lowergrade'], '-') | $data['lowergrade'] != "") {
                    $lowergrade = $data['lowergrade'] . "-" . $newid; // Thêm vào
                } else {
                    $lowergrade = $newid;
                }
                if ((new M_CayGiaPha)->insertCayGiaPha($newid, $name, $contact, $address, $introduce)) {
                    (new M_CayGiaPha)->updateLowergrade($add_id, $lowergrade);
                }
            }
            header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/caygiapha&add_id={$add_id}");
            return;
        }
        if (isset($_GET['add_id'])) {
            $add_id = $_GET['add_id'];
            $this->viewManage("template", [
                "template" => "caygiapha",
                "tree" => "<ul>" .  (new M_CayGiaPha)->drawTree("root", "treeflex", 1) . "</ul>",
                "datagrade" => mysqli_fetch_assoc((new M_CayGiaPha)->getCayGiaPha($add_id))
            ]);
            return;
        }
        if (isset($_GET['xoa_id'])) {
            $xoa_id = $_GET['xoa_id'];
            $lowergrade = mysqli_fetch_assoc((new M_CayGiaPha)->getCayGiaPha($xoa_id))['lowergrade'];
            if ($lowergrade === "" || $lowergrade === NULL) {
                $id = (new M_CayGiaPha)->getIdFromLowergrade($xoa_id);
                if ($id) {
                    if ((new M_CayGiaPha)->deIdGiaPhainLowergrade($id, $xoa_id)) { // Xóa id trong Lowergrade
                        if ((new M_CayGiaPha)->delCayGiaPha($xoa_id)) { // Xóa thông tin của id cần xóa
                            header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/caygiapha");
                            return;
                        }
                        $thongbaotoi = "Lỗi rồi";
                    }
                } else {
                    $thongbaotoi = "Không tìm thấy";
                }
            }
            $thongbaotoi = "Bạn không thể xóa cả dòng họ";
        }
        $this->viewManage("template", [
            "template" => "caygiapha",
            "tree" => "<ul>" .  (new M_CayGiaPha)->drawTree("root", "treeflex", 1) . "</ul>",
            "thongbaotoi" => $thongbaotoi
        ]);
    }
}
