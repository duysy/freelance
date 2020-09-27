<?php
class M_LinkAnh extends DB
{
    function getLinkAnh()
    {
        $sql = "SELECT * FROM khac WHERE kind='linkanh'";
        return $this->query($sql);
    }
    function updateLink($id,$content)
    {
        $sql = "SELECT id FROM khac WHERE id='{$id}'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "UPDATE khac SET content='{$content}' WHERE id='{$id}'";
            if ($this->query($sql)) {
                return TRUE;
            }
            return FALSE;
        }
    }
}
