<script type="text/javascript">
    document.title = "Giới thiệu";
</script>
<div class="col-md-7" id="gioi-thieu">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
        </ol>
    </nav>
    <div class="scroll">
        <?php
        if (isset($data["resultNews"]["content"])) {
            echo $data["resultNews"]["content"];
        } else {
            echo "Không có giới thiệu";
        }
        ?>
    </div>
</div>
