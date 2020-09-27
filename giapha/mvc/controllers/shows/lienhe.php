<?php
class lienhe extends Controller
{
    function __construct()
    {
        if (isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['content'])) {
            $id = uniqid();
            $name = $_POST['name'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $content = $_POST['content'];

            if ((new M_LienHe)->insertLienHe($id, $name, $contact, $address, $content)) {
                header("Location: " . $_SERVER["URL_SERVER"] . "/lienhe");
            } else {
                echo "Không thể gửi liên hệ";
            }
        } else {
            $this->view("template", array_merge(
                [
                    "template" => "lienhe",
                    "resultNews" => mysqli_fetch_assoc((new M_LienHe)->getContentLienHe()),
                ],
                (new TatCa)->tatCa()
            ));
        }
    }
}
