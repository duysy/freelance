<script type="text/javascript">
    document.title = "Đổi mật khẩu";
</script>
<div class="col-md-7" id="doi-mat-khau">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
        </ol>
    </nav>
    <form class="border" style="padding: 30px;" method="POST" action="<?php echo $_SERVER['URL_SERVER'] ?>/doimatkhau">
        <?php if (isset($data["thongbaotoi"])) {
            echo '<div class="alert alert-warning" role="alert">' . $data["thongbaotoi"] . '</div>';
        } ?>
        <div class="form-group">
            <label>Tài khoản</label>
            <input name="username" class="form-control" placeholder="Nhập tài khoản">
        </div>
        <div class="form-group">
            <label>Mật khẩu cũ</label>
            <input name="old-passwork" type="password" class="form-control" placeholder="Nhập mật khẩu cũ">
        </div>
        <div class="form-group">
            <label>Mật khẩu mới</label>
            <input name="new-passwork" type="password" class="form-control" placeholder="Nhập mật khẩu mới">
        </div>
        <div class="form-group">
            <label>Xác nhận mật khẩu mới</label>
            <input name="confirm-passwork" type="password" class="form-control" placeholder="Xác nhận mật khẩu mới">
            <small class="form-text text-muted">Không bao giờ chia sẻ mật khẩu cho ai khác.</small>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Xác nhận</button>
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
