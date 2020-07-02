<?php
//need to add a view invoices page, put shipped in table so only ones not shipped show up.
    require_once('authorize.php');
    require_once('connectvars.php');
    $page_title ="Admin";
    require_once('header.php');
    require_once('navmenuadmin.php');
    require_once('Product.php');
    require_once('HowToGuide.php');
    $product = new Product();
    $howTo = new HowToGuide();
?>

        <div class="row">
            <article class="col-sm-12 col-md-6">
                <h2>Products</h2>
                <div>
                    <table>
                        <tr><th>Id</th><th>Product</th><th>Category</th><th>Price</th><th>Description</th><th>Hide Product</th><th>Available</th></tr>
                        <?php
                        //show all of the products in the database
                        $product->displayProductsAdmin();
                        ?>
                    </table>
                    <div class="buttonLink">
                        <a href="addProduct.php">Add a new Product</a>
                    </div>
                   
                </div>
            </article>
            <article class="col-sm-12 col-md-6">
                
                        <?php
                        //show all of the how to guides in the database
                        $howTo->displayAdminGuides();
                                    
                        ?>
            </article>
        </div>
        
        
        
        <article class="row" id="userComments">
            
            <h2>Approve User Comments</h2>
            
                <table class="table">
                    <tr><th>Username</th><th>Date</th><th>Comment</th><th>How To</th><th>Approve/Remove</th></tr>
                   
                    
                    <?php
                    //show all of the user comments that havent been approved
                    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or die('Error connecting to the database.');
                    $query = "Select * from user_comments where approved='no' order by date asc";
                    $result = mysqli_query($dbc, $query)
                            or die ('Error querying the user comments.');
                     while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr><td><?php echo $row['username'] ?></td><td><?php echo $row['date'] ?></td>
                        <td><?php echo substr($row['comment'], 0, 100) ?></td><td><?php echo $row['howTo'] ?></td><td><a href="approve_remove.php?id='<?php echo $row['commentId'] ?>'">Approve/Remove</a></td></tr>
                        <?php
                     }
                    ?>
        
                </table>
        </article>
        
    
    <?php
    require_once('footer.php');
    ?>