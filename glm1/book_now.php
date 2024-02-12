<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort booking form</title>
    
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

.container {
  position: relative;
  width: 800px;
  background-color: #fff;
  border-radius: 20px;
}
#form{
    
    height:325px;
    width:800px;
    margin-left: 0px;
    margin-top: 200px;
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
    width:400px;
    margin-top: 20px;
    margin-left:550px;
}

#third-group{
  border:none;
    width:500px;
    margin-top: 20px;
    margin-left:50px;
    position: absolute;
}

#forth-group{
  border:none;
    width:500px;
    margin-top: 20px;
    margin-left:350px;
    position: absolute;
}

#fifth-group{
    border:none;
    width:500px;
    margin-top: 20px;
    margin-left:550px;
    position: absolute;
}

#sixth-group{
  margin-top: 105px;
  margin-left:300px;
  position: absolute; 
}

.status {
    display: flex;
  }

  .number {
    margin-top: 15px;
    margin-left: 10px;
  }

  .number button {
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    background-color: #003D25;
    color: white;
    font-size: 30px;
    font-weight: 900;
    overflow: hidden;
  }
  .text{
    font-size: 20px;
    font-weight: bold;
    margin-left: 10px;
    margin-top: 25px;
    color: #555;
  
  }










</style>





</head>
<body>
<div class="status">
  <div class="number">
    <button>1</button>
  </div>
  <div class="text">
    Search
  </div>
</div>

    <div class="container">
        <form class="form-group">
            <div id="form">
               <div class="title">
                     <h1>Make Your Reservation !</h1>
               </div>


               <div id="first-group">

               <div class="mini-title">
                     <h6>Check-In</h6>
               </div>
                    <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input type="date" id="input-group" placeholder=" Check-In">
                    </div>
                    <br>
             


               </div>





               <div id="second-group">

               <div class="mini-title">
                     <h6>Check-Out</h6>
               </div>
               <div id="content">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input type="date" id="input-group" placeholder=" Check-Out">
                    </div>

               </div>

             <div id="third-group">
             <div class="mini-title">
                     <h6>Glamping Site Type</h6>
              </div>
                    <div id="content">
                        <select id="input-group" >
                            
                            <option value="">Tent</option>
                            <option value="">Tree House</option>
                            <option value="">Camper Van</option>
                            <option value="">Dome</option>
                            <option value="">Pods and Cabins</option>
                            <option value="">Yurt</option>
                        </select>
                    </div>
             </div>
             
             <div id="forth-group">
                 <div class="mini-title">
                     <h6>No. of Guests</h6>
                 </div>
                 <div id="content">
                        <select id="input-group" >
                            
                            <option value="">1 Person</option>
                            <option value="">2 Person</option>
                            <option value="">3 Person</option>
                            <option value="">4 Person</option>
                        </select>
                      </div>
                      
             </div>

             <div id="fifth-group">
                 <div class="mini-title">
                     <h6>Whatsapp Number</h6>
                 </div>
                 <div id="content">
                 <input type="tel" id="phone" placeholder=" 07x-xxxxxxx">
                 </div>
             </div>

             <div id="sixth-group">
             <div class="buttonn">
             <a href="available_form.php" class="button">
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
                 Check Availability</button>
           </a>
                 </div>
             </div>

            </div>
        </form>
    </div>
</body>
</html>