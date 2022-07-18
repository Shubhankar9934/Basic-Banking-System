<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BASIC BANKING SYSTEM @GRF</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/utils.css">
   <?php include"header.php"; 
         include"conn.php";    
    ?>
</head>
<body>
<div class="mh">
    <div class="card_container">
        <a href="users.php"><diV class="col-l-4 col-m-6 col-s-6 col-xs-12 card-shell"><div  class="card"><div class="text">View All Users</div></div></div></a>
        <a href="users.php"><diV class="col-l-4 col-m-6 col-s-6 col-xs-12 card-shell"><div  class="card"><div class="text">Transfer Money</div></div></div></a>
        <a href="tranjuction_history.php"><diV class="col-l-4 col-m-6 col-s-6 col-xs-12 card-shell"><div  class="card"><div class="text">Transaction History</div></div></div></a>
    </div>
</div>
    <?php include "footer.php" ?>
</body>


</html>