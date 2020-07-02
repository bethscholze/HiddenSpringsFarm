<?php
//need to add a view invoices page, put shipped in table so only ones not shipped show up.
    require_once('authorize.php');
    require_once('connectvars.php');
    $page_title ="Admin";
    require_once('header.php');
    require_once('navmenuadmin.php');
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
        $query = "update invoice set shipped='yes' where id = $id";
        $result = mysqli_query($dbc, $query)
                or die ('Error updatting shipped.');
        echo '<p class="alert alert-success">Order marked as shipped</p>';
    }
    
?>


    <section>       
    <h2>Customer Invoices</h2>
            <?php
            //show all of the invoices that havent been shipped
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
            
            $query = "select C.firstName, C.lastName, C.address, C.city, C.state, C.zipcode, I.id, I.total from invoice I join customers C on I.customerId = C.customerId where shipped = 'no'";
            $result = mysqli_query($dbc, $query)
                    or die ('Error getting shipping info.');
            //show shipping info
            while($row = mysqli_fetch_array($result)) {
                $invoiceId = $row['id'];
                $total = $row['total'];
                ?>
                <article class="row">
                <div class="col-sm-2 offset-3">
                    <h2 class="text-left">Shipping Info</h2>
                <table id="shipping" class="mx-auto table table-borderless invoice text-left mt-5">
                    <tr><td><?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?></td></tr>
                    <tr><td><?php echo $row['address']?></td></tr>
                    <tr><td><?php echo $row['city'] ?>, <?php echo $row['state'] ?> <?php echo $row['zipcode'] ?></td></tr>
                </table>
                </div>
                <div class="col-sm-4">
                    <h2 class="text-left">Order</h2>
                    <table class="mx-auto table table-striped invoice">
                        <thead class="thead-dark">
                        <tr><th>Product Id</th><th>Product Name</th><th>Size</th><th>Quantity</th><th>Price</th><th>Cost</th></tr>
                        </thead>
                        <tbody>
                     <?php
                    $query2 = "select P.productId, products.name, P.size, P.quantity, products.price, P.cost from invoice I join invoiceProducts P on P.invoiceId = I.Id join products on products.id = P.productId where P.invoiceId = $invoiceId";
                    $result2 = mysqli_query($dbc, $query2)
                            or die ('Error getting product information.');
                    //show the products ordered
                    while($row2 = mysqli_fetch_array($result2)) {
                            ?>
                        
                            <tr><td><?php echo $row2['productId'] ?></td><td><?php echo $row2['name'] ?></td><td><?php echo $row2['size'] ?></td>
                            <td><?php echo $row2['quantity'] ?></td><td>$<?php echo $row2['price'] ?></td><td>$<?php echo $row2['cost'] ?></td></tr>
                            
                        
                    <?php
                    }
                    ?>
                    <tr><td></td><td colspan="4">Total: $<?php echo $total ?></td><td></td></tr>
                    </tbody>
                    
                   </table>
                   <a class="buttonLink invoiceLink" href="invoices.php?id=<?php echo $invoiceId ?>">Mark as shipped</a>
               </div>
               </article>
               <?php
             }
             mysqli_close($dbc);
            ?>
        
</section>
          
<?php
require_once('footer.php');
?>