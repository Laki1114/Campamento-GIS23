<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messege </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../css/Admincss/admin.css">
    
    
</head>
<body>

<div class="container">
        <div class="navigation">
        <?php include 'adminsidebar.php'; ?>
        </div>


        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="../resource/customer01.jpg" alt="">
                </div>
            </div>

            
                    

                <div class="recentOrders">
                
                <?php include '../ChatApp/users.php'; ?>
   
                <script src="javascript/users.js"></script>
                </div>
            </div>
        


</body>
</html>