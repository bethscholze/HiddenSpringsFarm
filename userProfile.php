<?php
require_once('startsession.php');
$page_title = "Edit Your Profile";
require_once('header.php');
require_once('navmenu.php');
require_once('connectvars.php');
require_once('appvars.php');


//show current data in database for logged in user
if(!empty($_SESSION['user_id'])){
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('Error connecting to the database.');
    $query = "Select * from users where userId = " . $_SESSION['user_id'] . "";
    $result = mysqli_query($dbc, $query)
            or die('Error querying the database.');
    $row = mysqli_fetch_array($result);
    
    if(!empty($row)){
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
       
        
    }
    mysqli_close($dbc);
}

else {
    
    $login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
    header('Location: ' . $login_url);
    echo '<p class="alert alert-warning" role="alert">You must be logged in to edit your profile.</p>';
}


//insert edited data into the database
if(isset($_POST['submit'])) {
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('Error connecting to the database.');
    //sanitize user input
    $firstname = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    $lastname = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    
    
    if(!empty($firstname) && !empty($lastname) && !empty($_SESSION['user_id'])){
        
        //write the right query
        $query = "update users set first_name = '" . $firstname . "', last_name = '" . $lastname . "' where id = '" . $_SESSION['user_id'] . "'";
        
        $result = mysqli_query($dbc, $query)
                or die('Error querying the database.');
                
        echo '<p class="alert alert-success" role="alert">User data updated!</p>';
        
    }
    mysqli_close($dbc);
        
}
    

?>
<div class="container">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h2>Personal Information</h2>
                
                <fieldset>
                    <div class="form-group">
                    <label for="firstnameId">First Name</label>
                    <input type="text" name="firstname" id="firstnameId" value="<?php if(!empty($firstname)) echo $firstname;?>" />
                    </div>
                    <div class="form-group">
                    <label for="lastnameId">Last Name</label>
                    <input type="text" name="lastname" id="lastnameId" value="<?php if(!empty($lastname)) echo $lastname;?>" />
                    </div>
                    
                    <input type="submit" name="submit" value="Save Profile">
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php

    require_once('footer.php')
?>
