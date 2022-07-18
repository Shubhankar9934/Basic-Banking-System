<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>users</title>
        <?php include"header.php"; ?>
    </head>
    <body>
    <div class="mh">
<?php
    $id=$_GET['id'];
    include "conn.php";
    $sql="SELECT * FROM customers WHERE id={$id}";
    $result=mysqli_query($conn,$sql) or die("Query failed");
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        ?>
        
        <table class="col-l-6 col-m-6 col-s-8 col-xs-10 sutab">
            <tr>
                <td>Name</td>
                <td><?php echo $row['name']; ?></td>
            </tr>
            <tr>
                <td>Unique No</td>
                <td><?php echo $row['id']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td>Balance</td>
                <td><?php echo $row['bal']; ?></td>
            </tr>
        </table>
        <a href="transfer.php?id=<?php echo $row['id'] ?>"><div class="transfer-btn">Transfer Money</div></a>

        <?php
    }else{
        echo "somthing went wrong...";
    }

    echo "</div>";
     include "footer.php" ;

?>
</body>
</html>
