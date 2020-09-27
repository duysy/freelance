<script type="text/javascript">
    document.title = "Sổ liên lạc";
</script>
<div class="col-md-7" id="phone-contact">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sổ liên lạc</li>
        </ol>
    </nav>
    <div class="scroll">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ông/Bà</th>
                    <th scope="col">Con cháu</th>
                    <th scope="col">Sdt</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ghi chú</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($data["datacontact"]->num_rows > 0) {
                    // output data of each row
                    while ($row = $data["datacontact"]->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row">
                            <?php echo substr($row['id'], 0, 5); ?>
                        </th>
                        <td>
                            <?php echo $row['host']; ?>
                        </td>
                        <td>
                            <?php echo $row['descendant']; ?>
                        </td>
                        <td>
                            <?php echo $row['phone']; ?>
                        </td>
                        <td>
                            <?php echo $row['address']; ?>
                        </td>
                        <td>
                            <?php echo $row['note']; ?>
                        </td>
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
