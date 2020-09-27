<?php
class M_TinTuc extends DB
{
    function getAllTinTuc()
    {
        if ($_SESSION['permission'] == 0) {
            $sql = "SELECT * FROM tintuc ORDER BY datetime DESC";
        } else {
            $sql = "SELECT * FROM tintuc WHERE id_user='{$_SESSION['id_user']}' ORDER BY datetime DESC";
        }

        return $this->query($sql);
    }
    function getAllTinTucForView()
    {
        $sql = "SELECT * FROM tintuc ORDER BY datetime DESC LIMIT 10";
        return $this->query($sql);
    }
    function getChiTietTinTuc($id)
    {
        $sql = "SELECT * FROM tintuc WHERE id='{$id}'";
        return $this->query($sql);
    }
    function insertTinTuc($title,  $summary, $content, $imagelink, $category)
    {
        $id = uniqid();
        $sql = "INSERT INTO tintuc (id, title,imagelink,summary, content,datetime,category,id_user)VALUES ('{$id}', '{$title}','{$imagelink}','{$summary}', '{$content}',NOW(),'{$category}','{$_SESSION['id_user']}')";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function updateTinTuc($id, $title, $summary, $content, $imagelink, $category)
    {
        if ($_SESSION['permission'] == 0) {
            $sql = "UPDATE tintuc SET title='{$title}',summary='{$summary}', content='{$content}',imagelink='{$imagelink}',category = '{$category}' WHERE id='{$id}'";
        } else {
            $id_user = $_SESSION['id_user'];
            $sql = "UPDATE tintuc SET title='{$title}',summary='{$summary}', content='{$content}',imagelink='{$imagelink}',category = '{$category}' WHERE id='{$id}' and id_user = '{$id_user}'";
        }
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function delTinTuc($id)
    {
        if ($_SESSION['permission'] == 0) {
            $sql = "DELETE FROM tintuc WHERE id='{$id}'";
        } else {
            $id_user = $_SESSION['id_user'];
            $sql = "DELETE FROM tintuc WHERE id='{$id}' and id_user = '{$id_user}'";
        }

        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
}
