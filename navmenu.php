<nav id="mainNavigation">
    <ul class="d-flex justify-content-center">
        <li><a class="link" href="index.php">About</a></li>
        <li><a class="link" href="products.php">Products</a></li>
        <li><a class="link" href="howTos.php">How To</a></li>
        <!--<li><a href="community.php">Community</a></li>-->
        <?php
        if(!isset($_SESSION['user_id'])) {
            ?>
            <li><a class="link" href="signup.php">Sign Up</a></li>
            <li><a class="link" href="login.php">Login</a></li>
            <?php
        } else {
            ?>
            <li><a class="link" href="userProfile.php">Account</a></li>
            <li><a class="link" href="logout.php">Log Out</a></li>
            <?php
        }
        
        ?>
    </ul>
    <!-- once they are logged in swith these to 
    account and logout -->
    <hr />
</nav>

<?php
echo '<h1>' . $page_title . '</h1>';
?>
</header>
    
   <main class="container-fluid">