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
   /* $sql4='SELECT * FROM tbl_tasks WHERE  UserID ='.$user_id.' AND 
    task_name = '.$task_name.' AND
    task_description = '.$task_description.' AND
    priority = '.$priority.' AND
    deadline = '.$deadline.' AND
    DueDate = '.$DueDate.'';
    $res4 = mysqli_query($conn, $sql4);
    if ($res4) {
        $row = mysqli_fetch_assoc($res4);
        
        if ($row) {
            $task_id = $row['task_id'];
            }}*/
            $task_id=$conn->insert_id;

    if($list_id==""){
        $list_id=NULL;

    }
    else{
        $sql3 = 'INSERT INTO contient SET 
        task_id ='.$task_id.',
        list_id = '.$list_id.'
    ';
    $res3 = mysqli_query($conn, $sql3);
    }
    
    //Check whetehre the query executed successfully or not
  
        header('location:../home.php');
    
}

?>

<html>
    <head>
        <title>Add Task</title>
        <link rel="stylesheet" href="../css/style.css" />
    </head>
    
    <body>
    
        <div class="wrapper">
        
        <h1>TASK MANAGER</h1>
        
        <a class="btn-secondary" href="../home.php">Home</a>
        
        <h3>Add Task Page</h3>
        
        <p>
            <?php 
            
                if(isset($_SESSION['add_fail']))
                {
                    echo '<p>'.$_SESSION['add_fail'].'</p>';
                    unset($_SESSION['add_fail']);
                }
            
            ?>
        </p>
        
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
                    <td>Select List: </td>
                    <td>
                    
                        <select name="list_id">
                            <option value=""></option>
                            <?php 
                                
                                
                                //SQL query to get the list from table
                                $user_id=$_SESSION["userId"];
                                $sql = "SELECT * FROM tbl_lists where UserID = '$user_id'";
                                
                                //Execute Query
                                $res = mysqli_query($conn, $sql);
                                
                                //Check whether the query executed or not
                                if($res==true)
                                {
                                    //Create variable to Count Rows
                                    $count_rows = mysqli_num_rows($res);
                                    
                                    //If there is data in database then display all in dropdows else display None as option
                                    if($count_rows>0)
                                    {
                                        //display all lists on dropdown from database
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $list_id = $row['list_id'];
                                            $list_name = $row['list_name'];
                                            ?>
                                            <option value="<?php echo $list_id ?>"><?php echo $list_name; ?></option>
                                            <?php
                                        }
                                    }
                                   
                                    
                                }
                            ?>
                        
                            
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


<?php 

    //Check whether the SAVE button is clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the Values from Form
        $task_name = $_POST['task_name'];
        $task_description = $_POST['task_description'];
        $list_id = $_POST['list_id'];
        $priority = $_POST['priority'];
        $deadline = $_POST['deadline'];
        $DueDate = $_POST['DueDate'];
        
       
        //CReate SQL Query to INSERT DATA into DAtabase
        $sql2 = "INSERT INTO tbl_tasks SET 
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = $list_id,
            priority = '$priority',
            deadline = '$deadline',
            DueDate = $DueDate;
        ";
        
        //Execute Query
        $res2 = mysqli_query($conn, $sql2);
        
        //Check whetehre the query executed successfully or not
        if($res2==true)
        {
            //Query Executed and Task Inserted Successfully
            $_SESSION['add'] = "Task Added Successfully.";
            
            //Redirect to Homepage
            header('location:index.php');
            
        }
        else
        {
            //FAiled to Add TAsk
            $_SESSION['add_fail'] = "Failed to Add Task";
            //Redirect to Add TAsk Page
            header('location:add-task.php');
        }
    }

?>




































