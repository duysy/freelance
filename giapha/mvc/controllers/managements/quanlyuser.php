<?php
class quanlyuser extends Controller
{
    function __construct()
    {
        if (isset($_POST['id_user']) && isset($_POST['permission'])) {
            $id_user = $_POST['id_user'];
            $permission = $_POST['permission'];
            if ((new M_User)->updatePermission($id_user, $permission)) {
                $this->render("Thành công");
            }
        }
        $this->render();
    }
    function render($thongbaotoi = NULL)
    {
        $this->viewManage("template", [
            "template" => "quanlyuser",
            "datauser" => (new M_User)->getAllUser(),
            "thongbaotoi" => $thongbaotoi
        ]);
    }
}
