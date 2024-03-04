<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resort booking form</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="glm_css_files/book_now.css">






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
                     <h6>Are you a Sri Lankan or Foreigner?</h6>
              </div>
            
             </div>
             
             <div id="forth-group">
                 
             <input type="radio" id="srilankan" name="srilankan" value="True">
              <label for="srilankan">Sri Lankan</label><br>
              <input type="radio" id="foreigner" name="foreigner" value="False">
              <label for="foreigner">Foreigner</label><br>       
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