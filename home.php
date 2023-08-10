<?php 
    include('config.php');
?>

<html>

    <head>
        <title>Task MANAGER</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    
    <body>
    
    <div class="wrapper">
    
    <h1>TASK MANAGER</h1>
    
    
    <!-- Menu Starts Here -->
    <div class="menu">
        <a href="index.php">Home</a>
        <a href="manage-list.php">Manage Lists</a>
    </div>
    <!-- Menu Ends Here -->
    
    <!-- Tasks Starts Here -->
    
    
    <div class="all-tasks">
        
        <a class="btn-primary" href="actions/add-task.php">Add Task</a>
        
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
                $sql = "SELECT * FROM tbl_tasks WHERE UserID=".$_SESSION['userId']."" ;
                
                //Execute Query
                $res = mysqli_query($conn, $sql);
                
                //CHeck whether the query execueted o rnot
                if($res==true)
                {
                    //DIsplay the Tasks from DAtabase
                    //Dount the Tasks on Database first
                    $count_rows = mysqli_num_rows($res);
                    
                    //Create Serial Number Variable
                    $sn=1;
                    
                    //Check whether there is task on database or not
                    if($count_rows>0)
                    {
                        //Data is in Database
                        while($row=mysqli_fetch_assoc($res))
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
                                    <a href="actions/update-task.php?task_id=<?php echo $task_id; ?>">Update </a>
                                    
                                    <a href="actions/delete-task.php?task_id=<?php echo $task_id; ?>">Delete</a>
                                
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
            
            
        
        </table>
    
    </div>
    
    <!-- Tasks Ends Here -->
    </div>
    </body>

</html>