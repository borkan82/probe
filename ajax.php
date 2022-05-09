<?php
/**
 * Ajax module for adding users
 * User: Boris Janjetovic
 * Date: 09.05.2022
 * Time: 10:47
 */

include "include/config.php";
//include INC."DbPDO.php";
include "class/class.Users.php";

$_users = new USERS();
//$dbpdo = new DbPDO();

switch ($_POST['action']){

    case 'addUser':
        // Case for addinig new users
        $_users->insertUser($_POST);
        break;

    case 'editUser':
        //Case for editing users
        $_users->updateUser($_POST);
        break;

    case 'getUser':
        //Case for editing users
        $id = $_POST['id'];
        $userData = $_users->getUserData($id);

        $result = json_encode($userData);
        echo $result;

        break;

    case 'deleteUser':
        //Case for deleting existing users
        $id   = $_POST['id'];
        $userData = $_users->deleteUser($id);
        break;
    default:
        //Do nothing now
        break;
}