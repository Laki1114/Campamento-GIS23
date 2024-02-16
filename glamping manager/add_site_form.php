<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_site form</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="glm_css_files/add_site_form.css">






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