<?php 

include('config.php');
if(isset($_GET['list_id']))
{
    //Get the List ID value
    $list_id = $_GET['list_id'];
    
    $user_id = $_SESSION['userId'];
    //Query to Get the Values from Database
    $sql = "SELECT * FROM tbl_lists WHERE list_id=$list_id and UserID = $user_id";
    
    //Execute Query
    $res = mysqli_query($conn, $sql);

    
    //CHekc whether the query executed successfully or not
    if(mysqli_num_rows($res)==1)
    {
        $row = mysqli_fetch_assoc($res); 
        $list_name = $row['list_name'];
    } else {
        header('location: manage-list.php');
    }
}
if(isset($_POST['add_task'])){
    $task_id = $_POST['tasks'];
    $insert = "INSERT INTO contient (task_id, list_id) VALUES('$task_id','$list_id')";
    mysqli_query($conn, $insert);
}
if(isset($_POST['delete_task'])){
    $task_id = $_POST['taskID'];
    $delete = "DELETE FROM contient WHERE task_id = $task_id and list_id = $list_id";
    mysqli_query($conn, $delete);
}
?>

<html>
    <head>
        <title>Lists</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    
    <body>
        
        <div class="wrapper">
        
        <h1>TASK MANAGER</h1>
        
        
        <a class="btn-secondary" href="home.php">Home</a>
        
        <h3><?php echo $list_name ?></h3>
        
        <!-- Table to display lists starts here -->
        <div class="all-tasks">
        
        <table class="tbl-full">
        
            <tr>
                <th>S.N.</th>
                <th>Task Name</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Deadline</th>
                <th>DueDate</th>
                <th>Actions</th>
            </tr>
            
            <?php 
            
              
                
                //Create SQL Query to Get DAta from Databse
                $sql2 = "SELECT * FROM contient
                JOIN tbl_tasks
                ON contient.task_id = tbl_tasks.task_id
                WHERE list_id = $list_id;";
    
                //Execute Query
                $res2 = mysqli_query($conn, $sql2);
                
                //CHeck whether the query execueted o rnot
                if($res2==true)
                {
                    //DIsplay the Tasks from DAtabase
                    //Dount the Tasks on Database first
                    $count_rows = mysqli_num_rows($res2);
                    
                    //Create Serial Number Variable
                    $sn=1;
                    
                    //Check whether there is task on database or not
                    if($count_rows>0)
                    {
                        //Data is in Database
                        while($row=mysqli_fetch_assoc($res2))
                        {
                            $task_id = $row['task_id'];
                            $task_name = $row['task_name'];
                            $task_description = $row['task_description'];
                            $priority = $row['priority'];
                            $deadline = $row['deadline'];
                            $DueDate = $row['DueDate'];
                            ?>
                            
                            <tr>
                                <td><?php echo $sn++; ?>. </td>
                                <td><?php echo $task_name; ?></td>
                                <td><?php echo $task_description; ?></td>
                                <td><?php echo $priority; ?></td>
                                <td><?php echo $deadline; ?></td>
                                <td><?php echo $DueDate; ?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="taskID" value="<?php echo $task_id?>">
                                        <input class="btn-primary" type="submit" name="delete_task" value="Delete" >
                                    </form>
                                </td>
                            </tr>
                            
                            <?php
                        }
                    }
                    else
                    {
                        //No data in Database
                        ?>
                        
                        <tr>
                            <td colspan="7">No Task Added Yet.</td>
                        </tr>
                        
                        <?php
                    }
                }
            
            ?>
            <tr>
                <form action="" method="POST">
                <td colspan="6">
                    <select name="tasks">
                        <?php
                            $sql3 = "SELECT * FROM tbl_tasks";
                            $res3 = mysqli_query($conn, $sql3);
                            while($row=mysqli_fetch_assoc($res3)){
                                $task_id = $row['task_id'];
                                $task_name = $row['task_name'];
                                $sql4 = "SELECT * FROM contient WHERE task_id=$task_id and list_id=$list_id";
                                $res4 = mysqli_query($conn, $sql4);
                                if(!mysqli_num_rows($res4)>0){
                                    echo '<option value="'.$task_id.'">'.$task_name.'</option>';
                                }
                            }
                        ?>
                    </select>
                </td>
                <td>
                        <input class="btn-primary" type="submit" name="add_task" value="ADD" >
                </td>
                </form>
            </tr>
            
            
        
        </table>
    </div>
        </div>
    </body>
</html>