<?php
/**
 * Ajax module for adding users
 * User: Boris Janjetovic
 * Date: 09.05.2022
 * Time: 10:47
 */

include "include/config.php";
include INC."DbPDO.php";
$dbpdo = new DbPDO();

switch ($_POST['action']){

    case 'addUser':
        // Case for addinig new users

        $username   = addslashes($_POST['username']);
        $password   = addslashes($_POST['password']);
        $role       = addslashes($_POST['role']);
        $user_title = addslashes($_POST['user_title']);
        $name       = addslashes($_POST['name']);
        $surname    = addslashes($_POST['surname']);
        $email      = addslashes($_POST['email']);
        $address    = addslashes($_POST['address']);
        $postcode   = addslashes($_POST['postcode']);
        $city       = addslashes($_POST['city']);


        $dbpdo->insert("INSERT INTO users_tbl (`username`,`password`,`role`,`user_title`,`name`,`surname`,`email`,`address`,`postcode`,`city`) VALUES ('$username',MD5('$password'),'$role','$user_title','$name','$surname','$email','$address','$postcode','$city')");
        break;

    case 'editUser':
        //Case for editing users

        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $role       = $_POST['role'];
        $user_title = $_POST['user_title'];
        $name       = $_POST['name'];
        $surname    = $_POST['surname'];
        $email      = $_POST['email'];
        $address    = $_POST['address'];
        $postcode   = $_POST['postcode'];
        $city       = $_POST['city'];

        $dbpdo->insert("UPDATE users_tbl SET `username`='$username',`password`=MD5('$password'),`role`='$role',`user_title`='$user_title',`name`='$name',`surname`='$surname',`email`='$email',`address`='$address',`postcode`='$postcode',`city`='$city'");

        break;

    case 'getUser':
        //Case for editing users
        $id = $_POST['id'];
        $userData = $dbpdo->fetch("SELECT * FROM users_tbl WHERE id=$id");

        $result = json_encode($userData);

        echo $result;

        break;

    case 'deleteUser':
        //Case for deleting existing users
        $id   = $_POST['id'];

        $dbpdo->delete("DELETE FROM `users_tbl` WHERE `id` = $id");
        break;
    default:
        //Do nothing now
        break;
}