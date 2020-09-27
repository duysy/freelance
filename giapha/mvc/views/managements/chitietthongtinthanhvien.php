<script type="text/javascript" src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/lib/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
        var nicEdit = document.getElementsByClassName("nicEdit-main")[0];
        nicEdit.style.minHeight = "30vh";
        document.getElementById('news_post').addEventListener("submit", function() {
            document.getElementById("introduce").value = nicEdit.innerHTML.replace("'", "''");
        });
    });
</script>
<h5 class="text-center">Thêm/Chỉnh sửa thông tin</h5>
<form class="border" id="news_post" style="padding: 30px;" method="POST" action="<?php echo $_SERVER['URL_SERVER'] ?>/quanly/chitietthongtinthanhvien">
    <?php if (isset($data["thongbao"])) {
        echo '<div class="alert alert-warning" role="alert">' . $data["thongbao"] . '</div>';}?>
    <input type="hidden" name="id" value="<?php echo $data['info']['id']?>">
    <input type="hidden" name="introduce" id="introduce">
    <div class="row">
        <div class="col">
            <label>Họ Và Tên</label>
            <input name="name" class="form-control" placeholder="Họ và tên" value="<?php if (isset($data['info']["name"])){echo $data['info']["name"];}?>">
        </div>
        <div class="col">
            <label>Liên hệ</label>
            <input name="contact" class="form-control" placeholder="Liên Hệ" value="<?php if (isset($data['info']["contact"])){echo $data['info']["contact"];}?>">
        </div>
    </div>
    <div class="form-group">
        <label>Địa chỉ</label>
        <input name="address" class="form-control " placeholder="Địa chỉ " value="<?php if (isset($data['info']["address"])){echo $data['info']["address"];}?>">
    </div>
    <div class="form-group">
        <label>Ghi chú</label>
        <textarea rows="5" class="w-100"><?php if (isset($data['info']["introduce"])){echo $data['info']["introduce"];}?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
    </div>

</form>