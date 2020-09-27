<?php
class M_TuyenNgon extends DB
{
    function getTuyenNgon()
    {
        $sql = "SELECT * FROM khac WHERE id='tuyenngon'";
        return $this->query($sql);
    }
    function updateTuyenNgon($content)
    {
        $sql = "SELECT id FROM khac WHERE id='tuyenngon'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "UPDATE khac SET content='{$content}' WHERE id='tuyenngon'";
            if ($this->query($sql) === TRUE) {
                return TRUE;
            }
            return FALSE;
        }
    }
}
