<link href="<?php echo $_SERVER['URL_SERVER'] ?>/public/css/lib/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet">

<link href="<?php echo $_SERVER['URL_SERVER']; ?>/public/css/styles.css" rel="stylesheet" />
<link href="<?php echo $_SERVER['URL_SERVER']; ?>/public/css/treeview.css" rel="stylesheet" />

<?php
if (isset($data['datagrade']['name'])) {
    $name = $data['datagrade']['name'];
}
?>
<div class="container-fluid">
    <div class="row" id="tree-giapha">
        <div class="col-md-9">
            <div style="overflow: scroll;height: 85vh;">
                <ul class="tree">
                    <li>
                        <span id="root" class="action">Gia phả</span>
                        <?php if (isset($data['tree'])) {
                            echo $data['tree'];
                        } ?>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col-md-3">
            <h4>Thêm người nhà Ông/Bà :
                <?php if (isset($data["thongbaotoi"]) && $data["thongbaotoi"] !== "") {
                    echo '<div class="alert alert-warning" role="alert">' . $data["thongbaotoi"] . '</div>';
                } ?>
                <?php if (isset($data['datagrade'])) {
                ?>
                    <!-- Tên của đối tượng cần nhập -->
                    <div class="alert alert-primary" role="alert">
                        <?php echo $name; ?>
                    </div>
                <?php
                } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Vui lòng chọn đối tượng
                    </div>
                    <!-- Thông báo chưa chọn đối tượng -->
                <?php } ?>
                </h5>
                <form method="POST" id="news_post" action="<?php echo $_SERVER['URL_SERVER'] ?>/quanly/caygiapha">
                    <input name="introduce" id="introduce" type="hidden" class="form-control">
                    <input name="add_id" value="<?php if (isset($data['datagrade'])) {
                                                    echo $data['datagrade']['id'];
                                                } ?>" type="hidden" class="form-control">
                    <div class="row">
                        <div class="col">
                            <label>Họ Và Tên</label>
                            <input name="name" class="form-control" placeholder="Họ và tên">
                        </div>
                        <div class="col">
                            <label>Liên hệ</label>
                            <input name="contact" class="form-control" placeholder="Liên Hệ">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input name="address" class="form-control " placeholder="Địa chỉ">
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu</label>
                        <textarea style="width: 100%"></textarea>
                    </div>
                    <div class="row">
                        <button type="submit" style="margin-right:5%;" class="btn btn-primary">Thêm</button>
                        <button class="btn"><a href="<?php echo $_SERVER['URL_SERVER'] ?>/quanly/chitietthongtinthanhvien&id=<?php echo $data['datagrade']['id']; ?>">Thông tin chi tiết</a></button>
                        <button class="btn btn-outline-danger" style="margin-left: 10%;" type="button" onclick="xoaNhanh()">Xóa</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/lib/nicEdit.js"></script>
<script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/jquery-3.2.1.slim.min.js "></script>
<script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/popper.min.js "></script>
<script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/bootstrap.min.js "></script>


<script src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/scripts.js"></script>
<script type="text/javascript">
    document.title = 'Cây gia phả';
    // Xác nhận có xóa hay không
    function xoaNhanh() {
        if (confirm("Bạn có chắc chắn muốn xóa không")) {
            window.location.href = "<?php echo $_SERVER['URL_SERVER'] ?>/quanly/caygiapha&xoa_id=<?php if (isset($data['datagrade']['id'])) echo $data['datagrade']['id']; ?>";
        }
    }
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
        var nicEdit = document.getElementsByClassName("nicEdit-main")[0];
        nicEdit.style.minHeight = "20vh";
        document.getElementById('news_post').addEventListener("submit", function() {
            document.getElementById("introduce").value = nicEdit.innerHTML.replace("'", "''");
        });
    });
    // Khi nhánh click thì add
    var action = document.getElementsByClassName("action");
    for (var i = 0; i < action.length; i++) {
        action[i].addEventListener("click", function() {
            window.location.href = "<?php echo $_SERVER['URL_SERVER'] ?>/quanly/caygiapha&add_id=" + this.id;
        });
    }
</script>