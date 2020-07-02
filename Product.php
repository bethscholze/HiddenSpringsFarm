<?php

    class Product {
        
        protected $name;
        protected $price;
        protected $description;
        protected $type;
        protected $productId;
        protected $quantity;
        protected $size;
    
        public function setName($name) {
            $this->name = $name;
        }
        public function setPrice($price) {
            $this->price = $price;
        }
        public function setDescription($description) {
            $this->description = $description;
        }
        public function setType($type) {
            $this->type = $type;
        }
        public function setId($id) {
            $this->productId = $id;
        }
        public function setQuantity($quantity) {
            $this->quantity = $quantity;
        }
        public function setSize($size) {
            $this->size = $size;
        }
        
        public function getName() {
            return $this->name;
        }
        public function getPrice() {
            return $this->price;
        }
        public function getType() {
            return $this->type;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getId() {
            return $this->productId;
        }
        public function getQuantity() {
            return $this->quantity;
        }
        public function getSize() {
            return $this->size;
        }
        
        public function addProduct() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
                
            $query = "INSERT into products (name, type, price, description) 
                    values ($this->name, $this->type, $this->price, $this->description)";
            mysqli_query($dbc, $query)
                    or die("Error inserting the Product.");
        }
        
        public function removeProduct() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
                
            $query = "DELETE from products where id='$this->productId'";
            mysqli_query($dbc, $query)
                    or die("Error removing the Product.");
        }
        
        public function displayProductsAdmin() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
                
            $query = "Select * from products";
            
            $result = mysqli_query($dbc, $query)
                    or die("Error Selecting products.");
                    
            while($row = mysqli_fetch_array($result)) {
                ?>
                <tr><td><?php echo $row['id'] ?></td><td><?php echo $row['name'] ?></td><td><?php echo 
                        $row['type'] ?></td><td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['description'] ?></td><td><a href="remove.php?productId='<?php echo $row['id'] ?>'">Hide</a></td>
                        <td><?php echo $row['available'] ?></td></tr>
                        
                <?php
            }
                    
            //go through the results, and print it to the page
        }
        
        public function displayProducts() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
                
            $query = "Select * from products";
            
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
            
            
        }
        
    }

?>