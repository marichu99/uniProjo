<?php 
    $conn=mysqli_connect("localhost","root","");
    // select the db
    mysqli_select_db($conn,"farmer");

    if(isset($_SESSION["Username"])){
        $userName=$_SESSION["Username"];
    }
    // results array
    $resArr=  array();
    // query all the logs
    $sql="select * from logs";
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $numResult=mysqli_num_rows($res);
    while($rows=mysqli_fetch_assoc($res)){
        // update the results array
        array_push($resArr,$rows);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dash.css">
</head>
<body>
    <div class="header-deets">
        <div class="acc-details">
            <span class="acc-span-deets">Sold:</span>
        </div>
        <div class="acc-details">
            <span class="acc-span-deets">Bought:</span>
        </div>
        <div class="acc-details">
            <span class="acc-span-deets">Totals:</span>
        </div>
    </div>
    <div class="sectionDeets">
    <h3>Recent Activity</h3>
    </div>
    <div class="recentContainer">
    <table class="myTable">
                <tr>
                    <th>Log ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    <th>TimeStamp</th>
                </tr>
                <?php 
                    $iterations=0;
                    if(isset($res)){
                        while($iterations<$numResult){
                ?>
                <tr>
                    <td><?php echo $resArr[$iterations]["LogID"]?></td>
                    <td><?php echo $resArr[$iterations]["UserName"]?></td>
                    <td><?php echo $resArr[$iterations]["userID"]?></td>
                    <td><?php echo $resArr[$iterations]["action"]?></td>
                    <td><?php echo $resArr[$iterations]["timeStamp"]?></td>
                </tr>
                <?php 
                        $iterations=$iterations+1;
                        }
                    }   
                ?>
                
        </table>
    </div>
    <div class="recentContainer">
        <table class="myTable">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>
    </div>
    
</body>
</html>