<?php
class M_SoLienLac extends DB
{
    function getAllSoLienLac()
    {
        $sql = "SELECT * FROM solienlac";
        return $this->query($sql);
    }
    function insertSolienLac($id, $host, $descendant, $phone, $address, $note)
    {
        $sql = "INSERT INTO solienlac (id, host,descendant, phone,address,note)VALUES ('{$id}', '{$host}','{$descendant}', '{$phone}','{$address}','{$note}')";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function delSolienLac($id)
    {
        $sql = "DELETE FROM solienlac WHERE id='{$id}'";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function updateSolienLac($id, $host, $descendant, $phone, $address, $note)
    {
        $sql = "INSERT INTO solienlac (id, host,descendant, phone,address,note)VALUES ('{$id}', '{$host}','{$descendant}', '{$phone}','{$address}','{$note}')";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function updateContent($content)
    {
        $sql = "UPDATE tintuc SET content='{$content}' WHERE id='lienhe'";
        echo $sql;
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
}
