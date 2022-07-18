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
if(isset($_GET['id']))
    $id=$_GET['id'];
else
    $id=$_POST['sender'];

    $bal=0;
    include "conn.php";
    $sql="SELECT customers.name, customers.bal FROM customers WHERE id={$id}";
    $result=mysqli_query($conn,$sql) or die("Query failed");
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $bal=$row['bal'];
        ?>
        
        <div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"  autocomplete="off">
        <input type="hidden" name="sbal" value="<?php echo $bal;?>"></input>
            <input type="hidden" name="sender" value="<?php echo $id;?>"></input>
            <div>Sender :&nbsp;&nbsp;&nbsp; <?php echo " ".$row['name']." ( ";echo $id." )";?></div>
            <span>Reciever :</span>
            <!--load reameanning names in select tag-->
            <?php
            $sql="SELECT c.name,c.id FROM customers c WHERE id!={$id}";
            $result=mysqli_query($conn,$sql) or die("Query failed");
            if(mysqli_num_rows($result)>0){
                echo "<select  name='reciever'>";
                while($row=mysqli_fetch_assoc($result)){
                ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']." ( ".$row['id']." )" ?></option>
                <?php
                }
                echo "</select>";
            }else{
                echo "somthing went wrong...";
            }
        ?>
            <div>Amount :&nbsp; <input type="number" name="tamount"></input></div>
        </div>
            <!--end-->
        
            <input type="submit" name="submit" class="transfer-btn" value="Transfer" >
    </form>
        <?php
    }else{
        echo "somthing went wrong...";
    }
    if(isset($_POST['submit']))
    {
        if($_POST['tamount']>$_POST['sbal'])
        {
            //show amount not sufficient
        }else{
            include "conn.php";
            $sql1="SELECT bal FROM customers WHERE id={$_POST['reciever']}";
            $result=mysqli_query($conn,$sql1) or die("tranjuction failed");
            $row=mysqli_fetch_assoc($result);
            $rmoney=$row['bal']+$_POST['tamount'];
            $bal=$_POST['sbal']-$_POST['tamount'];
            $ts=date("Y-m-d H:i:s");
            //tranjuction table
            $sql="INSERT INTO transfers (s_id , r_id , amount , time )
                  VALUES ({$_POST['sender']},{$_POST['reciever']},{$_POST['tamount']},'{$ts}');";
            $result=mysqli_query($conn,$sql) or die("tranjuction failed");
            $sql="UPDATE customers
                  SET bal={$bal} WHERE id={$_POST['sender']}";
            $result=mysqli_query($conn,$sql) or die("tranjuction failed");
           $sql="UPDATE customers
                  SET bal={$rmoney} WHERE id={$_POST['reciever']}";
            $result=mysqli_query($conn,$sql) or die("money debited but reciever may not recieve it...Contact Bank");
            
            echo '<script type="text/javascript">
                   window.onload = function () { alert("Tranjuction Sucessful"); } 
            </script>'; 
  
            
        }
    }
?>
    </div>
    <?php include "footer.php" ?>
</body>
</html>
