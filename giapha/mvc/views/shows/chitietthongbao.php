<script type="text/javascript">
    document.title = "Chi tiết thông báo";
</script>
<div class="col-md-7" id="thong-bao">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi Tiết Thông Báo</li>
        </ol>
    </nav>
    <div class="scroll">
        <?php
        if (isset($data["resultNews"]["content"])) {
            echo $data["resultNews"]["content"];
            echo '<h6> Ngày đăng : '.$data["resultNews"]["datetime"].'</h6>';
            echo '<h6> Bởi : '. ((!empty($data["resultNews"]["id_user"]))?(new M_User)->getUserNameFromId($data["resultNews"]["id_user"]):"null").'</h6>';
        }
        ?>
        
    </div>
</div>