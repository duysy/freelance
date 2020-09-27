<?php
class M_LichSu extends DB
{
    function getLichSu()
    {
        $sql = "SELECT * FROM khac WHERE id='lichsu'";
        return $this->query($sql);;
    }
    function updateLichSu($content)
    {
        $sql = "SELECT id FROM khac WHERE id='lichsu'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "UPDATE khac SET content='{$content}' WHERE id='lichsu'";
            if ($this->query($sql) === TRUE) {
                return TRUE;
            }
            return FALSE;
        }
    }
    function insertLichSu($content)
    {
        $sql = "SELECT id FROM khac WHERE id='lichsu'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "INSERT INTO khac(id,content,date)VALUES ('lichsu', '{$content}',NOW())";
            if ($this->query($sql) === TRUE) {
                return TRUE;
            }
            return FALSE;
        }
    }
}
