<?php
/**
* Created by PhpStorm.
* User: Boris Janjetovic
* Date: 09.05.2022
* Time: 09:53
*/

include_once("DbPDO.php");
class USERS extends DbPDO
{
    /**
     * Function to fetch all rows from datatable
     * @return array
     */
    public function getUsers(){
        $sql = "SELECT users_tbl.*, roles_tbl.name AS roleName, anrede_tbl.name AS user_title  
                    FROM users_tbl 
                    LEFT JOIN roles_tbl ON users_tbl.role = roles_tbl.id 
                    LEFT JOIN anrede_tbl ON users_tbl.user_title = anrede_tbl.id 
                    WHERE 1";
        $result = $this->fetch($sql);

        return $result;
    }

    /**
     * Get All user data for edit
     * @return array
     */
    public function getUserData($id){
        $sql = "SELECT * FROM users_tbl WHERE id=$id";
        $result = $this->fetch($sql);

        return $result;
    }

    /**
     * Insert new user to database
     * @param $_data
     * @return bool|string
     */
    public function insertUser($_data){

        $username   = addslashes($_data['username']);
        $password   = addslashes($_data['password']);
        $role       = addslashes($_data['role']);
        $user_title = addslashes($_data['user_title']);
        $name       = addslashes($_data['name']);
        $surname    = addslashes($_data['surname']);
        $email      = addslashes($_data['email']);
        $address    = addslashes($_data['address']);
        $postcode   = addslashes($_data['postcode']);
        $city       = addslashes($_data['city']);

        $sql = "INSERT INTO users_tbl (`username`,`password`,`role`,`user_title`,`name`,`surname`,`email`,`address`,`postcode`,`city`) 
                                VALUES ('$username',SHA2('$password', 256),'$role','$user_title','$name','$surname','$email','$address','$postcode','$city')";

        return $this->insert($sql);

    }

    /**
     * Delete user from database
     * @param $id
     * @return bool
     */
    public function deleteUser($id){
        $sql = "DELETE FROM `users_tbl` WHERE `id` = $id";
        return $this->delete($sql);
    }

    /**
     * Update existing user
     * @param $_data
     * @return bool
     */
    public function updateUser($_data){
        $id         = $_data['id'];

        $username   = $_data['username'];
        $password   = $_data['password'];
        $role       = $_data['role'];
        $user_title = $_data['user_title'];
        $name       = $_data['name'];
        $surname    = $_data['surname'];
        $email      = $_data['email'];
        $address    = $_data['address'];
        $postcode   = $_data['postcode'];
        $city       = $_data['city'];

        $sql = "UPDATE users_tbl SET 
                     `username`='$username',
                     `password`=SHA2('$password', 256),
                     `role`='$role',
                     `user_title`='$user_title',
                     `name`='$name',
                     `surname`='$surname',
                     `email`='$email',
                     `address`='$address',
                     `postcode`='$postcode',
                     `city`='$city' 
                WHERE users_tbl.id = '{$id}'";

        return $this->update($sql);
    }

}