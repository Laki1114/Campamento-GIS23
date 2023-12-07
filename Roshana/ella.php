<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="ella.css">
    <title></title>
</head>
<body>
</head>
<body>
<table><tr><td>
<div class="para">
    <p><h1>Ella, Sri Lanka: Unveiling Paradise in the Hill Country</h1></p><br><br>
    
    Nestled amidst the lush and emerald hills of Sri Lanka's central highlands, Ella stands as a testament to the island's remarkable natural beauty. This small town, enveloped in the Ceylonese charm, has captured the hearts of travelers from around the world with its picturesque landscapes, pristine waterfalls, and vibrant tea plantations. Ella beckons adventurers, hikers, and those in pursuit of tranquility to explore its enchanting offerings.
    
  <p>  Ella Rock: A Hiker's Delight</p>
    Ella's signature attraction is undoubtedly Ella Rock, a pinnacle that offers hikers a mesmerizing vantage point to admire the surrounding wonders. The hike to Ella Rock is an adventure in itself, winding through tea plantations, forests, and rocky terrains. At the summit, one is rewarded with a breathtaking, panoramic view of lush valleys, dense forests, and a patchwork of vibrant green tea plantations that stretch as far as the eye can see.
    
    <p>Ravana Falls: Nature's Oasis</p>
    The legend of Ravana comes to life at Ravana Falls, an idyllic waterfall located close to Ella. Its cascading waters tumble gracefully amidst the verdant landscape, creating a serene pool at its base. Travelers often take a refreshing dip in the cool waters while being enveloped by the sounds of nature.
    
   <p> Nine Arch Bridge: An Architectural Marvel</p>
    The iconic Nine Arch Bridge, an architectural masterpiece, adds to the allure of Ella. Comprising nine striking arches, it's a testament to Sri Lanka's engineering prowess. The bridge is known for its photogenic appeal, offering a unique viewpoint for train enthusiasts and photographers as steam locomotives wind their way through the picturesque countryside.
    
    <p>  Little Adam's Peak: A Scenic Stroll</p>
    A shorter and easier hike compared to Ella Rock, Little Adam's Peak offers breathtaking vistas of Ella's surroundings. The climb takes you through lush greenery, and at the summit, a gentle breeze welcomes you while you gaze upon sweeping views of the Ella Gap and the valleys below.
    
    <p>Tea Plantations: The Essence of Ceylon Tea</p>
    Ella is cocooned by lush tea plantations, providing a captivating glimpse into the heart of Sri Lanka's tea culture. Travelers can explore the tea-making process and savor freshly brewed Ceylon tea while taking in the sights and aromas of the plantations.
    
   <p> Ella Village: Where Time Stands Still</p>
    Ella Village is an embodiment of tranquility and warmth. The town's laid-back atmosphere, adorned with rustic cafes, restaurants, and welcoming guesthouses, offers a respite from the bustling city life. Strolling through the streets of Ella Village allows visitors to immerse themselves in the local culture and savor authentic Sri Lankan cuisine.
    
    <p>Ella Gap: A Gorge of Grandeur</p>
    Ella Gap, a natural chasm that separates Ella Rock from Little Adam's Peak, leaves travelers in awe with its vastness and the nearly 1,000-meter drop to the coastal plain below. The vistas from Ella Gap are nothing short of breathtaking, especially during sunrise and sunset.
    
    Ella is a traveler's paradise, a destination where nature's grandeur meets tranquility, and adventure blends with serenity. Whether you're a nature enthusiast, an avid hiker, or simply seeking a peaceful escape from the world's chaos, Ella invites you to experience the allure of Sri Lanka's hill country, where every moment is an embrace of natural splendor.

</div>
</td>
<!--2coulmn starts here-->
<td>
<!--image gallary starts here-->
<h2 style="text-align:center">Image Gallery</h2>

<div class="container-gallery">
  <div class="mySlides">
    <div class="numbertext">1 / 6</div>
    <img src="./assets/ella/1.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 6</div>
    <img src="./assets/ella/2.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 6</div>
    <img src="./assets/ella/3.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">4 / 6</div>
    <img src="./assets/ella/4.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 6</div>
    <img src="./assets/ella/5.jpg" style="width:100%">
  </div>
    
  <div class="mySlides">
    <div class="numbertext">6 / 6</div>
    <img src="./assets/ella/6.jpg" style="width:100%">
  </div>
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
    <div class="column">
      <img class="demo cursor" src="./assets/ella/1.jpg" style="width:100%;height:60px;" onclick="currentSlide(1)" alt="1pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="./assets/ella/2.jpg" style="width:100%;height:60px;" onclick="currentSlide(2)" alt="2pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="./assets/ella/3.jpg" style="width:100%;height:60px;" onclick="currentSlide(3)" alt="3pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="./assets/ella/4.jpg" style="width:100%;height:60px;" onclick="currentSlide(4)" alt="4pic">
    </div>
    <div class="column">
      <img class="demo cursor" src="./assets/ella/5.jpg" style="width:100%;height:60px;" onclick="currentSlide(5)" alt="5pic">
    </div>    
    <div class="column">
      <img class="demo cursor" src="./assets/ella/6.jpg" style="width:100%;height:60px;" onclick="currentSlide(6)" alt="6pic">
    </div>
  </div>
  
</div>
<?php  
  require("comment.php"); 
  ?>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
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
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
</td>

</tr>
</table>
</body>
</html>