<?php
    class HowToGuide {
        protected $title;
        protected $date;
        protected $content;
        protected $author;
        protected $guideId;
        
        function setTitle($title) {
            $this->title = $title;
        }
        function setDate($date) {
            $this->date = $date;
        }
        function setContent($content) {
            $this->content = $content;
        }
        function setAuthor($author) {
            $this->author = $author;
        }
        function setGuideId($guideId) {
            $this->guideId = $guideId;
        }
        
        function getTitle() {
            return $this->title;
        }
        function getDate() {
            return $this->date;
        }
        function getContent() {
            return $this->content;
        }
        function getAuthor() {
            return $this->author;
        }
        function getGuideId() {
            return $this->guideId;
        }
        
        public function addGuide() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
                
            $query = "INSERT into how_to_guides (title, date, content, author) values ($this->title, $this->date, $this->content, $this->author)";
            mysqli_query($dbc, $query)
                    or die("Error inserting the guide.");
        }
        
        public function removeGuide() {
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to the database.');
                
            $query = "DELETE from how_to_guides where id='$this->guideId'";
            mysqli_query($dbc, $query)
                    or die("Error removing the guide.");
        }
        
        public function displayAdminGuides() {
            ?>
             <h2>How To's</h2>
                <div>
                     <table>
                        <tr><th>Id</th><th>Title</th><th>Date</th><th>Category</th><th>Author</th><th>Description</th><th>Hide Post</th><th>Visible</th></tr>
                        <?php
           $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
                            
            $query = "Select * from how_to_guides";
            $result = mysqli_query($dbc, $query)
                    or die("Error Selecting products.");
                    
            while($row = mysqli_fetch_array($result)) {
                ?>
                <tr><td><?php echo $row['id'] ?></td><td><?php echo $row['title'] ?></td><td><?php echo 
                        $row['date'] ?></td><td><?php echo $row['category'] ?></td><td><?php echo $row['author'] ?></td><td><?php echo substr($row['content'], 0, 100) ?></td>
                        <td><a href="remove.php?howId='<?php echo $row['id'] ?>'">Hide</a></td><td><?php echo $row['visible'] ?></td></tr>
                        
                <?php
            }
            ?>
                </table>
                <div class="buttonLink">
                <a href="addHowTo.php">Add How To Guide</a>
                </div>
            </div>
        <?php
        }
        
        public function displayAllGuides($query) {
            
           $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                    or die('Error connecting to the database.');
                            
          
            // $query = "Select * from how_to_guides order by date desc limit 1";
            
            $result = mysqli_query($dbc, $query)
                    or die("Error Selecting guides.");
                    
            while($row = mysqli_fetch_array($result)) {
                $title = $row['title'];
                ?>
                <h2><?php echo $row['title'] ?></h2>
                
                <p><?php echo $row['content'] ?></p>
                
                <p>Author: <?php echo $row['author'] ?>, Date: <?php echo 
                        $row['date'] ?>, Category: <?php echo $row['category'] ?></p>
                <p style="display:none"><?php echo $title ?></p>
            
                <?php
            }
            return $title;
           
        }
        
        
    }




?>