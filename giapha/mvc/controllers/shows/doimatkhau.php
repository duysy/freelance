<?php
class doimatkhau extends Controller
{
    function __construct()
    {
        if (isset($_POST['username']) && isset($_POST['old-passwork']) && isset($_POST['new-passwork']) && isset($_POST['confirm-passwork'])) {
            if (!empty($_POST['username']) && !empty($_POST['old-passwork']) && !empty($_POST['new-passwork']) && !empty($_POST['confirm-passwork'])) {
                if ($_POST['new-passwork'] === $_POST['confirm-passwork']) {
                    $username = $_POST['username'];
                    $old_passwork = $_POST['old-passwork'];
                    if ((new M_User)->dangNhap($username, $old_passwork)) {
                        $new_passwork = $_POST['new-passwork'];
                        if ((new M_User)->doiMatKhau($username, $new_passwork)) {
                            $this->render("Bạn đã đổi thành công");
                        } else {
                            $this->render("Đổi mật khẩu thất bại");
                        }
                    } else {
                        $this->render("Sai mật khẩu");
                    }
                } else {
                    $this->render("Xác nhận mật khẩu không đúng");
                }
            }
            $this->render("Vui lòng nhập đầy đủ thông tin");
        } else {
            $this->render();
        }
    }
    function render($thongbaoloi=NULL)
    {
        $this->view("template", array_merge(
            [
                "template" => "doimatkhau",
                "thongbaotoi" => $thongbaoloi
            ],
            (new TatCa)->tatCa()
        ));
    }
}
