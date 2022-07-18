<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>users</title>
        <?php include"header.php"; ?>
    </head>
    <body>
    <div class="mh">
        <!--
            SELECT t.no,t.amount,t.time,c1.name,c2.name
            FROM transfers t
            INNER JOIN 	customers c1
            ON (t.s_id=c1.id)
            INNER JOIN 	customers c2
            ON (t.r_id=c2.id);
        -->

        <?php
            include "conn.php";

            $sql="SELECT t.no,t.amount,t.time,c1.name n1,c2.name n2
            FROM transfers t
            INNER JOIN 	customers c1
            ON (t.s_id=c1.id)
            INNER JOIN 	customers c2 
            ON (t.r_id=c2.id) 
            ORDER BY t.no DESC;";


            $result=mysqli_query($conn,$sql) or die("Query Fail");
            if(mysqli_num_rows($result)>0){
               echo" <table>
                    <tr>
                        <th>tr no</th>
                        <th>Sender</th>
                        <th>Reciever</th>
                        <th>Amount</th>
                        <th>Time</th>
                    </tr>";
                while($row=mysqli_fetch_assoc($result)){
                    ?>

                    <tr>
                        <td><?php echo $row['no']; ?></td>
                        <td><?php echo $row['n1']; ?></td>
                        <td><?php echo $row['n2']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['time']; ?></td>
                    </tr>
                    <?php
                }
                echo "</table>";
            }
            else{

            }
            mysqli_close($conn);
        ?>
        </div>
    <?php include "footer.php" ?>

    </body>
</html>