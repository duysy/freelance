<?php
class M_TaiLieu extends DB
{
    function getTaiLieu()
    {
        $sql = "SELECT * FROM khac WHERE id='tailieu'";
        return $this->query($sql);
    }
    function updateTaiLieu($content)
    {
        $sql = "SELECT id FROM khac WHERE id='tailieu'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "UPDATE khac SET content='{$content}' WHERE id='tailieu'";
            if ($this->query($sql)) {
                return TRUE;
            }
            return FALSE;
        }
    }
    function insertTaiLieu($content)
    {
        $sql = "SELECT id FROM khac WHERE id='tailieu'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "INSERT INTO khac(id,content,date)VALUES ('tailieu', '{$content}',NOW())";
            if ($this->query($sql)) {
                return TRUE;
            }
            return FALSE;
        }
    }
}
