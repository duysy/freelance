<script type="text/javascript">
    document.title = "Liên hệ";
</script>
<div class="col-md-7" id="lien-he">
    <div class="scroll">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ol>
        </nav>
        <form method="POST" action="<?php echo $_SERVER['URL_SERVER'] ?>/lienhe">
            <div class="form-group">
                <label>Họ và tên</label>
                <input name="name" class="form-control" placeholder="Nguyễn Văn A">
            </div>
            <div class="form-group">
                <label>Email hoặc số điện thoại</label>
                <input name="contact" class="form-control" placeholder="name@example.com/034545xxxx">
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input name="address" class="form-control" placeholder="xxxxx">
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea name="content" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary " style="width: 20%; margin-left: 40%;">Gửi</button>
        </form>
        <?php
        if (isset($data["resultNews"]["content"])) {
            echo $data["resultNews"]["content"];
        }
        ?>
    </div>
</div>
