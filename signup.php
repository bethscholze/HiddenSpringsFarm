<?php
    require_once('connectvars.php');
    require_once('header.php');
    require_once('navmenu.php');

    // Start the session
    session_start();
    
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if (empty($_SESSION['user_id'])) {
        if (isset($_POST['signUp'])) {

            // Grab the user-entered log-in data
            $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
            $user_password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
            $firstName = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
            $lastName = mysqli_real_escape_string($dbc, trim($_POST['lastName']));
            //also need a password verify?
            //need to figure this out this is encrypting with blowfish, which adds a salt
            ////////////////////////////////////////////////////////////////////////////////////////////////////
            $password_hash = password_hash($user_password, PASSWORD_BCRYPT);
            $password_hash;

            if (!empty($user_username) && !empty($user_password) && $user_password == $user_password2 ) {
                // Look up the username and password in the database
                $query = "SELECT * FROM users WHERE username = '$user_username'";
                $data = mysqli_query($dbc, $query);
                if (mysqli_num_rows($data) == 0) {
                    // The username is unique, so insert the data into the database
                    $query = "insert into users (username, password, first_name, last_name) values ('$user_username', '$password_hash', '$firstName', '$lastName')";
                    mysqli_query($dbc, $query)
                            or die("error inserting the new user.");
    
                    // Confirm success with the user
                    echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
                    mysqli_close($dbc);
                    exit();
                }
                else {
                    // An account already exists for this username, so display an error message
                    echo '<p class="error">An account already exists for this username. Please use a different username.</p>';
                    $username = "";
                }
            }
            else {
                echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
            }
        }

    mysqli_close($dbc);
    
    } else {
        echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
        echo '<a href="index.php">Return to homepage</a>';
    }
                
                
?>
<div class="forms">
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Sign Up</legend>
            <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName"/>
            </div>
            <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName"/>
            </div>
            <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" />
            </div>
            <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" />
            </div>
            <div class="form-group">
            <label for="password2">Confirm Password:</label>
            <input type="password" name="password2" />
            </div>
        </fieldset>
        <input type="submit" value="Sign Up" name="signUp" />
    </form>
    </div>
    
<?php
    require_once('footer.php');
?>