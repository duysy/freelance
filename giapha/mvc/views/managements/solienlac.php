<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <h5 class="text-center">Thêm thông tin liên lạc</h5>
            <form class="border" style="padding: 30px;" method="POST" action="<?php echo $_SERVER['URL_SERVER'] ?>/quanly/solienlac">
                <?php if (isset($data["thongbao"])) {
                    echo '<div class="alert alert-warning" role="alert">' . $data["thongbao"] . '</div>';
                } ?>
                <div class="row">
                    <div class="col">
                        <label>Ông/Bà</label>
                        <input name="host" class="form-control" placeholder="Họ và tên">
                    </div>
                    <div class="col">
                        <label>Địa chỉ</label>
                        <input name="address" class="form-control" placeholder="Địa chỉ">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Thành viên</label>
                        <textarea name="descendant" rows="5" class="w-100"></textarea>
                    </div>
                    <div class="col">
                        <label>Số điện thoại</label>
                        <input name="phone" class="form-control" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="form-group">
                    <label>Ghi chú</label>
                    <input name="note" class="form-control" placeholder="Ghi chú">
                </div>

                <button type="submit" class="btn btn-primary">Thêm</button>

            </form>
        </div>

        <div class="col-md-7">
            <h5 class="text-center">Thông tin liên lạc</h5>
            <div class="scroll">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ông/Bà</th>
                            <th scope="col">Con cháu</th>
                            <th scope="col">Sdt</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Ghi chú</th>
                            <th scope="col">Hành động</th>
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
                                    <td><?php echo $row['host']; ?></td>
                                    <td>
                                        <?php echo $row['descendant']; ?>
                                    </td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['note']; ?></td>
                                    <td><a href="<?php echo $_SERVER["URL_SERVER"] ?>/quanly/solienlac&xoa_id=<?php echo $row['id']; ?>">Xóa</a></td>
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
<script type="type= text/javascript">
    document.title = "Sổ liên lạc";
</script>