<?php 
    include('../config.php');
?>
<?php 

//Check whether the SAVE button is clicked or not
if(isset($_POST['submit']))
{
    //echo "Button Clicked";
    //Get all the Values from Form
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $category = $_POST['category'];
    $list_id = $_POST['list_id'];
    $priority = $_POST['priority'];
    $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);
    $DueDate = mysqli_real_escape_string($conn, $_POST["DueDate"]); 
   
   
    $user_id=$_SESSION['userId'];
   
    //CReate SQL Query to INSERT DATA into DAtabase
    $sql2 = "INSERT INTO tbl_tasks (UserID, task_name, task_description,CategoryID, priority, deadline, DueDate) VALUES('$user_id', '$task_name', '$task_description', '$category', '$priority', '$deadline', '$DueDate')";
    
    //Execute Query
    mysqli_query($conn, $sql2);
   
           
    
    //Check whetehre the query executed successfully or not
  
        header('location:../home.php');
    
}

?>

<html>
    <head>
        <title>Task Manager with PHP and MySQL</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    
    <body>
    
        <div class="wrapper">
        
        <h1>TASK MANAGER</h1>
        
        <a class="btn-secondary" href="../home.php">Home</a>
        
        <h3>Add Task Page</h3>
        
        <form method="POST" action="">
            
            <table class="tbl-half">
                <tr>
                    <td>Task Name: </td>
                    <td><input type="text" name="task_name" placeholder="Type your Task Name" required="required" /></td>
                </tr>
                
                <tr>
                    <td>Task Description: </td>
                    <td><textarea name="task_description" placeholder="Type Task Description"></textarea></td>
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
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td>Deadline: </td>
                    <td><input type="date" name="deadline" /></td>
                </tr>
                <tr>
                    <td>Notification Date: </td>
                    <td><input type="time" name="DueDate" /></td>
                </tr>
                
                <tr>
                    <td><input  id="submit" class="btn-primary btn-lg" type="submit" name="submit" value="SAVE" /></td>
                </tr>
                
            </table>
            
        </form>
        
        </div>
    </body>
    
</html>




































