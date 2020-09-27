<?php
class M_LienHe extends DB
{
    function getLienHe()
    {
        $sql = "SELECT * FROM lienhe";
        return (new DB)->query($sql);
    }
    function getContentLienHe()
    {
        $sql = "SELECT * FROM khac WHERE id='lienhe'";
        return  $this->query($sql);
    }
    function updatecontentLienHe($content)
    {
        $sql = "SELECT id FROM khac WHERE id='lienhe'";
        if ($this->query($sql)->num_rows > 0) {
            $sql = "UPDATE khac SET content='{$content}' WHERE id='lienhe'";
            if ($this->query($sql) === TRUE) {
                return TRUE;
            }
            return FALSE;
        }
    }
    function insertLienHe($id, $name, $contact, $address, $content)
    {
        $sql = "INSERT INTO lienhe (id, name,contact,address,content)VALUES ('{$id}', '{$name}','{$contact}', '{$address}','{$content}')";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function delLienHe($id)
    {
        $sql = "DELETE FROM lienhe WHERE id='{$id}'";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
}
