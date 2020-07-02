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
    $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
    $type = mysqli_real_escape_string($dbc, trim($_POST['type']));
    $price = mysqli_real_escape_string($dbc, trim($_POST['price']));
    $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    $picture = mysqli_real_escape_string($dbc, trim($_FILES['picture']['name']));
    
    $picture_type = $_FILES['picture']['type'];
	$picture_size = $_FILES['picture']['size'];
	
	//process the data, inserting it into the database
	if (!empty($name) && is_numeric($price) && !empty($picture)) {
		if ((($picture_type == 'image/gif') || ($picture_type == 'image/jpeg') || ($picture_type == 'image/pjpeg') || ($picture_type == 'image/png'))
				&& ($picture_size > 0) && ($picture_size <= MAXFILESIZE)) {
			if ($_FILES['picture']['error'] == 0) {
				// Move the file to the target upload folder
				$target = UPLOADPATH . $picture;
				
				if (move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
				
	
				$query = "insert into products (name, type, price, description, picture) values ('$name', '$type', '$price', '$description', '$picture')";
            
                mysqli_query($dbc, $query)
                        or die ('Error querying the database.');
	
				// Confirm success with the user
				echo '<p>The product was added.</p>';
				
				echo '<p><a href="admin.php">&lt;&lt; Back to Admin</a></p>';
	
				// Clear the product data
				$name = "";
				$price = "";
				$picture = "";
	
				mysqli_close($dbc);
				}
			}
			else {
			echo '<p class="error">Sorry, there was a problem uploading your product image.</p>';
			}
			
		}
		else {
		echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (MAXFILESIZE / 1024) . ' KB in size.</p>';
		}

		// Try to delete the temporary screen shot image file
		@unlink($_FILES['picture']['tmp_name']);
	}
	//form not completed
	else {
		echo '<p class="error">Please enter all of the information to add a product.</p>';
	}
    
}
//show the form
else {
   ?>
<div class="forms row">
    
    <form class="form mx-auto" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        
            <h2>Add Product</h2>
            <div class="form-group">
                <label for="name">Product name:</label>
                <input class="form-control" type="text" id="name" name="name" />
            </div>
            <div class="form-group">
                <label for="Price">Price:</label>
                <input class="form-control" type="number" step="0.01" id="price" name="price" />
            </div>
            <div class="form-group">
                <label for="type">Product Type:</label>
                <select class="form-control" id="type" name="type">
                    <option value="Hat">Hat</option>
                    <option value="Sock" >Sock</option>
                    <option value="Scarf">Scarf</option>
                    <option value="Mitten">Mitten</option>
                    <option value="Blanket">Blanket</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" rows="10">
                </textarea>
            </div>    
            
                        
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAXFILESIZE; ?>" />
            <div class="form-group">
                <label for="picture">Picture:</label>
                <input class="form-control-file" type="file" id="picture" name="picture" />
            </div>
          
           <input type="submit" name="submit" value="Save" />
            
      </form>
  </div>



<?php 
}

?>