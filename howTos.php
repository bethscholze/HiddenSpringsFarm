
<?php
//blog posts of how tos
//allows comments by users at the bottom
    session_start();
    require_once('HowToGuide.php');
    require_once('connectvars.php');
    $page_title ="How To Guides";
    require_once('header.php');
    require_once('navmenu.php');
    
    $guide = new HowToGuide();
    $title = '';
    //check for comment form submission
    if(isset($_POST['submit'])){
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('Error connecting to the database.');
        $comment = mysqli_real_escape_string($dbc, trim($_POST['comment']));
        $date = date("F j, Y, g:i a");
        $today = mysqli_real_escape_string($dbc, trim($date));
        $id = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        $title = $_POST['title'];
        //insert the comment to the database, with approved set to no
        if(!empty($comment)) {
            $query = "insert into user_comments (userId, username, comment, date, howTo) values ('$id', '$username', '$comment', '$today', '$title')";
            mysqli_query($dbc, $query)
                    or die ("error inserting comment.");
        }
        else {
            echo '<p>Comment cannot be blank</p>';
        }
        
        mysqli_close($dbc);
    }
    
    ?>
   
    <section>
        <div class="row mb-5">
            <aside class="col-sm-12 col-md-2 aside">
                <h2>Browse Categories</h2>
                <ul>
                    <li><a href="howTos.php?howToId=6">All</a></li>
                    <li><a href="howTos.php?howToId=1">Knitting</a></li>
                    <li><a href="howTos.php?howToId=2">Crocheting</a></li>
                    <li><a href="howTos.php?howToId=3">Spinning</a></li>
                    <li><a href="howTos.php?howToId=4">Weaving</a></li>
                    <li><a href="howTos.php?howToId=5">Yarn</a></li>
                </ul>
    
            <?php
            
            //check if they choose a category of how tos
            if(isset($_GET['howToId'])) {
                //display all the products to the page
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
                    
                $query = "Select * from how_to_guides";
            
                $sort = $_GET['howToId'];
                
                switch ($sort) {
                   
                
                case 1: 
                    $query .= " where category='knitting' and visible = 'yes'";
                    break;
                
                case 2: 
                    $query .= " where category='crocheting' and visible = 'yes'";
                    break;
              
                case 3: 
                    $query .= " where category='spinning' and visible = 'yes'";
                    break;
                
                case 4: 
                    $query .= " where category='weaving' and visible = 'yes'";
                    break;
                
                case 5: 
                    $query .= " where category='yarn' and visible = 'yes'";
                    break;
                default:
                     $query = "Select * from how_to_guides where visible = 'yes'";
                }
                
                 ?>
                
                </aside>
                <article id="howTo" class="col-sm-12 col-md-8">
                <?php
                
                
                $result = mysqli_query($dbc, $query)
                        or die("Error Selecting guides.");
                
                //diplay selected how to category    
                while($row = mysqli_fetch_array($result)) {
                    ?>
                    <h2><a href="howTos.php?titleId=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
                    
                    <p><?php echo substr($row['content'], 0, 100) ?></p>
                    
                    <p>Author: <?php echo $row['author'] ?>, Date: <?php echo 
                            $row['date'] ?>, Category: <?php echo $row['category'] ?></p>
                    <p style="display:none"><?php echo $title ?></p>
                    
                    <?php
                } 
            } 
            
            //check if they choose a title of an article once they select a category
            else if(isset($_GET['titleId'])) {
                $id = $_GET['titleId'];
                    
                $query = "Select * from how_to_guides where id='$id' and visible = 'yes' limit 1";
                
                ?>
                
                </aside>
                <article id="howTo" class="col-sm-12 col-md-8">
                    <?php
                   $title = $guide->displayAllGuides($query);
                //display the full article that they selected    
                
               
            }
            
            else {
                // //onpage load display the most recent how to to the page
                
                ?>
                
                </aside>
                <article id="howTo" class="col-sm-12 col-md-8">
                    <?php
                    $query = "Select * from how_to_guides where visible = 'yes' order by date desc limit 1";
                    $title = $guide->displayAllGuides($query);
                 
            }
             
                
            ?>
            </article>
            <aside class="col-sm-12 col-md-2 aside">
                <h2>Recent Articles</h2>
                <ul>
                <?php
                //display the 10 most recent articles with link to their pages
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
                    
                $query = "Select * from how_to_guides where visible = 'yes' order by date limit 10";
               
                $result = mysqli_query($dbc, $query)
                        or die("Error Selecting guides.");
                        
                while($row = mysqli_fetch_array($result)) {
                    ?>
                   <li><a href="howTos.php?titleId=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></li>
                    
                    <?php
                }
                ?>
                </ul>
            </aside>
        </div>
   
        <div class="row mt-5">
            
           
            <div class="mx-auto">
            
                
                <?php
                //user is logged in-display the comment form
                if(isset($_SESSION['username'])) {
                    ?>
                
                    <form class="forms" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <h3>Add a comment</h3>
                        <textarea name="comment" id="comment" rows="4" cols="50">Comments must be approved by a moderator before they appear on the page.
                        </textarea><br /> 
                        <input type="hidden" name="title" value="<?php echo $title ?>" />
                        <input type="submit" name="submit" value="Post comment" />
                    </form>
                    <br />
                    <br />
                
                <?php
                }
                else {
                    echo '<p><a href="login.php">Login</a> to post a comment</p>';
                }
                ?>
                
            </div>
            
            
        </div>
         <div class="row">
            
           
            <div class="mx-auto">
                <h2>User Comments</h2>
                
                    
                    <?php
                    
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                            or die('Error connecting to the database.');
                    $query = "Select * from user_comments where approved='yes' and howTo='$title' order by date desc";
                    $result = mysqli_query($dbc, $query)
                            or die ('Error querying the user comments.');
                     while($row = mysqli_fetch_array($result)) {
                        ?>
                        <table class="table table-striped" id="commentTable">
                        <tr><td class="text-left"><?php echo $row['username'] ?></td><td class="text-right"><?php echo $row['date'] ?></td></tr>
                        <tr><td colspan="2"><?php echo $row['comment'] ?></td></tr>
                        </table>
                        <?php
                     }
                    ?>
                
                
               
            </div>
            
        </div>
   </section>
   
 
   
   <?php
    require_once('footer.php');
    ?>
    

