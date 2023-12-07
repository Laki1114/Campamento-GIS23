<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    background-color: #b4ae85;
}
nav{
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 8%;
}
nav .logo{
    font-size: 32px;
    font-weight: 500;
    cursor: pointer;
}
nav ul li{
    list-style: none;
    display: inline-block;
}
nav ul li a{
    display: block;
    margin: 0 10px;
    color: #000;
    font-weight: 500;
    text-decoration: none;
    font-size: 17px;
    position: relative;
}
nav ul li a::before{
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: #000;
    width: 0;
    height: 2.5px;
    transition: all 0.3s ease;
}
nav ul li a:hover::before{
    width: 100%;
}
nav ul i{
    font-size: 20px;
    margin-left: 10px;
    cursor: pointer;
}
.flex-box{
    display: flex;
    width: 1000px;
    margin: 20px auto;
}
.left{
    width: 40%;
}
.big-img{
    width: 250px;
}
.big-img img{
    width: inherit;
}
.images{
    display: flex;
    justify-content: space-between;
    width: 60%;
    margin-top: 15px;
}
.small-img{
    width: 50px;
    overflow: hidden;
    border: 1.5px solid black;
}
.small-img img{
    width: inherit;
    cursor: pointer;
    transition: all 0.3s ease;
}
.small-img:hover img{
    transform: scale(1.2);
}
.url{
    font-size: 16px;
    font-weight: 400;
    color: rgb(0, 102, 255);
}
.pname{
    font-size: 22px;
    font-weight: 600;
    margin-top: 50px;
}
.ratings i{
    color: rgb(255, 136, 0);
}
.price{
    font-size: 20px;
    font-weight: 500;
    margin: 20px 0;
}
.size{
    display: flex;
    align-items: center;
    margin: 20px 0;
}
.size p{
    font-size: 18px;
    font-weight: 500;
}
.psize{
    width: 60px;
    height: 30px;
    border: 1px solid #ff5e00;
    color: #000;
    text-align: center;
    margin: 0 10px;
    cursor: pointer;
}
.psize.active{
    border-width: 1.5px;
    color: #ff5e00;
    font-weight: 500;
}
.quantity{
    display: flex;
}
.quantity p{
    font-size: 18px;
    font-weight: 500;
}
.quantity input{
    width: 40px;
    font-size: 17px;
    font-weight: 500;
    text-align: center;
    margin-left: 15px;
}
.btn-box{
    display: flex;
    margin-top: 40px;
}
.btn-box button{
    font-size: 18px;
    padding: 8px 25px;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    color: white;
}
.cart-btn{
    background-color: #267f2f;
    margin-right: 20px;
}
.buy-btn{
    background-color: #267f2f;
}
.cart-btn:hover{
    background-color: #d1e83b;
}
.buy-btn:hover{
    background-color: #d1e83b;
}

    </style>



</head>
<body>
    <nav>
        <div class="logo">
            <img src="images/logo.png" alt="" width="130" height="60">
        </div>
        <ul>
            
            <i class="fas fa-shopping-cart"></i>
        </ul>
    </nav>

    <div class="flex-box">
        <div class="left">
            <div class="big-img">
                <img src="images/p1.jpg">
            </div>
            <div class="images">
                <div class="small-img">
                    <img src="images/p1.jpg" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img src="images/p2.jpg" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img src="images/p3.jpg" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img src="images/p4.jpg" onclick="showImg(this.src)">
                </div>
            </div>
        </div>

        <div class="right">
            
            <div class="pname">Lether Tent</div>
            <div class="ratings">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price">$40</div>
            <div class="size">
                <p>Size :</p>
                <div class="psize active">M</div>
                <div class="psize">L</div>
                
            </div>
            <div class="quantity">
                <p>Quantity :</p>
                <input type="number" min="1" max="5" value="1">
            </div>
            <div class="btn-box">
                <button class="cart-btn">Get in Rent</button>
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
    </div>


    <script>
        let bigImg = document.querySelector('.big-img img');
        function showImg(pic){
            bigImg.src = pic;
        }
    </script>
</body>
</html>