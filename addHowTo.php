<?php
require_once('authorize.php');
require_once('appvars.php');
require_once('connectvars.php');
require_once('header.php');
require_once('navmenuadmin.php');
    //catch the form data and sterilize it
    if (isset($_POST['submit'])){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
        $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
        $type = mysqli_real_escape_string($dbc, trim($_POST['type']));
        $date = mysqli_real_escape_string($dbc, trim($_POST['date']));
        $guide = mysqli_real_escape_string($dbc, trim($_POST['guide']));
        $author = mysqli_real_escape_string($dbc, trim($_POST['author']));
       
        //insert the how to into the database
        if (!empty($title) && !empty($type) && !empty($date) && !empty($guide) && !empty($author)) {
              
            $query = "insert into how_to_guides (title, date, category, content, author) values ('$title', '$date', '$type', '$guide', '$author')";
            mysqli_query($dbc, $query)
                    or die ('Error querying the database.');

        
            echo 'Your Guide was added!';
            mysqli_close($dbc);
        }
        //form not completed          
        else {
          echo '<p class="error">Please enter all of the information to add your high score.</p>';
        }
    }
    //show form if not submitted
    else {
       ?>
    <div class="row">
    <form class="form mx-auto" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
       
        <legend>Add How To Guide</legend>
        <div class="form-group">
            <label for="title">Guide Title:</label>
            <input class="form-control" type="text" id="title" name="title" />
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input class="form-control" type="date" id="date" name="date" />
        </div>
        <div class="form-group">
            <label for="type">Category:</label>
            <select class="form-control" id="type" name="type">
                <option value="weaving">weaving</option>
                <option value="spinning" >Spinning</option>
                <option value="knitting">Knitting</option>
                <option value="crocheting">Crocheting</option>
                <option value="yarn">Yarn</option>
            </select>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input class="form-control" type="text" id="author" name="author" />
        </div>
        <div class="form-group">
            <label>How to article:</label>
            <textarea class="form-control" id="guide" name="guide" column="20" rows="20">
            </textarea>
        </div>
        
        <input type="submit" name="submit" value="Save" />
     </form>
     </div>



    <?php 
    }

?>