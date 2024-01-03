<!DOCTYPE html>
<html>
<head>
 <title>Cards</title>
</head>

<style type="text/css">


*{
 margin: 0px;
 padding: 0px;
}
body{
 font-family: arial;
}
.main{

 margin: 2%;
}

.card{
     width: 15%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2.3%;
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
 }

 .imaged img{
  width: 100%;
  height : 208px;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
 }

.title{
 
  text-align: center;
  padding: 10px;
  
 }

h1{
  font-size: 20px;
 }

.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 10px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
button{
  margin-top: 40px;
  margin-bottom: 10px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5px;
  padding:10px;
}
button:hover{
  background-color: black;
  color: white;
  transition: .5s;
  cursor: pointer;
}

</style>
<body>

<div class="main">

 <!--cards -->

<div class="card">

<div class="image">
   <img src="images/camp.png">
</div>
<div class="title">
 <h1>Camping Sites</h1>
</div>
<div class="des">
 <p>Here u can found camping site......</p>
 <a href="../Amaya/campingsite.php">
 <button>Read More...</button></a>
</div>
</div>
<!--cards -->


<div class="card">

<div class="image">
   <img src="images/glamp.png">
</div>
<div class="title">
 <h1>Glamping Sites</h1>
</div>
<div class="des">
 <p>You can Add Desccription Here...</p>
 <a href="../Amaya/index.php">
<button>Read More...</button></a>
</div>
</div>
<!--cards -->


<div class="card">

<div class="image">
   <img src="images/guide.png">
</div>
<div class="title">
 <h1>Guide</h1>
</div>
<div class="des">
 <p>You can Add Desccription Here...</p>
 <a href="../Faheema/Guide/guide.php">
<button>Read More...</button></a>
</div>
</div>
<!--cards -->


<div class="card">

<div class="image">
   <img src="images/tsup.png">
</div>
<div class="title">
 <h1>Tools</h1>
</div>
<div class="des">
 <p>You can Add Desccription Here...</p>
 <a href="../Amaya/tspage.php">
<button>Read More...</button></a>
</div>
</div>
<!--cards -->


<div class="card">

<div class="imaged">
   <img src="images/driver.png">
</div>
<div class="title">
 <h1>Driver</h1>
</div>
<div class="des">
 <p>You can Add Desccription Here...</p>
 <a href="../Faheema/driver/driver_.php">
<button>Read More...</button></a>
</div>
</div>
<!--cards -->






</div>
</body>
</html>
