<script type="text/javascript" src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/lib/nicEdit.js"></script>
<script type="text/javascript">
    document.title = 'Liên hệ';
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
        <div class="col-md-5">
            <h5 class="text-center">Chỉnh sửa liên hệ chi tiết</h5>
            <form class="border" id="news_post" style="padding: 30px;" method="POST" action="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/lienhe">
                <input id="content" name="content" type="hidden">
                <div class=" form-group ">
                    <textarea style="width: 100%">
                        <?php
                        if (isset($data["datacontent"]["content"])) {
                            echo $data["datacontent"]["content"];
                        }
                        ?>
                    </textarea>
                </div>
                <button type="submit " class="btn btn-primary ">Thêm</button>
            </form>
        </div>
        <div class="col-md-7">
            <h5 class="text-center">Thông tin những người cần kết nối</h5>
            <div class="scroll">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên người gửi</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($data["datacontact"]->num_rows > 0) {
                            // output data of each row
                            while ($row = $data["datacontact"]->fetch_assoc()) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo substr($row['id'], 0, 5); ?></th>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>
                                        <?php echo $row['contact']; ?>
                                    </td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['content']; ?></td>
                                    <td><a href="<?php echo $_SERVER['URL_SERVER'] ?>/quanly/lienhe&xoa_id=<?php echo $row['id']; ?>">Xóa</a></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "0 results";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</div>
</div>