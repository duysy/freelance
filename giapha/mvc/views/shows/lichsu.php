<script type="text/javascript">
    document.title = "Lịch sử";
</script>
<div class="col-md-7" id="lich-su">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lich sử</li>
        </ol>
    </nav>
    <div class="scroll">
    <?php 
        if(isset($data["resultNews"]["content"])){
            echo $data["resultNews"]["content"];
        }
        else{
            echo "Không có lịch sử";
        }
        ?>
    </div>
</div>
