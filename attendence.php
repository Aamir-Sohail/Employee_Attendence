<?php
include 'include/header.php';
$cuser = new auth();
$result = $cuser->select_attendence();
?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
<?php 
include 'include/sidebar.php';
?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">
                    
                <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-form">
                                <div class="form-group row mr-3">
                                <div class="col-sm-12">
                                       <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
                                    </div>
                                </div>

                                
                            </div>
                            <table id="range-search" class="display table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Attendence Time</th>
                                        <th>Attendence Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     foreach($result as $row)
                                     {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['firstname']?></td>
                                        <td><?php echo $row['username']?></td>      
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['login_time']?></td>
                                        <td><?php
                                           if( $row['status'] == 1)
                                           {
                                               echo '<button class="btn btn-sm btn-info">Present</button>';
                                           }elseif($row['status'] ==2){
                                               echo'<button class="btn btn-sm btn-secondary"> Half Leave</button>';
                                           }
                                           
                                           else{
                                            echo '<button class="btn btn-sm btn-danger">Absent</button>';
                                           }
                                        ?></td>
                                        <td class="text-center"><a href="include/process.php?attendence_del=<?php echo $row['id'];?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                     }
                                     ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Attendence Time</th>
                                        <th>Attendence Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
<?php
include 'include/footer.php';
?>