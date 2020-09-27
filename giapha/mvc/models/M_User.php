<?php
class M_User extends DB
{
    function getAllUser()
    {
        $sql = "SELECT * FROM user";
        return $this->query($sql);
    }
    function dangKy($id, $username, $password, $name, $phone, $address)
    {
        $password = md5($password);
        $sql = "INSERT INTO user (id, username, password,name,phone,address,permission) VALUES ('{$id}', '{$username}', '{$password}','{$name}','{$phone}','{$address}',2)";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function doiMatKhau($username, $password)
    {
        $password = md5($password);
        $sql = "UPDATE user SET password='{$password}'WHERE username='{$username}'";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
    function dangNhap($username, $password)
    {
        $password = md5($password);
        $sql = "SELECT * FROM user WHERE username='{$username}' and password ='{$password}'";
        $result = $this->query($sql);
        if ($result->num_rows > 0) {
            $user = mysqli_fetch_assoc($result);
            $id = $user['id'];
            $token = md5(uniqid());
            $sql = "UPDATE user SET authen='{$token}',timelogin=NOW() WHERE id='{$id}'";
            if ($this->query($sql)) {
                setcookie("authen", $token, time() + (86400 * 30), "/"); // 86400 = 1 day
                $_SESSION["permission"] = $user['permission'];
                $_SESSION["id_user"] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return TRUE;
            }
            return FALSE;
        }
        return FALSE;
    }
    function getInfoCookieAuthen()
    {
        $authen = $_COOKIE["authen"];
        $sql = "SELECT * FROM user WHERE authen='{$authen}'";
        return mysqli_fetch_assoc($this->query($sql));
    }
    function getPermission()
    {
        if ($_COOKIE["authen"]) {
            $authen = $_COOKIE["authen"];
            $sql = "SELECT * FROM user WHERE authen='{$authen}'";
            return mysqli_fetch_assoc($this->query($sql))['permission'];
        }
    }
    function getUserNameFromId($id)
    {
        $sql = "SELECT * FROM user WHERE id='{$id}'";
        return mysqli_fetch_assoc($this->query($sql))['username'];
    }
    function updatePermission($id, $permission)
    {
        $sql = "UPDATE user SET permission='{$permission}' WHERE id='{$id}'";
        if ($this->query($sql)) {
            return TRUE;
        }
        return FALSE;
    }
}
