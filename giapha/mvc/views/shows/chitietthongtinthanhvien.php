<div class="col-md-7" id="chi-tiet-thanh-vien">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết thông tin</li>
        </ol>
    </nav>

    <h6 class='my-6'>Họ và tên : <i><?php if (isset($data["info"]["name"])) {echo $data["info"]["name"];} else{echo "Trống";}?></i></h6>
    <h6 class='my-6'>Liên hệ : <i><?php if (isset($data["info"]["contact"])) {echo $data["info"]["contact"];} else{echo "Trống";}?></i></h6>
    <h6 class='my-6'>Địa chỉ : <i><?php if (isset($data["info"]["address"])) {echo $data["info"]["address"];} else{echo "Trống";}?></i></h6>
    <h5 class='my-4'>Thông tin khác </h5>
    <p>
        <?php if (isset($data["info"]["introduce"])) {echo $data["info"]["introduce"];} else{echo "Trống";}?>
    </p>
    </nav>
</div>