<?php 

include('config.php');

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
        
        <h3>Manage Lists Page</h3>
        
        <!-- Table to display lists starts here -->
        <div class="all-lists">
            
            <a class="btn-primary" href="actions/add-list.php">Add List</a>
            
            <table class="tbl-half">
                <tr>
                    <th>S.N.</th>
                    <th>List Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                
                <?php 
                
                    $user_id = $_SESSION['userId'];
                    $sql = "SELECT * FROM tbl_lists WHERE UserID = $user_id";
                    $res = mysqli_query($conn, $sql);
                    
                    //CHeck whether the query executed executed successfully or not
                    if($res)
                    {
                        $count_rows = mysqli_num_rows($res);
                        $sn = 1;
                        
                        if($count_rows>0)
                        {
                            
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $list_id = $row['list_id'];
                                $list_name = $row['list_name'];
                                $list_description = $row['list_description'];
                ?>
                                
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><a style="color:black;'" href="list_tasks.php?list_id=<?php echo $list_id;?>"><?php echo $list_name; ?></a></td>
                                    <td><?php echo $list_description; ?></td>
                                    <td>
                                        <a href="actions/update-list.php?list_id=<?php echo $list_id; ?>">Update</a> 
                                        <a href="actions/delete-list.php?list_id=<?php echo $list_id; ?>">Delete</a>
                                    </td>
                                </tr>
                                
                <?php
                                
                            }
                            
                            
                        }
                        else
                        {
                            //No Data in Database
                            ?>
                            
                            <tr>
                                <td colspan="4">No List Added Yet.</td>
                            </tr>
                            
                            <?php
                        }
                    }
                
                ?>
                
                
            </table>
            
        </div>
        </div>
    </body>
</html>