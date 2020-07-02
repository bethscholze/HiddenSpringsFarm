<?php
    require_once('authorize.php');
    require_once('connectvars.php');
    $page_title ="Admin";
    require_once('header.php');
    require_once('navmenuadmin.php');
    require_once('Product.php');
    require_once('HowToGuide.php');
    $product = new Product();
    $howTo = new HowToGuide();

//grab the id for the comment
if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
        $query = "select * from user_comments WHERE commentId = $id";
        $result =  mysqli_query($dbc, $query)
                or die('Error querying the database.');
        
        while($row = mysqli_fetch_array($result)) {
            $comment = $row['comment'];
            $username = $row['username'];
        }
        
        mysqli_close($dbc);
        
    }
    //capture the info put into the form
    else if (isset($_POST['id'])){
        $id = $_POST['id'];
        
    }
    else {
        echo '<p class="error">Sorry, no comment was selected for approval.</p>';
    }
    
    //change the data in the database to approved or delete the comment
    if (isset($_POST['submit'])) {
        if($_POST['confirm'] == 'Yes') {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
            $query = "UPDATE user_comments SET approved = 'yes' WHERE commentId = $id";
            mysqli_query($dbc, $query)
                    or die('Error querying the database.');
            mysqli_close($dbc);
            
            echo '<p>The comment was approved.';
            
        }
        if($_POST['confirm'] == 'No') {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
            $query = "Delete from user_comments WHERE commentId = $id";
            mysqli_query($dbc, $query)
                    or die('Error querying the database.');
            mysqli_close($dbc);
            
            echo '<p>The comment was removed.';
            
        }
        
    }
    //outputting the form if there is data to put into it
    else if (isset($id) ) {
        echo '<p>Do you want to approve or remove the comment?</p>';
        echo '<p>Name: ' . $username . '<br />';
        echo 'Comment: ' . $comment . '<br />';
       
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="radio" name="confirm" value="Yes" checked="checked"/>Approve
            <input type="radio" name="confirm" value="No"  />Remove<br />
            <input type="submit" name="submit" value="Submit" />
        <?php
            echo '<input type="hidden" name="id" value="' . $id . '" />';
            echo '<input type="hidden" name="comment" value="' . $comment . '" />';
            echo '<input type="hidden" name="username" value="' . $username . '" />';
            echo '</form>';
            
        
    }
    else {
        echo '<p>No comment selected.</p>';
    }
    echo '<p><a href="admin.php">&lt;&lt; Back to the admin page</a></p>';
    
    ?>