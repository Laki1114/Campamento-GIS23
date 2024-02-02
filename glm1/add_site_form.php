<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_site form</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>
      /* =========== Google Fonts ============ */
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
  font-family: "Ubuntu", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --green: #003D25;
  --white: #fff;
  --yellow: #BFCC7C;
  --gray: #f5f5f5;
  --black1: #222;
  --black2: #999;
}

body {
  min-height: 75vh;
  overflow-x: hidden;
  background: var(--yellow);
}
/*---global end--*/
.container {
  position: relative;
  width: 800px;
  background-color: #fff;
  border-radius: 20px;
}
#form{
    
    height:600px;
    width:800px;
    margin-left: 0px;
    margin-top: 80px;
    opacity:0.7;
    border-radius: 20px;
}
.title{
 
 text-align: center;
 padding: 10px;
 
}
#first-group{
    border:none;
    width:500px;
    margin-top: 20px;
    margin-left:50px;
    position: absolute;

}
#second-group{
  border:none;
    width:500px;
    margin-top: 20px;
    margin-left:50px;
    position: absolute;
}
#forth-group{
  margin-top: 20px;
  margin-left:300px;
  position: absolute; 
}



</style>





</head>
<body>
    <div class="container">
        <form class="form-group">
            <div id="form">
               <div class="title">
                     <h1>Add your Glamping site here !</h1>
               </div>

               <div class="first">
               <div class="mini-title">
                     <h6>Name of the Site:</h6>
               </div>
               <div id="content">
                        <input type="text" id="name" style="width:700px;">  
                    </div>
               </div>
               <br>

               <div class="second">
               <div class="mini-title">
                     <h6>Add an image of your glamping site:</h6>
               </div>
               <div id="content">
                     <input type="file" id="myfile" name="myfile">  
                    </div>
               </div>
               <br>
              
               <div class="third">
               <div class="mini-title">
                     <h6>Add the details of your glamping site:</h6>
               </div>
               <textarea name="message" rows="10" cols="85"></textarea>
               </div>


               <div id="forth-group">
             <div class="buttonn">
                 <button style="
                 border: none;
                 color: white;
                 padding: 15px 32px;
                 text-align: center;
                 text-decoration: none;
                 display: inline-block;
                 font-size: 16px;
                 margin: 4px 2px;
                 cursor: pointer;
                 background-color: #222;
                 border-radius: 25px;
                 font-weight: 900;
        
                 ">
                 Submit</button>
                 </div>
             </div>

              

             
             
           </div>
        </form>
    </div>
</body>
</html>