<?php
$title = "";
$content = "";
$date = "";
if (isset($data["resultNews"])) {
    $title =  substr($data["resultNews"]["title"], 0, 100);
    $content = $data["resultNews"]["content"];
    $date = $data["resultNews"]["datetime"];
}

?>
<script type="text/javascript">
    document.title = "Chi tiết tin";
</script>
<div class="col-md-7" id="tin-tuc">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/">Tin tức</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
        </ol>
    </nav>
    <div class="scroll">
        <h4 class="text-center"><?php echo $title; ?></h4>
        <?php echo $content ?>
        <nav><strong>Ngày đăng</strong> : <?php echo $date; ?></nav>
        <nav><strong>Bởi</strong>: <?php echo (!empty($data["resultNews"]["id_user"])) ? (new M_User)->getUserNameFromId($data["resultNews"]["id_user"]) : "null" ?></nav>
    </div>
</div>