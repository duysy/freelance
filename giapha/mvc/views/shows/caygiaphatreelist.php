<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cây gia phả</title>
    <link href="<?php echo $_SERVER['URL_SERVER'] ?>/public/css/lib/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo $_SERVER['URL_SERVER']; ?>/public/css/styles.css" rel="stylesheet" />
    <link href="<?php echo $_SERVER['URL_SERVER']; ?>/public/css/treeview.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div style="height: 5px;width: 100%; background-color: tan;margin-top: 20px;margin-bottom: 20px;"></div>
        <div class="row" id="tree-giapha">
            <nav aria-label="breadcrumb" class="w-100">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cây gia phả</li>
                    <li style="margin-left: 70%;">
                        <a href="<?php echo $_SERVER['URL_SERVER'] ?>/caygiapha&style=treelist" class="badge badge-info">Tree List</a>
                        <a href="<?php echo $_SERVER['URL_SERVER'] ?>/caygiapha&style=treeflex" class="badge badge-light">Tree Flex</a>
                    </li>
                </ol>

            </nav>
            <div style="width: 100%;height: 100%;overflow: scroll;">
                <div id="tree">
                    <ul id="myUL">
                        <li>
                            <span class="caret stylelist">Gia phả</span>
                            <ul class="nested">
                                <?php echo $data['tree'] ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/jquery-3.2.1.slim.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/popper.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER'] ?>/public/js/lib/bootstrap.min.js "></script>
    <script src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/scripts.js"></script>
    <script type="text/javascript">
        document.title = "Cây gia phả";
    </script>

</body>

</html>