<?php
    //need to include the object before the session start since it is using the object in the session variable.
    require_once('Product.php');
    require_once('startsession.php');
    require_once('connectvars.php');
    $page_title ="Products";
    require_once('header.php');
    require_once('navmenu.php');
    
    $product = new Product();
    
    //need to put the session variable inside of an if statement so it isnt overwritten each page load.
    //this holds the cart items
    if(isset($_SESSION['productsArray'])) {
        $productsArray = $_SESSION['productsArray'];
    }
    
    else {
        $_SESSION['productsArray'] = array();
        $productsArray = $_SESSION['productsArray'];
    }
    
    //if they remove an item, take it out of array
    //these need to be in this order
    if(isset($_GET['id'])) {
        $removeId = $_GET['id'];
        //removes the object form the array
        unset($productsArray[$removeId]);
        //var_dump($productsArray);
        //reindexes the array
        $_SESSION['productsArray'] = array_values($productsArray);
        $productsArray = $_SESSION['productsArray'];
        
        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/products.php';
        header('Location: ' . $home_url);
    }
   
    
?>
        <section class="row">
            <nav class="col-sm-2 aside">
                <h3>Categories</h3>
                <ul>
                    <li><a href="products.php?productId=6">All</a></li>
                    <li><a href="products.php?productId=1">Hats</a></li>
                    <li><a href="products.php?productId=2">Socks</a></li>
                    <li><a href="products.php?productId=3">Scarves</a></li>
                    <li><a href="products.php?productId=4">Mittens</a></li>
                    <li><a href="products.php?productId=5">Blankets</a></li>
                </ul>
            </nav>
            
            <div class="col-sm-7 d-flex flex-wrap justify-content-around">
            <?php
            
            if(isset($_GET['productId'])) {
                //display only the type of products they choose to the page
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
                    
                $query = "Select * from products";
            
                $sort = $_GET['productId'];
                
                switch ($sort) {
                   
                
                case 1: 
                    $query .= " where type='hat'";
                    break;
                
                case 2: 
                    $query .= " where type='sock'";
                    break;
              
                case 3: 
                    $query .= " where type='scarf'";
                    break;
                
                case 4: 
                    $query .= " where type='mitten'";
                    break;
                
                case 5: 
                    $query .= " where type='blanket'";
                    break;
                default:
                    //no sort selected
                }
            }
            
            else {
                    //display all the products to the page
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
                    
                $query = "Select * from products";
            }
        
            
            $result = mysqli_query($dbc, $query)
                    or die("Error Selecting products.");
                    
            while($row = mysqli_fetch_array($result)) {
                
                ?>
                <article class="card d-flex">
                   
                    <div class="card-img-top">
                        <img id="cardImg" src="images/<?php echo $row['picture'] ?>"/>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $row['name'] ?></h2>
                        <div class="clearfix">
                        <p class="float-left"><?php echo $row['type'] ?></p>
                        <p class="float-right">$<?php echo $row['price'] ?></p>
                        </div>
                        <p ><?php echo $row['description'] ?></p>
                        
                        <form id="modalForm" method="post" action="<?php echo $_SERVER['products.php']; ?>">
                            <fieldset>
                                <div class="form-group float-left">
                                    <label for="size">Select Size:</label>
                                    <select class="form-control" name="size" id="size">
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                </div>
                                <div class="form-group float-right">
                                    <label for="quantity">Select Quantity:</label>
                                    <select class="form-control" name="quantity" id="quantity">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                <input type="hidden" name="name" value="<?php echo $row['name'] ?>" />
                                <input type="hidden" name="price" value="<?php echo $row['price'] ?>" />
                            </fieldset>
                             <input type="submit" name="submit" value="Add to Cart" class="btn btn-danger"/>
                        </form>
                    </div>
                </article>
                        
                <?php
                
            }
            
            //selected product data is pulled from the form
            //then stored in a product object and added to the global array
            if(isset($_POST['submit'])){
               
                $selectedProduct = new Product();
                $name = $_POST['name'];
                $quantity = $_POST['quantity'];
                $size = $_POST['size'];
                $id = $_POST['id'];
                $price = $_POST['price'];
                
                $selectedProduct->setName($name);
                $selectedProduct->setQuantity($quantity);
                $selectedProduct->setSize($size);
                $selectedProduct->setId($id);
                $selectedProduct->setPrice($price);
                array_push($productsArray, $selectedProduct);
            }
                
            ?>
            </div>
        
            <aside id="cart" class="col-sm-3 aside">
                <h3 id="here">Your Cart</h3>
                
                <table><tr><th>Product</th><th>Quantity</th><th>Size</th><th>Cost</th></tr>
                <?php
                //loops throught the products in the global array
                //and displays them to the cart
                //var_dump($productsArray);
                $total = 0;
                $index = 0;
                foreach($productsArray as $aProduct) {
                    $cost = $aProduct->getQuantity() * $aProduct->getPrice();
                        echo '<tr><td>';
                        echo $aProduct->getName();
                        echo '</td><td>';
                        echo $aProduct->getQuantity();
                        echo '</td><td>'; 
                        echo $aProduct->getSize();
                        echo '</td><td>';
                        echo '$' . $cost;
                        echo '</td><td><a href=products.php?id=' . $index . '>Remove</a></td></tr>';
                        $index++;
                        
                        $total += $cost;
                }
                
                //sets the global array to the new array
                $_SESSION['productsArray'] = $productsArray;
                
                echo '</table>';
                if(!empty($total)){
                    echo 'Total : $' . $total;
                    echo '<p><a href="checkOut.php?">Check Out</a></p>';
                    
                } else {
                    echo '<p>Your cart is empty.</p>';
                }
            
                ?>
                
            </aside>
            
        </section>
    
    
    <?php
    require_once('footer.php');
    ?>
    