<?php
class M_Video extends DB
{
    function getVideo()
    {
        $sql = "SELECT * FROM khac WHERE id='video'";
        return $this->query($sql);
    }
    function updateVideo($content)
    {
        $sql = "SELECT id FROM khac WHERE id='video'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "UPDATE khac SET content='{$content}' WHERE id='video'";
            if ($this->query($sql) === TRUE) {
                return TRUE;
            }
            return FALSE;
        }
    }
}
