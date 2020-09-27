<script type="type= text/javascript">
    document.title = "Quản lý user";
</script>
<div class="container-fluid">
    <h5 class="text-center">Quản lý User</h5>
    <?php if (isset($data["thongbaotoi"])) {
        echo '<div class="alert alert-warning" role="alert">' . $data["thongbaotoi"] . '</div>';
    } ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">User</th>
                <th scope="col">Tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Quyền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($data["datauser"]->num_rows > 0) {
                // output data of each row
                while ($row = $data["datauser"]->fetch_assoc()) {
                    if ($row['id'] != $_SESSION['id_user']) {
            ?>
                        <tr>
                            <td> <?php echo (!empty($row['id']) ? $row['id'] : "Trống") ?></td>
                            <td> <?php echo (!empty($row['username']) ? $row['username'] : "Trống") ?></td>
                            <td> <?php echo (!empty($row['name']) ? $row['name'] : "Trống") ?></td>
                            <td> <?php echo (!empty($row['phone']) ? $row['phone'] : "Trống") ?></td>
                            <td> <?php echo (!empty($row['address']) ? $row['address'] : "Trống") ?></td>
                            <td>
                                <form class="form" method="POST" action="<?php echo $_SERVER['URL_SERVER'] ?>/quanly/quanlyuser/">
                                    <input name="id_user" type="hidden" value="<?php echo $row['id'] ?>">
                                    <select class="custom-select mr-sm-2" name="permission">
                                        <option selected><?php echo (!empty($row['permission']) ? $row['permission'] : "") ?></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
            <?php
                    }
                }
            } else {
                echo "0 results";
            }
            ?>
        </tbody>
    </table>
    <p>
        Với 1 thì có quyền tại khác và tin tức nhưng chỉ thêm sửa xóa nhưng bài của người đó đăng.
        Với 2 thì chỉ xem và không được làm gì hết.
    </p>
</div>
<script type="text/javascript">
    document.title = 'Quản lý user';
    var form = document.getElementsByClassName("form");
    for (var i = 0; i < form.length; i++) {
        form[i].addEventListener("change", function() {
            this.submit(function(event) {
                alert("Thành công");
            });
        });
    }
    setTimeout(function() {
        document.getElementsByClassName('alert')[0].style.display = "none";
    }, 3000);
</script>