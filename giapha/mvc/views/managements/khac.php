<script type="text/javascript" src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/lib/nicEdit.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
        var form = document.getElementsByClassName("formPost");
        for (var i = 0; i < form.length; i++) {
            form[i].addEventListener('submit', function() {
                var nicEdit = this.querySelector("div[class='nicEdit-main']")[0];
                var inputHidden = this.querySelector("textarea")[0];
                inputHidden.value = nicEdit.innerHTML;

            });
        }
    });
</script>
<div class="container">
    <h5 class="text-center">Thông báo</h5>
    <div class="row border">
        <div class="col-md-6" style="height: 400px;">
            <div class="scroll">
                <form class='formPost' style="width: 95%;" method="POST" action="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/khac">
                    <div class="form-inline row">
                        <label class="col-md-2 col-form-label">Tiêu đề</label>
                        <div class="col-md-8">
                            <input type="text" name="title" class="form-control w-100" value="<?php if (isset($data['editthongbao'])) {
                                                                                                    echo $data['editthongbao']['title'];
                                                                                                } ?>">
                        </div>
                        <button type="submit" class="btn btn-outline-success col-md-2">Đăng</button>
                    </div>
                    <hr>
                    <input type="hidden" name="methol" value="<?php if (isset($data['editthongbao'])) {
                                                                    echo 'update';
                                                                } else {
                                                                    echo 'insert';
                                                                } ?>">
                    <input type="hidden" name="edit_id" value="<?php if (isset($data['editthongbao'])) {
                                                                    echo $data['editthongbao']['id'];
                                                                } ?>">
                    <textarea name="thongbao" cols="30" rows="10" class="w-100"><?php if (isset($data['editthongbao'])) {
                                                                                    echo $data['editthongbao']['content'];
                                                                                } ?></textarea>
                </form>
            </div>

        </div>
        <div class="col-md-6" style="height: 400px;">
            <div class="scroll">
                <?php
                if ($data["thongbao"]->num_rows > 0) {
                    // output data of each row
                    while ($row = $data["thongbao"]->fetch_assoc()) {
                ?>
                        <!-- In ra tất cả các bài đăng mới nhất -->
                        <div class="card">
                            <h5 style="margin-left: 10px;">
                                <a href="<?php echo $_SERVER["URL_SERVER"] ?>/chitietthongbao&id=<?php echo $row['id']; ?> ">
                                    <?php echo substr($row['title'], 0, 100); ?>
                                </a>
                            </h5>
                            <div>
                                <p>
                                    <?php echo substr($row['content'], 0, 200); ?>
                                </p>
                            </div>
                            <div class="row w-100">
                                <nav style="margin-left: 4%;"><strong>Ngày đăng : </strong>
                                    <?php echo $row['datetime']; ?>
                                </nav>
                                <nav style="margin-left: 4%;"><strong>Bởi : </strong>
                                    <?php echo (!empty($row["id_user"])) ? (new M_User)->getUserNameFromId($row["id_user"]) : "null"; ?>
                                </nav>

                                <button type="button" class="btn btn-outline-danger btn-sm" style="margin-left:3% ;">
                                    <a href="<?php echo $_SERVER["URL_SERVER"] ?>/quanly/khac&xoa_id=<?php echo $row['id']; ?> ">Xóa</a>
                                </button>
                                <button type="button" class="btn-outline-warning btn-sm">
                                    <a href="<?php echo $_SERVER["URL_SERVER"] ?>/quanly/khac&edit_id=<?php echo $row['id']; ?> ">Sửa</a>
                                </button>

                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 border" style="height: 400px;">
            <div class="scroll">
                <h5 class="text-center">Sửa danh sách video</h5>
                <form class='formPost' method="POST" action="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/khac">
                    <textarea name="video" cols="30" rows="10" class="w-100"><?php if (isset($data['video'])) {
                                                                                    echo $data['video']['content'];
                                                                                } ?></textarea>
                    <button type="submit" class="btn btn-outline-success col-md-2 float-right">Đăng</button>
                </form>
            </div>
        </div>
        <div class="col-md-6 border" style="height: 400px;">
            <div class="scroll">
                <h5 class="text-center">Sửa cội nguồn dòng tộc</h5>
                <form class='formPost' method="POST" action="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/khac">
                    <textarea name="tuyenngon" cols="30" rows="10" class="w-100"><?php if (isset($data['tuyenngon'])) {
                                                                                        echo $data['tuyenngon']['content'];
                                                                                    } ?></textarea>
                    <button type="submit" class="btn btn-outline-success col-md-2 float-right">Đăng</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group w-100">
            <form class='formPost' method="POST" action="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/khac">
                <h5>Sửa ảnh slide</h5>
                <div class="row">
                    <input type="hidden" name="methol" value="editLinkImg">
                    <div class="col-md-3">
                        <input type="text" name="link1" class="form-control" placeholder="http://google.com/Anh1" value='<?php echo $data["linkanh"][0][2] ?>'>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="link2" class="form-control" placeholder="http://google.com/Ahh2" value='<?php echo $data["linkanh"][1][2] ?>'>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="link3" class="form-control" placeholder="http://google.com/Anh3" value='<?php echo $data["linkanh"][2][2] ?>'>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </div>
            </form>
        </div>
    </div>


</div>

</div>