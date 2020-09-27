<?php
require_once 'M_TinTuc.php';
require_once 'M_User.php';
require_once 'M_CayGiaPha.php';
require_once 'M_GioiThieu.php';
require_once 'M_LichSu.php';
require_once 'M_SoLienLac.php';
require_once 'M_TaiLieu.php';
require_once 'M_ThongBao.php';
require_once 'M_TuyenNgon.php';
require_once 'M_Video.php';
require_once 'M_LienHe.php';
require_once 'M_LinkAnh.php';

class TatCa
{
    function tatCa()
    {
        return [
            "post" => (new M_TinTuc)->getAllTinTucForView(),
            "thongbao" => (new M_ThongBao)->getAllThongBaoForView(),
            "video" => mysqli_fetch_assoc((new M_Video)->getVideo()),
            "tuyenngon" => mysqli_fetch_assoc((new M_TuyenNgon)->getTuyenNgon())
        ];
    }
}
