<?php
/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 10-Dec-20
 * Time: 2:14 PM
 */
include_once("DbParams.php");

class DbPDO extends DbParams
{

    /**
     * @param $query
     * @return array
     */
    public function fetch($query){
        $rows = [];

        try {
            // make PREPARED statement
            $statement = $this->getConnection()->prepare($query);

            // execute query
            $statement->execute();

            if($statement->rowCount() > 0){
                $rows = $statement->fetchAll();
            }

        } catch (PDOException $ex) {
            echo $ex->getMessage() . "<br>";
        }
        return $rows;
    }

    /**
     * @param $query
     * @return array|mixed
     */
    public function fetchOne($query){
        $row = [];

        try{

            // make PREPARED statement
            $statement = $this->getConnection()->prepare($query);

            // execute query
            $statement->execute();

            if($statement->rowCount() > 0){
                $row = $statement->fetch();
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage() . "<br>";
        }

        return $row;
    }


    /**
     * @param $query
     * @return int
     */
    public function count($query){
        $result = 0;

        try {

            // make PREPARED statement
            $statement = $this->getConnection()->prepare($query);

            // execute query
            $statement->execute();

            if($statement->rowCount() > 0){
                return $this->count($statement->fetchAll());
            }

        } catch (PDOException $ex) {
            echo$ex->getMessage() . "<br>";
        }

        return $result;
    }

    /**
     * @param $query
     * @return bool|string
     */
    public function insert($query){
        $result = false;

        try {
            // make PREPARED statement
            $statement = $this->getConnection()->prepare($query);

            // execute query
            $statement->execute();

            // check lastInsertId
            if($this->getConnection()->lastInsertId() > 0){
                return $this->getConnection()->lastInsertId();
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage() . "<br>";
        }

        return $result;
    }

    /**
     * @param $query
     * @return bool
     */
    public function delete($query){
        $result = false;

        try {
            // make PREPARED statement
            $statement = $this->getConnection()->prepare($query);

            // execute query
            $statement->execute();
            $result = true;

        } catch (PDOException $ex) {
            echo $ex->getMessage() . "<br>";
        }

        return $result;
    }

    /**
     * @param $query
     * @return bool
     */
    public function update($query){
        $result = false;

        try {
            // make PREPARED statement
            $statement = $this->getConnection()->prepare($query);

            // execute() function - Returns TRUE on success or FALSE on failure.
            $statement->execute();
            $result = true;

        } catch (PDOException $ex) {
            echo $ex->getMessage() . "<br>";
        }

        return $result;
    }

}