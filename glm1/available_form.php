<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>available form</title>
    
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
  width: 1000px;
  background-color: #fff;
  border-radius: 20px;
  margin-top: 120px;
}
/*detail part--*/
.tb{
    height:300px;
    width:900px;
    margin-left: 25px;
    margin-top: 80px;
    opacity:0.7;
    border-radius: 20px;
}
table {
  border-collapse: collapse;
  width: 100%;
    opacity:0.7;
    border-radius: 20px;
  
}
th{
  color: #222;
}

th, td {
  text-align: left;
  padding: 8px;
  cursor: pointer;
 
}

tr:nth-child(even) {
  background-color: #BFCC7C;
}
.title{
 
 text-align: center;
 padding: 20px;
 padding-bottom: 5px;
 color: #003D25;
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
    <button>2</button>
  </div>
  <div class="text">
    Check Availability
  </div>
</div>
    
<div class="container">
<div class="title">
        <h1>Available Sites</h1>
    </div>

    <div class="tb">
    <table>
  <tr>
  <th>Site Name</th>
  <th>Room Type</th>
  <th>Available</th>
  <th>Price</th>
  </tr>
  <tr>
  <td>Galoya glamping site</td>
  <td>Single</td>
  <td>2 Rooms</td>
  <td>$100</td>
  </tr>

  <tr>
  <td>Knuckels glamping site</td>
  <td>Double</td>
  <td>1 Room</td>
  <td>$200</td>
  </tr>
  
  <tr>
  <td>Knuckels glamping site</td>
  <td>Single</td>
  <td>3 Room</td>
  <td>$100</td>
  </tr>

  <tr>
  <td>Galoya glamping site</td>
  <td>Single</td>
  <td>1 Room</td>
  <td>$150</td>
  </tr>

  <tr>
  <td>Knuckels glamping site</td>
  <td>Double</td>
  <td>1 Room</td>
  <td>$200</td>
  </tr>

  <tr>
  <td>Galoya glamping site</td>
  <td>Single</td>
  <td>1 Room</td>
  <td>$150</td>
  </tr>
</table>
    </div>
</div>

</body>
</html>