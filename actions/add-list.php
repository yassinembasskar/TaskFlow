<?php 
    include('../config.php');

    if(isset($_POST['submit']))
    {
        $list_name = $_POST['list_name'];
        $list_description = $_POST['list_description'];
        
        $userID = $_SESSION["userId"];
        $sql = "INSERT INTO tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description',
            UserID = '$userID'";
        
        //Execute Query and Insert into Database
        mysqli_query($conn, $sql);
    
        header("location:../manage-list.php");
    }

?>

<html>
    <head>
        <title>Add List</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    
    <body>
        
        <div class="wrapper">
    
        <h1>TASK MANAGER</h1>
        
        <a class="btn-secondary" href="../home.php">home</a>
        
        
        <h3>Add List Page</h3>
        
        <!-- Form to Add List Starts Here -->
        
        <form method="POST" action="">
            
            <table class="tbl-half">
                <tr>
                    <td>List Name: </td>
                    <td><input type="text" name="list_name" placeholder="Type list name here" required/></td>
                </tr>
                <tr>
                    <td>List Description: </td>
                    <td><textarea name="list_description" placeholder="Type List Description Here"></textarea></td>
                </tr>
                
                <tr>
                    <td><input class="btn-primary btn-lg" type="submit" name="submit" value="SAVE" /></td>
                </tr>
                
            </table>
            
        </form>
        </div>
    </body>
</html>
