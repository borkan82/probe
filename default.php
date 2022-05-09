<?php
include "include/config.php";
include "class/class.Users.php";

$_users     = new USERS();
$allUsers   = $_users->getUsers();
?>
<!DOCTYPE html>
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
<style>
    .container {
        width: 1600px!important;
    }
</style>
<body>

<div class="container">
    <h2>Probearbeit</h2>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createUserModal">Benutzer hinzufügen</button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Benutzername</th>
            <th scope="col">Benutzergruppe</th>
            <th scope="col">Anrede</th>
            <th scope="col">Vorname</th>
            <th scope="col">Nachname</th>
            <th scope="col">Email</th>
            <th scope="col">Straße</th>
            <th scope="col">PLZ</th>
            <th scope="col">Ort</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($allUsers AS $row){
            echo "<tr>";
                echo '<th scope="row">'.$row['id'].'</th>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['roleName'].'</td>';
                echo '<td>'.$row['user_title'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo '<td>'.$row['surname'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['address'].'</td>';
                echo '<td>'.$row['postcode'].'</td>';
                echo '<td>'.$row['city'].'</td>';
                echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUserModal" onclick="getUserData('.$row['id'].')">Bearbeiten</button> <button type="button" class="btn btn-danger" onclick="deleteUser('.$row['id'].')">Löschen</button></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <div class="modal fade" id="createUserModal" tabindex="-2" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Create New user</strong></h5>
                    <input type="hidden" id="originUserId" value="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 420px;">
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="username" value="" placeholder="Username">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="password" id="password" value="" placeholder="Passwort">
                    <div style="clear:both;"></div>
                    <select class="form-control" id="role" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;">
                        <option value="1">Admin</option>
                        <option value="2">Redakteur</option>
                        <option value="3">Gast</option>
                    </select>
                    <div style="clear:both;"></div>
                    <select class="form-control" id="user_title" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;">
                        <option value="1">Herr</option>
                        <option value="2">Frau</option>
                        <option value="3">Keine</option>
                    </select>
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="name" value="" placeholder="Vorname">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="surname" value="" placeholder="Nachname">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="email" value="" placeholder="Email">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="address" value="" placeholder="Straße">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="postcode" value="" placeholder="PLZ">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="city" value="" placeholder="Ort">
                </div>

                <div class="modal-footer">
                    <button type="button" id="addUserButton" class="btn btn-success" style="float: left;" onclick="addUser();"  >Hinzufügen</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editUserModal" tabindex="-2" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width: 400px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Edit User</strong></h5>
                    <input type="hidden" id="originUserId" value="">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 420px;">
                    <input type="hidden" id="user_id" value="">
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="username_edit" value="">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="password_edit" type="password" value="">
                    <div style="clear:both;"></div>
                    <select class="form-control" id="role_edit" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;">
                        <option value="1">Admin</option>
                        <option value="2">Redakteur</option>
                        <option value="3">Gast</option>
                    </select>
                    <div style="clear:both;"></div>
                    <select class="form-control" id="user_title_edit" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;">
                        <option value="1">Herr</option>
                        <option value="2">Frau</option>
                        <option value="3">Keine</option>
                    </select>
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="name_edit" value="">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="surname_edit" value="">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="email_edit" value="">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="address_edit" value="">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="postcode_edit" value="">
                    <div style="clear:both;"></div>
                    <input class="form-control" style="float: left;margin-right:3px;width:80%;margin-bottom: 5px;" type="text" id="city_edit" value="">
                </div>

                <div class="modal-footer">
                    <button type="button" id="addUserButton" class="btn btn-success" style="float: left;" onclick="editUser();" >Bearbeiten</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="_js/probe.js"></script>
</body>

</html>