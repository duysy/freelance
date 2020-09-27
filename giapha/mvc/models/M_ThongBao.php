<?php
class M_ThongBao extends DB
{
    function getAllThongBao()
    {

        if ($_SESSION['permission'] == 0) {
            $sql = "SELECT * FROM khac WHERE kind='thongbao' ORDER BY datetime DESC";
        } else {
            $sql = "SELECT * FROM khac WHERE kind='thongbao' AND id_user='{$_SESSION['id_user']}' ORDER BY datetime DESC";
        }
        return $this->query($sql);
    }
    function getAllThongBaoForView()
    {
        $sql = "SELECT * FROM khac WHERE kind='thongbao' ORDER BY datetime DESC LIMIT 10";
        return $this->query($sql);
    }
    function getThongBao($id)
    {
        $sql = "SELECT * FROM khac WHERE id='{$id}'";
        return $this->query($sql);
    }
    function insertThongBao($id, $title, $content)
    {
        $sql = "INSERT INTO khac(id,title,content,kind,datetime,id_user)VALUES ('{$id}','{$title}','{$content}','thongbao',NOW(),'{$_SESSION['id_user']}')";
        if ($this->query($sql) === TRUE) {
            return TRUE;
        }
        return FALSE;
    }
    function delThongBao($id)
    {
        if ($_SESSION['permission'] == 0) {
            $sql = "DELETE FROM khac WHERE id='{$id}'";
        } else {
            $id_user = $_SESSION['id_user'];
            $sql = "DELETE FROM khac WHERE id='{$id}' and id_user = '{$id_user}'";
        }
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function updateThongBao($id, $title, $content)
    {

        if ($_SESSION['permission'] == 0) {
            $sql = "UPDATE khac SET content='{$content}',title='{$title}',datetime=NOW() WHERE id='{$id}'";
        } else {
            $id_user = $_SESSION['id_user'];
            $sql = "UPDATE khac SET content='{$content}',title='{$title}',datetime=NOW() WHERE id='{$id}' and id_user = '{$id_user}'";
        }
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
}
