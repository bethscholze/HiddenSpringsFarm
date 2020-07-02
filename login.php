<?php
    session_start();
    require_once('connectvars.php');
    require_once('header.php');
    require_once('navmenu.php');


    // If the user isn't logged in, try to log them in
    if (!isset($_SESSION['user_id'])) {
        if (isset($_POST['submit'])) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Grab the user-entered log-in data
            $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
            
            //also need a password verify?
            //need to figure this out this is encrypting with blowfish, which adds a salt
            ////////////////////////////////////////////////////////////////////////////////////////////////////
            //this goes on sign up page $password_hash = password_hash($user_password, PASSWORD_BCRYPT);
         

            if (!empty($user_username) && !empty($user_password)) {
                // Look up the username and password in the database
                $query = "SELECT * FROM users WHERE username = '$user_username'";
                $data = mysqli_query($dbc, $query)
                        or die('error selecting user.');

                if (mysqli_num_rows($data) == 1) {
                    // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                    $row = mysqli_fetch_array($data);
                    $hash = $row['password'];
                    if (password_verify($user_password, $hash)) {
                        echo 'Password is valid!';
                        $_SESSION['user_id'] = $row['userId'];
                        $_SESSION['username'] = $row['username'];
                        setcookie('user_id', $row['customerId'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                        setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                        header('Location: ' . $home_url);
                        
                    } else {
                        echo 'Invalid password.';
                    }
                }
                else {
                    // The username/password are incorrect so set an error message
                    echo 'Sorry, you must enter a valid username and password to log in.';
                }
            }
            else {
                // The username/password weren't entered so set an error message
                echo 'Sorry, you must enter your username and password to log in.';
            }
        }
   

    // Insert the page header
    $page_title = 'Log In';
    require_once('header.php');

?>
<div class="forms">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Log In</legend>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" />
            </div>
        </fieldset>
        <input type="submit" value="Log In" name="submit" />
    </form>
    
</div>
<?php
    }
    else {
        // Confirm the successful log-in
        echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
        echo '<a href="index.php">Return to homepage</a>';
    }

    // Insert the page footer
    require_once('footer.php');
?>
