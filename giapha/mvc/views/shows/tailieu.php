<script type="text/javascript">
    document.title = "Tài liệu";
</script>
<div class="col-md-7" id="tai-lieu">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài Liệu</li>
        </ol>
    </nav>
    <div class="scroll">
    <?php 
        if(isset($data["resultNews"]["content"])){
            echo $data["resultNews"]["content"];
        }
        else{
            echo "Không có tài liệu";
        }
        ?>
    </div>
</div>
