<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

/* Slideshow container */
.slideshow-container {
  position: relative;
  background: #999;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
  font-size:20px;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: cornflowerblue;}
</style>
</head>
<body>



<div class="slideshow-container">
  <?php
  // Connect to your database (adjust these settings as needed)
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "campamento";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Fetch data from the database
  $sql = "SELECT * FROM advertisements WHERE status = 'accepted'";
  $result = $conn->query($sql);

  // Display each advertisement as a slide
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo '<div class="mySlides">';
     
      $images = explode(",", $row["images"]);
      foreach ($images as $image) {
        echo "<img src='../admin/" . trim($image) . "' alt='Image'  height='200'>";
      }
      
      echo '<br>';
      echo '<q>' . $row["description"] . '</q>';
      echo '<p class="author">- ' . $row["title"] . '</p>';
      echo '</div>';
  }
} else {
  echo "0 results";
}
  $conn->close();
  ?>
  
  <!-- Next & previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>
</div>

<div class="dot-container">
  <!-- Generate dots dynamically based on the number of slides -->
  <?php
  if ($result->num_rows > 0) {
      $counter = 1;
      while($counter <= $result->num_rows) {
          echo '<span class="dot" onclick="currentSlide(' . $counter . ')"></span>';
          $counter++;
      }
  }
  ?>
</div>



<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>

</body>
</html> 