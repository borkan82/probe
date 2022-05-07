<!DOCTYPE html>

<?php
include "includes/config.php";
include INC."DbPDO.php";
$dbpdo = new DbPDO();

$sql = "SELECT * FROM states WHERE 1";
$states = $dbpdo->fetchOne($sql);

var_dump($states);

?>
<html lang="en">

<head>
    <title>Default page</title>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="Default page" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<h1>Nothing In</h1>
</body>

</html>