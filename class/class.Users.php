<?php
/**
* Created by PhpStorm.
* User: Boris Janjetovic
* Date: 09.05.2022
* Time: 09:53
*/

include "DbPDO.php";
class USERS extends DbPDO
{

    /**
     * Function to fetch all rows from datatable
     * @return array
     */
    public function getUsers(){
        $sql = "SELECT * FROM users_tbl WHERE 1";
        $result = $this->fetch($sql);

        return $result;
    }

}