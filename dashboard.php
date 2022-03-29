]<?php
include 'include/header.php';
$cuser = new auth();
$result = $cuser->select_users();

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
        <div style="height: 50vh;" class="anotherDiv d-flex justify-content-around align-items-center">
            <div class="card" style="width: 16rem;">
            <?php 
                               
                                $countemployee = $cuser->totalemployee();
                                $countpresent = $cuser->presentemployee();
                                $countabsent = $cuser->absentemployee();
                                $counthalfleave = $cuser->halfleaveemployee();
            ?>
                <div class="card-body bg-light text-center">
                    <h5 class="card-title text-primary">Total Employee</h5>
                    <h5 class="card-title"><?php echo $countemployee?></h5>
                    <span class="text-primary"><i class="fas fa-4x fa-chart-pie"></i></span><br><br>
                    <a href="allusers.php" class="btn btn-primary">Go</a>
                </div>
            </div>
            <div class="card"  style="width: 16rem;">
                <div class="card-body bg-light text-center">
                    <h5 class="card-title text-success">Present Employee</h5>
                    <h5 class="card-title"><?php echo $countpresent?></h5>
                    <span class="text-success"><i class="fas fa-4x fa-chart-line"></i></span><br><br>
                    <a href="attendence.php" class="btn btn-success">Go</a>
                </div>
            </div>
            <div class="card" style="width: 16rem;">
                <div class="card-body bg-light text-center">
                    <h5 class="card-title text-danger">Absent Employee</h5>
                    <h5 class="card-title"><?php echo $countabsent?></h5>
                    <span class="text-danger"><i class="fas fa-4x fa-times"></i></span><br><br>
                    <a href="attendence.php" class="btn btn-danger">Go</a>
                </div>
            </div>

             <div class="card" style="width: 16rem;">
                <div class="card-body bg-light text-center">
                    <h5 class="card-title text-danger">HalfLeave Employee</h5>
                    <h5 class="card-title"><?php echo $counthalfleave?></h5>
                    <span class="text-danger"><i class="fas fa-4x fa-times"></i></span><br><br>
                    <a href="attendence.php" class="btn btn-danger">Go</a>
                </div>
            </div>
        </div>    
        
       <!--  <div class="anotherDiv d-flex justify-content-around align-items-center pb-4">
            <div class="card" style="width: 18rem;">
            <?php 
                                $cuser = new auth();
                                $CountReviews = $cuser->CountReviews();
                                $CountUserQuestions = $cuser->CountUserQuestions();
                                $CountProducts = $cuser->CountProducts();
            ?>
                <div class="card-body bg-light text-center">
                    <h5 class="card-title text-warning">Review Comments</h5>
                    <h5 class="card-title"><?php echo $CountReviews?></h5>
                    <span class="text-warning"><i class="fas fa-4x fa-star"></i></span><br><br>
                    <a href="review.php" class="btn btn-warning">Go</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body bg-light text-center">
                    <h5 class="card-title text-success">User Questions</h5>
                    <h5 class="card-title"><?php echo $CountUserQuestions?></h5>
                    <span class="text-success"><i class="fas fa-4x fa-question"></i></span><br><br>
                    <a href="user_questions.php" class="btn btn-success">Go</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <div class="card-body bg-light text-center">
                    <h5 class="card-title text-info">Products</h5>
                    <h5 class="card-title"><?php echo $CountProducts?></h5>
                    <span class="text-info"><i class="fas fa-4x fa-boxes"></i></span><br><br>
                    <a href="product.php" class="btn btn-info">Go</a>
                </div>
            </div>
        </div> --> 
    </div>
       
        <!-- END CONTENT AREA -->
            <?php
             include 'include/footer.php';
            ?>