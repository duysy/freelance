<script type="text/javascript">
    document.title = "Đăng ký";
</script>
<div class="col-md-7" id="dang-ky">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
        </ol>
    </nav>
    <form class="border" style="padding: 30px;" method="POST" action="<?php echo $_SERVER['URL_SERVER'] ?>/dangky">
        
        <?php if(isset($data["thongbaotoi"])){
            echo '<div class="alert alert-warning" role="alert">'.$data["thongbaotoi"].'</div>';
        }?>
        <div class="row">
            <div class="col">
                <label>Họ và tên</label>
                <input name="name" class="form-control" placeholder="Họ và tên">
            </div>
            <div class="col">
                <label>Số điện thoại</label>
                <input name="phone" class="form-control" placeholder="Số điện thoại">
            </div>
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input name="address" class="form-control" placeholder="Nhập địa chỉ">
        </div>
        <div class="row">
            <div class="col">
                <label>Tài khoản</label>
                <input name="username" class="form-control" placeholder="Nhập tài khoản">
            </div>
            <div class="col">
                <label>Mật khẩu</label>
                <input name="passwork" type="password" class="form-control" placeholder="Nhập mật khẩu">
                <small class="form-text text-muted">Không bao giờ chia sẻ mật khẩu cho ai khác.</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>

    </form>

</div>
