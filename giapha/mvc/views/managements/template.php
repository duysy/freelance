<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>

    <link href="<?php echo $_SERVER['URL_SERVER']; ?>/public/css/styleforman.css" rel="stylesheet" />
    <link href="<?php echo $_SERVER['URL_SERVER']; ?>/public/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo $_SERVER['URL_SERVER'] ?>/public/css/lib/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav w-100">
                <li class="nav-item ">
                    <a class="navbar-brand" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/">Quản Lý</a>
                </li>
                <li class="nav-item ">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/tintuc/">Tin tức</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/caygiapha/">Cây gia phả</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/solienlac/">Sổ liên lạc</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/gioithieu/">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/tailieu/">Tài liệu</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/lichsu/">Lịch sử</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/lienhe/">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/khac/">Khác</a>
                </li>
                <li class="nav-item">
                    <a class=" nav-link" href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/quanlyuser/">Quản lý user</a>
                </li>
                <li class="nav-item" style="margin-left: auto;">
                    <div class=" row">
                        <nav aria-label="breadcrumb" class="w-100">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" style="margin-right: 10px;"><strong>Name : </strong><?php echo $_SESSION['username']; ?></li>
                                <li class="breadcrumb-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/trangchu">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/">Quản lý</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $data['template']; ?></li>
                            </ol>
                        </nav>
                    </div>
                </li>
                </li>


            </ul>
        </div>
    </nav>
    <!-- ------------------------------------- -->
    <?php require_once($data['template'] . ".php") ?>
    <!-- ------------------------------------- -->

    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/jquery-3.2.1.slim.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/popper.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/bootstrap.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/scripts.js "></script>

</body>

</html>