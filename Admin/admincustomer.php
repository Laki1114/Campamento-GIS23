<?php  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            
            <?php include 'adminsidebar.php'; ?>
                    
            
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="images/customer01.jpg" alt="">
                </div>
            </div>

            <button class="btnnav"><a href="#ud">User Details</a></button>
            <button class="btnnav" ><a href="#gmd">Glamping Site Manager Details</a></button>
            <button class="btnnav" ><a href="#gd">Guide Details</a></button>
            <button class="btnnav" ><a href="#dd">Driver Details</a></button>
            <button class="btnnav" ><a href="#td">Tool Supplier Details</a></button>
            
            
            
            <!-- ================ Order Details List ================= -->
            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 id="ud" >User Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>User ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>U001</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>U002</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>U003</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>U004</td>
                                <td>Amrith</td>
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            
                            

                            
                        </tbody>
                    </table>
                </div>

                
            </div>


            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 id="gmd" >Glamping Site Manager Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>GM ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>GM001</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>GM002</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>GM003</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>GM004</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>



                            
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 id="gd" >Guide Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Guide ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>G001</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>G002</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>G003</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>G004</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

                
            </div>




            <div class="details2">
                <div class="admincustomer">
                    <div class="cusdet">
                        <h2 id="dd" >Driver Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Driver ID</td>
                                <td>Name</td>
                                <td>NIC NO</td>
                                <td>Gender</td>
                                <td>Telephone No </td>
                                <td>E-mail</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>D001</td>
                                <td>Amrith</td>
                               
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>D002</td>
                                <td>Amrith</td>
                               
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>D003</td>
                                <td>Amrith</td>
                              
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            <tr>
                            <td>D004</td>
                                <td>Amrith</td>
                                
                                <td>200081800123</td>
                                <td>Male</td>
                                <td>0414495986</td>
                                <td>lkj@gmail.com</td>
                            </tr>

                            

                            
                        </tbody>
                    </table>
                </div>

                
            </div>


        </div>
    </div>



    <!-- ====== ionicons ======= -->
</body>

</html>