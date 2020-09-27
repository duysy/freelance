<script type="text/javascript">
    document.title = "Đăng nhập";
</script>
<div class="col-md-7" id="dang-nhap">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
        </ol>
    </nav>
    <form class="border" style="padding: 30px;" method="POST" action="<?php echo $_SERVER['URL_SERVER'] ?>/dangnhap">
        <?php if (isset($data["thongbaotoi"])) {
            echo '<div class="alert alert-warning" role="alert">' . $data["thongbaotoi"] . '</div>';
        } ?>
        <div class="form-group">
            <label>Tài khoản</label>
            <input name="username" class="form-control" placeholder="Nhập tài khoản">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input name="passwork" type="password" class="form-control" placeholder="Nhập mật khẩu">
            <small id="emailHelp" class="form-text text-muted">Không bao giờ chia sẻ mật khẩu cho ai khác.</small>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>
            <div class="col">
                <a href="<?php echo $_SERVER['URL_SERVER'] ?>/dangky" class="stretched-link">Tạo tài khoản</a>
            </div>
            <div class="col">
                <a href="<?php echo $_SERVER['URL_SERVER'] ?>/doimatkhau" class="stretched-link">Đổi mật khẩu</a>
            </div>
        </div>
    </form>
</div>
