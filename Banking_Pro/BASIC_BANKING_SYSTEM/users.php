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
            include "conn.php";
            $sql="SELECT * FROM customers";
            $result=mysqli_query($conn,$sql) or die("Query Fail");
            if(mysqli_num_rows($result)>0){
               echo" <table>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Balance</th>
                        <th>View</th>
                    </tr>";
                while($row=mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['bal']; ?></td>
                        <td class="view"><a href='user.php?id=<?php echo $row['id'] ?>'>📰</a></td>
    
                    </tr>
                    <?php
                }
                echo "</table>";
            }
            else{

            }
            mysqli_close($conn);
        ?>
        <!--<table>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Balance</th>
            </tr>
            <tr>
                <th>1</th>
                <th>pranoy patra</th>
                <th>pranoypatra11719999study@gmail.com</th>
                <th>200000</th>
            </tr>
        </table>-->
        </div>
    <?php include "footer.php" ?>

    </body>
</html>