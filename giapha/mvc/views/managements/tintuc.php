<script type="text/javascript" src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/lib/nicEdit.js"></script>
<script type="text/javascript">
    document.title = "Tin tức";
    bkLib.onDomLoaded(function() {
        nicEditors.allTextAreas()
        var nicEdit = document.getElementsByClassName("nicEdit-main")[0];
        nicEdit.style.minHeight = "60vh";
        document.getElementById('news_post').addEventListener("submit", function() {
            document.getElementById("content").value = nicEdit.innerHTML.replace("'", "''");
        });
    });
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <h5 class="text-center">Thêm tin mới</h5>
            <form class="border" style="padding: 30px;" id="news_post" method="POST" action="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/tintuc">
                <input name="method" type="hidden" value="<?php if (isset($data['resultNews'])) {
                                                                echo "edit";
                                                            } else {
                                                                echo 'post';
                                                            } ?>">
                <input name="id" type="hidden" value="<?php if (isset($data['resultNews'])) {
                                                            echo $data['resultNews']['id'];
                                                        } ?>">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input name="title" class="form-control" placeholder="Nhập tiêu đề" value="<?php if (isset($data['resultNews'])) {
                                                                                                    echo $data['resultNews']['title'];
                                                                                                } ?>">
                </div>
                <div class="form-group">
                    <label>Ảnh</label>
                    <input name="imagelink" class="form-control" placeholder="https://XXXXXXXXXX" value="<?php if (isset($data['resultNews'])) {
                                                                                                                echo $data['resultNews']['imagelink'];
                                                                                                            } ?>">
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <input name="category" type="text" class="form-control" value="<?php if (isset($data['resultNews'])) {
                                                                                        echo $data['resultNews']['category'];
                                                                                    } ?>">
                </div>
                <div class="form-group">
                    <label>Tóm tắt</label>
                    <input name="summary" type="text" class="form-control" value="<?php if (isset($data['resultNews'])) {
                                                                                        echo $data['resultNews']['summary'];
                                                                                    } ?>">
                </div>

                <div class=" form-group ">
                    <label>Nội dung</label>
                    <input id="content" name="content" type="hidden">
                    <textarea style="width: 100%"><?php if (isset($data['resultNews'])) {
                                                        echo $data['resultNews']['content'];
                                                    } ?></textarea>
                </div>
                <button type="submit " class="btn btn-primary ">Đăng Bài</button>
            </form>
        </div>

        <div class="col-md-4" id="newspaper">
            <h5 class="text-center">Tin tức</h5>
            <div class="scroll">
                <?php
                if ($data["post"]->num_rows > 0) {
                    // output data of each row
                    while ($row = $data["post"]->fetch_assoc()) {
                ?>
                        <!-- In ra tất cả các bài đăng mới nhất -->
                        <div class="card border">
                            <h4 style="margin-left: 10px;">
                                <a href="<?php echo $_SERVER["URL_SERVER"] ?>/chitiettin&id=<?php echo $row['id']; ?> "><?php echo substr($row['title'], 0, 100); ?></a>
                            </h4>
                            <div class="row">
                                <div class="col-4 ">
                                    <img src="<?php echo $row['imagelink']; ?>" class="rounded float-left " style="width:100%; ">
                                </div>
                                <div class="col-8">
                                    <p>
                                        <?php echo substr($row['summary'], 0, 200); ?>
                                    </p>

                                </div>
                            </div>
                            <div class="row w-100" style="margin-left: 4%;margin-top: 1%;">
                                <p class="font-italic "><strong>Ngày đăng : </strong><?php echo $row['datetime']; ?></p>
                                <nav style="margin-left: 4%;"><strong>Bởi : </strong>
                                    <?php echo (!empty($row["id_user"]))?(new M_User)->getUserNameFromId($row["id_user"]):"null"; ?>
                                </nav>
                                <button type="button" class="btn btn-outline-danger btn-sm" style="margin-left: 4%;">
                                    <a href="<?php echo $_SERVER["URL_SERVER"] ?>/quanly/tintuc&xoa_id=<?php echo $row['id']; ?> ">Xóa</a>
                                </button>
                                <button type="button" class="btn-outline-warning btn-sm">
                                    <a href="<?php echo $_SERVER["URL_SERVER"] ?>/quanly/tintuc&edit_id=<?php echo $row['id']; ?> ">Sửa</a>
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
</div>