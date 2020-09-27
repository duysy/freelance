<?php
class M_CayGiaPha extends DB
{
    function getCayGiaPha($id)
    {
        $sql = "SELECT * from caygiapha where id = '{$id}'";
        return $this->query($sql);
    }
    function getAllCayGiaPha()
    {
        $sql = "SELECT * from caygiapha ";
        return $this->query($sql);
    }
    function getIdFromLowergrade($id)
    {
        $sql = "SELECT * FROM caygiapha WHERE lowergrade LIKE '%{$id}%';";
        if ($this->query($sql)->num_rows > 0) {
            return mysqli_fetch_assoc($this->query($sql))['id'];
        }
        return false;
    }
    function insertCayGiaPha($id, $name, $contact, $address, $introduce)
    {
        $id_user = $_SESSION['id_user'];
        $sql = " INSERT INTO caygiapha (id,name,contact,address,introduce,id_user) VALUES ('{$id}', '{$name}','{$contact}','{$address}','{$introduce}','{$id_user}');";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function delCayGiaPha($id)
    {  // Xóa thành viên
        $sql = "DELETE FROM caygiapha WHERE id='{$id}'";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function deIdGiaPhainLowergrade($id, $xoa_id)
    {
        // Xoa id nhanh duoi trong Lowergrade
        $sql = "SELECT * from caygiapha where id = '{$id}'";
        $lowergrade = mysqli_fetch_assoc($this->query($sql))['lowergrade'];
        $array = explode("-", $lowergrade);
        foreach (array_keys($array, $xoa_id) as $key) {
            unset($array[$key]);
        }
        $string = '';
        foreach ($array as $key) {
            $string = $string . $key . '-';
        }
        $lowergrade = substr($string, 0, strlen($string) - 1);
        if ($this->updateLowergrade($id, $lowergrade)) {
            return TRUE;
        }
        return FALSE;
    }
    function updateCayGiaPha($id, $name, $contact, $address, $introduce)
    {
        $sql = "UPDATE caygiapha SET name='{$name}',contact='{$contact}',address='{$address}',introduce='{$introduce}' WHERE id='{$id}'";
        return $this->query($sql);
    }
    function updateLowergrade($id, $lowergrade)
    {
        $sql = "UPDATE caygiapha SET lowergrade='{$lowergrade}' WHERE id='{$id}'";
        return $this->query($sql);
    }
    function drawTree($root, $kind, $doi)
    {
        $data =  mysqli_fetch_assoc($this->getCayGiaPha($root));
        $row = $data['lowergrade'];
        if ($row === "" || $row === NULL) {
            $chirl = [];
        } else  $chirl = explode("-", $row);
        if (count($chirl) < 1) {
            return  $root;
        } else {
            $treeELe = "";
            for ($i = 0; $i < count($chirl); $i++) {
                $id = $chirl[$i];
                $row = mysqli_fetch_assoc($this->getCayGiaPha($id));
                $name = $row['name'];
                if ($kind === "treeflex") {
                    if ($row['lowergrade'] === "" || $row['lowergrade'] === NULL) {
                        $treeELe = $treeELe . "<li><span id='{$id}' class = 'action'><span class='badge badge-light'>({$doi})</span>{$name}</span></li>";
                    } else {
                        $treeELe = $treeELe . "<li><span id='{$id}' class = 'action'><span class='badge badge-light'>({$doi})</span>{$name}</span><ul>{$this->drawTree($chirl[$i],$kind,$doi + 1)}</ul></li>";
                    }
                } else if ($kind === "treelist") {
                    if ($row['lowergrade'] === "" || $row['lowergrade'] === NULL) {
                        $treeELe = $treeELe . "<li>" .  "<span class='stylelist'><span class='badge badge-light'>({$doi})</span>{$name}<a href='{$_SERVER['URL_SERVER']}/chitietthongtinthanhvien&id={$id}'>Chi Tiết</a></span></li>";
                    } else {
                        $treeELe = $treeELe . "<li><span class='caret stylelist'><span class='badge badge-light'>({$doi})</span>{$name}<a href='{$_SERVER['URL_SERVER']}/chitietthongtinthanhvien&id={$id}'>Chi Tiết</a></span><ul class='nested'>" . $this->drawTree($chirl[$i], $kind, $doi + 1) . "</ul></li>";
                    }
                }
            }
            return  $treeELe;
        }
    }
}
