<?php
include("delete_modal.php");

if(isset($_POST['delete'])) {
    UserManager::deleteUser($_POST['u_tc']);
}
if(isset($_POST['checkBoxArray'])) {
    foreach($_POST['checkBoxArray'] as $tc) {
        $bulk_option = $_POST['bulk_options'];
        switch($bulk_option) {
            case 'Admin':
                $query = "UPDATE users SET userRole = Admin WHERE tc = $tc ";
                $update_to_Published_status = mysqli_query($connection, $query);
                break;
            case 'Patient':
                $query = "UPDATE users SET userRole = Patient WHERE tc = $tc ";
                $update_to_Draft_status = mysqli_query($connection, $query);
                break;
            case 'Delete':
                $query = "DELETE FROM users WHERE tc = $tc ";
                $delete_post_query = mysqli_query($connection, $query);
                break;
            default:
                echo "Olmadı" . "." . $bulk_option. "." . " asdad";
                break;
        }
    }
}
?>               
                <form action="users.php" method="post">
                    <table class="table table-bordered table-hover">
                       
                        <div id="bulkOptionsContainer" class="col-xs-4">
                            <select class="form-control" name="bulk_options" id="">
                                <option value="">Select Options</option>
                                <option value="Admin">Admin</option>
                                <option value="Patient">Patient</option>
                                <option value="Delete">Delete</option>
                            </select>
                        </div>
                        
                        <div class="col-xs-4" id="option">
                            <input type="submit" name="submit" class="btn btn-success" value="Apply">
                            <a class="btn btn-primary" href="../register.php">Add New</a>
                        </div>
                        
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAllBoxes">All</th>
                                <th>T.C.</th>
                                <th>First Name</th>
                                <th>Surname</th>
                                <th>Birth Date</th>
                                <th>Email</th>
                                <th>Telephone Number</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Blood Type</th>
                                <th>User Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                               <?php
                                $userList = UserManager::getAllUsers();
                                
                                for($i = 0; $i < count($userList); $i++) {                                    
                                    echo "<tr>";
                                    ?>
                <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $userList[$i]->getTc(); ?>'></td>
                                    <?php
                                    echo "<td>{$userList[$i]->getTc()}</td>";
                                    echo "<td>{$userList[$i]->getFirstName()}</td>"; 
                                    echo "<td>{$userList[$i]->getSurName()}</td>";
                                    echo "<td>{$userList[$i]->getBirthDate()}</td>";
                                    echo "<td>{$userList[$i]->getEmail()}</td>";
                                    if($userList[$i]->getTel() == NULL)
                                        echo "<td>Null</td>";
                                    else
                                        echo "<td>{$userList[$i]->getTel()}</td>";
                                    
                                    if($userList[$i]->getAddress() == NULL)
                                        echo "<td>Null</td>";
                                    else
                                        echo "<td>{$userList[$i]->getAddress()}</td>";
                                    
                                    if($userList[$i]->getGender() == NULL)
                                        echo "<td>Null</td>";
                                    else
                                        echo "<td>{$userList[$i]->getGender()}</td>";
                                    
                                    if($userList[$i]->getBloodType() == NULL)
                                        echo "<td>Null</td>";
                                    else
                                        echo "<td>{$userList[$i]->getBloodType()}</td>";
                                    
                                    echo "<td>{$userList[$i]->getUserRole()}</td>";
                                    echo "<td><a class='btn btn-info' href='users.php?source=edit_user&u_tc={$userList[$i]->getTc()}'>Edit</a></td>";
                                    echo "<input type='hidden' name='u_tc' value='{$userList[$i]->getTc()};'>";
                                    ?>
                                    <form method="post">
                                        <input type="hidden" name="u_tc" value="<?php echo $userList[$i]->getTc();?>">
                                        <?php
                                            echo "<td><input class='btn btn-danger delete_link' type='submit' name='delete' value='Delete'></td>";
//                                            
                                        ?>
                                    </form>
                                    <?php
//                                  <a href='javascript:void(0)' rel='{$userList[$i]->getTc()}' class='delete_link btn btn-danger'>Delete</a>    
                                    echo "</tr>";
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <script>
                $(document).ready(function(){
                    $(".delete_link").on('click', function(){
                        $("#myModal").modal('show');
                    });
                });
                </script>