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


if(isset($_GET['howId'])) {
        $type = "guide";
        $id = $_GET['howId'];
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
        $query = "select * from how_to_guides WHERE id = $id";
        $result =  mysqli_query($dbc, $query)
                or die('Error querying the database.');
        
        while($row = mysqli_fetch_array($result)) {
            $name = $row['title'];
            $description = $row['content'];
            
        }
        
        mysqli_close($dbc);
        
    }
    else if(isset($_GET['productId'])) {
        $type = "product";
        $id = $_GET['productId'];
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
        $query = "select * from products WHERE id = $id";
        $result =  mysqli_query($dbc, $query)
                or die('Error querying the database.');
        
        while($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $description = $row['description'];
        }
        
        mysqli_close($dbc);
        
    }
    //capture the info put into the form
    else if (isset($_POST['id'])){
        $id = $_POST['id'];
        $type = $_POST['type'];
        
    }
    else {
        echo '<p class="error">Sorry, no product or how to  was selected for removal.</p>';
    }
    
    //now go through form submitted
    //processing data
    //changing the score to approved in the database
    if (isset($_POST['submit'])) {
        if($_POST['confirm'] == 'Yes' && $type == 'guide') {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
            $query = "update how_to_guides set visible = 'no' WHERE id = $id";
            mysqli_query($dbc, $query)
                    or die('Error querying the database. Here');
            mysqli_close($dbc);
            
            echo '<p>The ' . $type . ' was removed.';
            
        }
        else if($_POST['confirm'] == 'Yes' && $type == 'product') {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
            $query = "update products set avaliable = 'no' WHERE id = $id";
            mysqli_query($dbc, $query)
                    or die('Error querying the database.');
            mysqli_close($dbc);
            
            echo '<p>The ' . $type . ' was marked as unavailable.';
            
        }
        else {
            echo 'Not Removed!';
        }
        
    }
    //outputting the form if there is data to put into it
    else if (isset($id) ) {
        echo '<p>Do you want to hide/archive the ' . $type . '?</p>';
        echo '<p>Name: ' . $name . '<br />';
        echo 'Description: ' . $description . '<br />';
       
        ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="radio" name="confirm" value="Yes" />Yes
            <input type="radio" name="confirm" value="No" checked="checked"/>No<br />
            <input type="submit" name="submit" value="Submit" />
        <?php
            echo '<input type="hidden" name="id" value="' . $id . '" />';
            echo '<input type="hidden" name="name" value="' . $name . '" />';
            echo '<input type="hidden" name="description" value="' . $description . '" />';
            echo '<input type="hidden" name="type" value="' . $type . '" />';
            echo '</form>';
            
        
    }
    echo '<p><a href="admin.php">&lt;&lt; Back to the admin page</a></p>';
    
    ?>