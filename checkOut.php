<?php
    //need to include the object before the session start since it is using the object in the session variable.
    require_once('Product.php');
    require_once('startsession.php');
    require_once('connectvars.php');
    $page_title ="Check Out";
    require_once('header.php');
    require_once('navmenu.php');
    
    $product = new Product();
    
    //need to put the session variable inside of an if statement so it isnt overwritten each page load.
    if( isset( $_SESSION['productsArray'] ) ) {
        $productsArray = $_SESSION['productsArray'];
    } else {
        echo 'No Products were selected for purchase.';
    }
    
?>
    <div class="row">
        <div class="col-sm-1"></div>
        <aside id="cart" class="col-sm-5 mr-1">
            <h3 id="here">Your Cart</h3>
            
            <table class="table table-striped table-borderless">
                <tr><th>Product</th><th>Quantity</th><th>Size</th><th>Cost</th></tr>
            <?php
            //loops throught the products in the global array
            //and displays them to the cart
            $total = 0;
            foreach($productsArray as $aProduct) {
                $cost = $aProduct->getQuantity() * $aProduct->getPrice();
                echo '<tr><td>';
                echo $aProduct->getName();
                echo '</td><td>';
                echo $aProduct->getQuantity();
                echo '</td><td>'; 
                echo $aProduct->getSize();
                echo '</td><td>';
                echo $cost;
                echo '</td></tr>';
                
                $total += $cost;
            }
            
            //sets the global array to the new array
            $_SESSION['productsArray'] = $productsArray;
            
            echo '<tr><td colspan="4">Total: $' . $total . '</td></tr>';
            echo '</table>';
            ?>
            
        </aside>
        <article class="col-sm-5 ml-1">
        <?php
          
        
        if(isset($_POST['submit'])) {
            
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zipcode = $_POST['zipcode'];
            
            //do a check at top to see if signed in user, if is set customer id to the user id, also auto fill the form from the echo of the customer table.
            if(!empty($firstName) && !empty($lastName) && !empty($address) && !empty($city) && !empty($state) && !empty($zipcode)) {
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or die('Error connecting to the database.');
                $query = "insert into customers (firstName, lastName, address, city, state, zipcode) values ('$firstName', '$lastName', '$address', '$city', '$state', '$zipcode')";  
                
                $result = mysqli_query($dbc, $query)
                        or die("Error inserting customer.");        
                        
                        
                        
                        
                $query = "select customerId from customers where firstName = '$firstName' and lastName = '$lastName' order by customerId desc limit 1";
                
                $result = mysqli_query($dbc, $query)
                        or die("Error Selecting customerId");
                
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    $customerId = $row['customerId'];
                }
                
                $query = "insert into invoice (customerId, total) values ('$customerId', '$total')";
                
                $result = mysqli_query($dbc, $query)
                            or die("Error inserting invoice.");
                            
                $query = "select id from invoice where customerId='$customerId' order by id desc limit 1";
              
                $result= mysqli_query($dbc, $query)
                            or die("Error selecting invoice.");
                           
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result);
                    $invoiceId = $row['id'];
                }
               
                
                // add the products in the cart to the invoice
                foreach($productsArray as $aProduct) {
                    $cost = $aProduct->getQuantity() * $aProduct->getPrice();
                    $productId = $aProduct->getId();
                    $name = $aProduct->getName();
                    $quantity = $aProduct->getQuantity();   
                    $size = $aProduct->getSize();
                    $price = $aProduct->getPrice();
                    
                    $query = "insert into invoiceProducts (invoiceId, productId, size, quantity, price, cost) values ('$invoiceId', '$productId', '$size', '$quantity', '$price', '$cost')";
                    
                    $result = mysqli_query($dbc, $query)
                            or die("Error inserting Product invoice.");
                    
                }
                    
                    
                //tell the user they were successful
                echo '<p class="alert alert-success">Order submitted.';
                $_SESSION['productsArray'] = array();
                
            }
            else {
                echo '<p class="alert alert-danger">You must fill out all the form fields.</p>';
            }
            
        }
        
        else {
             ?>
             
        
           <form id="shippingForm" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                
                <legend>Shipping Information</legend>
                 <div class="form-group">
                    <label for="firstName">First name:</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" />
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name:</label>
                    <input class="form-control" type="text" id="lastName" name="lastName" />
                </div>
                 <div class="form-group">
                    <label for="address">Address:</label>
                    <input class="form-control" type="text" id="address" name="address" />
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input class="form-control" type="text" id="city" name="city" /> 
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input class="form-control" type="text" id="state" name="state" />
                </div>
                <div class="form-group">
                    <label for="zipcode">Zipcode:</label>
                    <input class="form-control" type="number" id="zipcode" name="zipcode" /> 
                </div>
                
                <input class="form-control" type="submit" name="submit" value="Submit Order" />
            </form>
        </article>
        <div class="col-sm-1"></div>
        <?php
            
        }
        ?>
    </div>
    
<?php
    require_once('footer.php');
?>
    
    