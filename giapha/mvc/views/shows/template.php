<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="<?php echo $_SERVER['URL_SERVER']; ?>/public/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="<?php echo $_SERVER['URL_SERVER'] ?>/public/css/lib/bootstrap.min.css">

</head>

<body>
    <div class="container border">
        <div class="row">
            <img src="<?php echo $_SERVER['URL_SERVER']; ?>/public/assets/img/logo.png" class="img-fluid img-slogan w-100" alt="Responsive image">
        </div>
        <div class="row_component"></div>
        <div class="row">
            <div class="col-md-2 " id="menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="list-group w-100">
                            <li class="list-group-item" style="background-color: wheat;"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/trangchu">Trang chủ</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/solienlac">Liên Lạc Thành Viên</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/caygiapha">Cây gia phả</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/tailieu">Tài liệu</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/lichsu">Lịch sử</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/lienhe">Liên hệ</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/gioithieu">Giới thiệu</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/tintuc">Quản lý</a></li>
                            <li class="list-group-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/dangnhap">Đăng nhập</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <?php require_once($data['template'] . ".php") ?>
            <!-- THông báo -->
            <div class="col-md-3" id="news-notify">
                <div class="row border" id="news-post">
                    <h5 class="text-center">Thông báo</h5>
                    <div class="scroll">
                        <ul class="list-group list-group-flush">
                            <?php
                            if ($data["thongbao"]->num_rows > 0) {
                                while ($row = $data["thongbao"]->fetch_assoc()) {
                            ?>
                                    <li class="list-group-item">
                                        <a href="<?php echo $_SERVER['URL_SERVER'] ?>/chitietthongbao&id=<?php echo $row['id']; ?>">
                                            <?php echo substr($row['title'], 0, 80) ?>
                                        </a>
                                        <?php
                                        $dateNow = strtotime(date('m/d/Y h:i:s a', time()));
                                        $datePostNews = strtotime($row['datetime']);
                                        $dateRanger = floor(($dateNow - $datePostNews) / (60 * 60 * 24));
                                        if ($dateRanger < 3) {
                                            echo '<span class="badge badge-pill badge-warning">Mới</span>';
                                        }
                                        ?>

                                    </li>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </ul>
                    </div>
                </div>
                <hr class="my-1">
                <div class="row" id="notify">
                    <h5 class="text-center"> Cội nguồn dòng tộc</h5>
                    <div class="scroll">
                        <p>
                            <!-- Tuyên Ngon -->
                            <?php if (isset($data['tuyenngon'])) {
                                echo $data['tuyenngon']['content'];
                            } ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <!-- *********************Tin tưc********************************************* -->
        <div class="row" id="video-news">
            <div class="col-md-4" id="list-video">
                <h5 class="text-center h-10">Video</h5>
                <div class="scroll">
                    <!-- Video -->
                    <?php if (isset($data['video'])) {
                        echo $data['video']['content'];
                    } ?>
                </div>
            </div>
            <div class="col-md-8" id="newspaper">
                <h5 class="text-center">Tin tức</h5>
                <div class="scroll">
                    <?php
                    if ($data["post"]->num_rows > 0) {
                        // output data of each row
                        while ($row = $data["post"]->fetch_assoc()) {
                    ?>
                            <div class="card border">
                                <h4 style="margin-left: 10px;">
                                    <a href="<?php echo $_SERVER['URL_SERVER'] ?>/chitiettin&id=<?php echo $row['id']; ?> "><?php echo substr($row['title'], 0, 100); ?></a>
                                </h4>
                                <div class="row">
                                    <div class="col-4 ">
                                        <img src="<?php echo $row['imagelink']; ?>" class="rounded float-left " style="width:100%; ">
                                    </div>
                                    <div class="col-8">
                                        <p>
                                            <?php echo $row['summary']; ?>
                                        </p>
                                        <p class="font-italic "><strong>Ngày đăng : </strong><?php echo $row['datetime']; ?></p>
                                    </div>
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
        <hr class="my-4">
        <!-- Footer -->
        <div class="row">
            <div class="col-md-6 ">
                <nav class="card-title"><i class="fas fa-igloo"></i>&nbspBan chấp hành tộc Đặng Công Việt Nam</nav>
                <nav class="card-title"><i class="fas fa-map-marker-alt"></i>&nbspĐịa chỉ:45 Kim Mã - Hà Nội</nav>
                <nav class="card-title"><i class="fas fa-phone"></i>&nbspĐiện thoại: 0913081686</nav>
                <nav class="card-title"><i class="fas fa-envelope-square"></i>&nbspEmail: nguyenkiem45@yahoo.com - nguyenkiem45@gmail.com</nav>
                <nav class="card-title"><i class="fas fa-edit"></i>&nbspBan Biên Tập Thông Tin phòng Tuyên Truyền lịch sử</nav>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d231.990228389381!2d108.13856952114257!3d15.991429952722!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTXCsDU5JzI5LjQiTiAxMDjCsDA4JzE5LjQiRQ!5e1!3m2!1sen!2s!4v1598883310197!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> </div>
        </div>

    </div>
    <div class="footer-copyright text-center py-3">© <?php echo date("Y"); ?> Copyright:
        <a href="<?php echo $_SERVER['URL_SERVER']; ?>"><?php echo $_SERVER['URL_SERVER']; ?></a>
    </div>
    </div>
    </div>
    <noscript>
        <div class="player-unavailable">
            <h1 class="message">An error occurred.</h1>
        </div>
    </noscript>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/jquery-3.2.1.slim.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/popper.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/bootstrap.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/scripts.js "></script>

</body>

</html>