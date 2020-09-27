<?php
class App
{
    protected $controller = "trangchu";
    function __construct()
    {
        $arr = $this->urlProcess();
        $this->controller = $arr[0];
        if ($arr[0] === "quanly") {
            $this->controller = (!empty($arr[1]) ? $arr[1] : 'None');
            if (file_exists("./mvc/controllers/managements/" . $this->controller . ".php") && isset($arr[1])) {
                if (isset($_COOKIE["authen"])) {
                    $user = (new M_User)->getInfoCookieAuthen();
                    if ($user['username']) {
                        if (!isset($_SESSION['permission']) || !isset($_SESSION['id_user'])) {
                            $_SESSION['permission'] = (new M_User)->getPermission();
                            $_SESSION['id_user'] = $user['id'];
                            $_SESSION['username'] = $user['username'];
                        }
                        $this->controller = (new Permission)->direction($this->controller);
                        require_once("./mvc/controllers/managements/" . $this->controller . ".php");
                        $this->controller = new $this->controller;
                    } else {
                        header("Location:" . $_SERVER["URL_SERVER"] . "/dangnhap");
                    }
                } else {
                    header("Location:" . $_SERVER["URL_SERVER"] . "/dangnhap");
                }
            } else if (!isset($arr[1])) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/quanly/tintuc");
            } else {
                header("Location:" . $_SERVER["URL_SERVER"] . "/page404");
            }
        } else {
            if (file_exists("./mvc/controllers/shows/" . $arr[0] . ".php")) {
                require_once("./mvc/controllers/shows/" . $arr[0] . ".php");
                $this->controller = new $this->controller;
            } else {
                header("Location:" . $_SERVER["URL_SERVER"] . "/page404");
            }
        }
    }
    function urlProcess()
    {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(trim($_GET['url'], "/")));
        } else {
            return array($this->controller);
        }
    }
}
