/**
 * Function for adding new users
 * @returns {boolean}
 */
function addUser () {
    var dataSend        = {};
    dataSend['action']  = "addUser";

    /**
     * Get variables for all user data
     */

    dataSend['username']    = $('#username').val();
    dataSend['password']    = $('#password').val();
    dataSend['role']        = $('#role').val();
    dataSend['user_title']  = $('#user_title').val();
    dataSend['name']        = $('#name').val();
    dataSend['surname']     = $('#surname').val();
    dataSend['email']       = $('#email').val();
    dataSend['address']     = $('#address').val();
    dataSend['postcode']    = $('#postcode').val();
    dataSend['city']        = $('#city').val();

    $.ajax
    ({
        type: "POST",
        url: "ajax.php",
        data: dataSend,
        cache: false,
        success: function(data){
            alert("Der Benutzer wurde der Datenbank hinzugefügt!");
            location.reload();
            $("#createUserModal").hide();
            $('.modal-backdrop').hide();
        }
    });
    return false;
}

/**
 * Function for user Edit
 * @returns {boolean}
 */
function editUser () {
    var dataSend        = {};
    dataSend['action']  = "editUser";
    /**
     * Get variables for all user data
     */

    dataSend['id']          = $('#user_id').val();
    dataSend['username']    = $('#username_edit').val();
    dataSend['password']    = $('#password_edit').val();
    dataSend['role']        = $('#role_edit').val();
    dataSend['user_title']  = $('#user_title_edit').val();
    dataSend['name']        = $('#name_edit').val();
    dataSend['surname']     = $('#surname_edit').val();
    dataSend['email']       = $('#email_edit').val();
    dataSend['address']     = $('#address_edit').val();
    dataSend['postcode']    = $('#postcode_edit').val();
    dataSend['city']        = $('#city_edit').val();

    $.ajax
    ({
        type: "POST",
        url: "ajax.php",
        data: dataSend,
        cache: false,
        success: function(data){
            alert("Benutzerdaten wurden geändert!");
            location.reload();
            $("#editUserModal").hide();
            $('.modal-backdrop').hide();

        }
    });
    return false;
}

/**
 * Function for getting user data for edit
 * @param user_id
 * @returns {boolean}
 */
function getUserData(user_id){
    var dataSend        = {};
    dataSend['action']  = "getUser";
    dataSend['id']  = user_id;

    $.ajax
    ({
        type: "POST",
        url: "ajax.php",
        data: dataSend,
        dataType: 'json',
        cache: false,
        success: function(data){

            if(data.length > 0){
                $('#user_id').val(data[0].id);
                $('#username_edit').val(data[0].username);
                $('#role_edit').val(data[0].role);
                $('#user_title_edit').val(data[0].user_title);
                $('#name_edit').val(data[0].name);
                $('#surname_edit').val(data[0].surname);
                $('#email_edit').val(data[0].email);
                $('#address_edit').val(data[0].address);
                $('#postcode_edit').val(data[0].postcode);
                $('#city_edit').val(data[0].city);
            }
        }
    });
    return false;
}

/**
 * Function for deleting user data
 * @param user_id
 * @returns {boolean}
 */
function deleteUser(user_id){
    var dataSend        = {};
    dataSend['action']  = "deleteUser";
    dataSend['id']  = user_id;

    $.ajax
    ({
        type: "POST",
        url: "ajax.php",
        data: dataSend,
        cache: false,
        success: function(data){
            alert('Benutzer gelöscht!');
            location.reload();
        }
    });
    return false;
}