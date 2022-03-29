<?php
include 'include/header.php';
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
                <div class="card col-lg-12 col-md-12 col-sm-12">
                                 <div class="form-group row mr-3 mt-3 ml-1"> 
                                    <div class="col-sm-12">
                                       <a href="employee.php" class="btn btn-primary">Back To Table</a>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h3>Add Employee</h3>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="include/process.php" method="POST">
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="category">Employee Name</label>
                                                <input type="text" name="firstname" require="" class="form-control" id="tittle" placeholder="Enter Employee Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="category">Employee UserName</label>
                                                <input type="text" name="username" require="" class="form-control" id="tittle" placeholder="Enter Employee UserName">
                                            </div>
                                        </div>


                                        <div class="form-group mb-4">
                                            <label for="inputAddress">Email Address</label>
                                            <input type="email" name="email" required class="form-control" id="tittle" placeholder="Enter Employee Email">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="inputAddress">Employee Address</label>
                                            <input type="text" name="address" required class="form-control" id="tittle" placeholder="Enter Employee Address">
                                        </div>
                                       
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity">Employee City</label>
                                                <input type="text" name="city" required placeholder="Enter Employee City" class="form-control" id="inputCity" >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputCity">Employee Phone</label>
                                                <input type="number" name="phone" required class="form-control" placeholder="Enter Employee Phone No" id="inputCity">
                                            </div>

                                            <div class="form-group mb-4 col-lg-6 col-md-6">
                                            <label for="inputAddress">Employee Password</label>
                                            <input type="password" name="password" required class="form-control" id="tittle" placeholder="Enter Employee Password">
                                           </div>

                                            <div class="form-group col-lg-6 col-md-6">
                                                <label for="inputZip">Role</label>
                                                <select class="form-control" name="role">
                                                    <option  disabled selected>Choose Role</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Employee</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-8">
                                               
                                            </div>
                                        </div>
                            
                                      <input type="submit" class="btn btn-primary float-right mt-1" name="submit_employee" value="Publish Product">
                                    </form>
                            </div>
                        </div>

                </div>

            </div>
<?php
include 'include/footer.php';
?>