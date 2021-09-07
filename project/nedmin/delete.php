<?php

ob_start();
session_start();

include 'baglanti.php';

if (isset($_GET['delcourse'])) {
    if($_GET['delcourse'] == "ok"){

        $id = $_GET['id'];

        $del=$db->prepare("DELETE from courses where id=:id");
        $control=$del->execute(array(
            'id' => $id
            ));

        if ($control)
        {
            $_SESSION["status"] = "successful";
            $_SESSION["status_code"] = "Success";
            Header("Location:../courses");
        }
        else
        {
            $_SESSION["status"] = "Oops! Something Has Gone Wrong!.. ";
            $_SESSION["status_code"] = "Error";
            Header("Location:../courses");
        }
    }
}
if (isset($_GET['delstudent'])) {
    if($_GET['delstudent'] == "ok"){

        $id = $_GET['id'];
        $del=$db->prepare("DELETE from user where id=:id");
        $control=$del->execute(array(
            'id' => $id
            ));

        if ($control)
        {
            $_SESSION["status"] = "successful.";
            $_SESSION["status_code"] = "Success";
            Header("Location:../students");
        }
        else
        {
            $_SESSION["status"] = "Opps!!..";
            $_SESSION["status_code"] = "Error";
            Header("Location:../students");
        }
    }
}
delstudent

 ?>
