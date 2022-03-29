<?php
include 'include/header.php';
$cuser = new auth();
$result = $cuser->select_holiday();

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
                                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">+ Add Event</button>
                                    </div>
                                </div>

                                
                            </div>
                            <table id="range-search" class="display table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                      <th>ID</th>
                                        <th>Event Name</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     foreach($result as $row)
                                     {
                                    ?>
                                    <tr>
                                        <td ><?php echo $row['id']?></td>
                                        <td style="color:green; font-weight:bold; font-size:large"><?php echo ucwords($row['event_name']) ?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td><?php echo $row['start_date']?></td>
                                        <td><?php echo $row['end_date']?></td>
                                        <td><?php
                                           if( $row['status']==1)
                                           {
                                            ?>
                                               <a href ="include/process.php?h_id=<?php echo $row['id']?>" class="btn btn-sm btn-info">Publish</a>
                                         
                                          <?php }  else
                                          {  ?>
                                             <a href="include/process.php?h_id=<?php echo $row['id']?>" class="btn btn-sm btn-secondary">Unpublish</a>
                                             <?php
                                           }
                                        ?></td>
                                        <td class="text-center"><a href="include/process.php?holiday_del=<?php echo $row['id'];?>" id="delete_btn" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                     }
                                     ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Event Name</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                          

                            <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">Add Holiday</h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="form_result"></span>
                    <form id="holiday" class="form-horizontal">

                            <div class="col-md-12 form-group">
                                <label>Event Name *</label>
                                <input type="text" name="event_name" id="event_name" required="" class="form-control" placeholder="Event Name">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div>


                            <div class="col-md-6 form-group">
                                <label>Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control date" value="" required="">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control date" value="" required="">
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="status" id="is_publish" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Category..." tabindex="-98">
                                        <option class="bs-title-option" selected disabled value="">Select Category...</option>
                                        <option value="1">published</option>
                                        <option value="2">unpublished</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="submit" name="holiday" class="btn btn-warning" value="Add">
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
             .com
            
            .com</div>
                            </div>
                            </div>
            </div>
<?php
include 'include/footer.php';
?>