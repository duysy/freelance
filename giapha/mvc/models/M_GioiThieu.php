<?php
class M_GioiThieu extends DB
{
    function getGioiThieu()
    {
        $sql = "SELECT * FROM khac WHERE id='gioithieu'";  
        return $this->query($sql);
    }
    function updateGioiThieu($content)
    {
        $sql = "SELECT id FROM khac WHERE id='gioithieu'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "UPDATE khac SET content='{$content}' WHERE id='gioithieu'";
            if ($this->query($sql) === TRUE) {
                return TRUE;
            }
            return FALSE;
        }
    }
    function insertGioiThieu($content)
    {
        $sql = "SELECT id FROM khac WHERE id='gioithieu'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "INSERT INTO khac(id,content,date)VALUES ('gioithieu', '{$content}',NOW())";
            if ($this->query($sql) === TRUE) {
                return TRUE;
            }
            return FALSE;
        }
    }
}
