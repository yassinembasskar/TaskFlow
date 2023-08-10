<?php 
    include('../config.php');
    
    //Check the Task ID in URL
    
    if(isset($_GET['task_id']))
    {
        //Get the Values from DAtabase
        $task_id = $_GET['task_id'];
       
        
        //SQL Query to Get the detail of selected task
        $sql = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //Check if the query executed successfully or not
        if($res==true)
        {
            //Query <br />Executed
            $row = mysqli_fetch_assoc($res);
            
            //Get the Individual Value
            $task_name = $row['task_name'];
            $task_description = $row['task_description'];
            
            $priority = $row['priority'];
            $deadline = $row['deadline'];
            $DueDate = $row['DueDate'];
        }
    }
    else
    {
        //Redirect to Homepage
        header("location:../home.php");
    }
?>

<html>
    <head>
        <title>Update Task</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    
    <body>
        
        <div class="wrapper">
        
        <h1>TASK MANAGER</h1>
        
        <p>
            <a class="btn-secondary" href="../home.php">Home</a>
        </p>
        
        <h3>Update Task Page</h3>
        
       
        
        <form method="POST" action="">
        
            <table class="tbl-half">
                <tr>
                    <td>Task Name: </td>
                    <td><input type="text" name="task_name" value="<?php echo $task_name; ?>" required="required" /></td>
                </tr>
                
                <tr>
                    <td>Task Description: </td>
                    <td>
                        <textarea name="task_description"><?php echo $task_description; ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <option value="1">To Do</option>
                            <option value="2">Doing</option>
                            <option value="3">Done</option>
                        </select>
                    </td>
                </tr>
                
                
                <tr>
                    <td>Priority: </td>
                    <td>
                        <select name="priority">
                            <option <?php if($priority=="High"){echo "selected='selected'";} ?> value="High">High</option>
                            <option <?php if($priority=="Medium"){echo "selected='selected'";} ?> value="Medium">Medium</option>
                            <option <?php if($priority=="Low"){echo "selected='selected'";} ?> value="Low">Low</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Deadline: </td>
                    <td><input type="date" name="deadline" value="<?php echo $deadline; ?>" /></td>
                </tr>

                <tr>
                    <td>Notification Date: </td>
                    <td><input type="time" name="DueDate" value="<?php echo $DueDate; ?>" /></td>
                </tr>
                
                <tr>
                    <td><input class="btn-primary btn-lg" type="submit" name="submit" value="UPDATE" /></td>
                </tr>
                
            </table>
        
        </form>
        </div>
    </body>
</html>


<?php 

    //Check if the button is clicked
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        
        //Get the CAlues from Form
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $categoryID = $_POST['category'];
        $priority = $_POST['priority'];
        $deadline = $_POST['deadline'];
        $DueDate = $_POST['DueDate'];
        
     
        
        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE tbl_tasks SET 
        task_name = '$task_name',
        task_description = '$task_description',
        categoryID = '$categoryID',
        priority = '$priority',
        deadline = '$deadline',
        DueDate = '$DueDate'
        WHERE 
        task_id = $task_id
        ";
        
        //Execute Query
        $res3 = mysqli_query($conn, $sql3);
        
        //CHeck whether the Query Executed of Not
        if($res3==true)
        {
            //Query Executed and Task Updated
            $_SESSION['update'] = "Task Updated Successfully.";
            
            //Redirect to Home Page
            header("location:../home.php");
        }
        else
        {
            //FAiled to Update Task
            $_SESSION['update_fail'] = "Failed to Update Task";
            
            //Redirect to this Page
            header("location:../home.php?task_id=.$task_id");
        }
        
        
    }

?>









































