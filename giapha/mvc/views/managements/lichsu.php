<script type="text/javascript" src="<?php echo $_SERVER['URL_SERVER']; ?>/public/js/lib/nicEdit.js"></script>
<script type="text/javascript">
    document.title = 'Lịch sử';
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
    <h5 class="text-center">Chỉnh sửa lịch sử</h5>
    <form class="border" id="news_post" style="padding: 30px;" method="POST" action="<?php echo $_SERVER['URL_SERVER']; ?>/quanly/lichsu">
        <div class=" form-group ">
            <input id="content" name="content" type="hidden">
            <textarea style="width: 100%">
            <?php
            if (isset($data["resultNews"]["content"])) {
                echo $data["resultNews"]["content"];
            } else {
                echo "Không có lịch sử";
            }
            ?>
            </textarea>
        </div>
        <button type="submit " class="btn btn-primary ">Sửa</button>
    </form>
</div>