<?php
   $recordsPerPage = 1;
   
   $page = isset($_GET['page']) ? $_GET['page'] : 1;
   
   $startFrom = ($page - 1) * $recordsPerPage;
   
   if (isset($_POST['search'])) {
       $valueToSearch = $_POST['valueToSearch'];
   
       
       if ($valueToSearch === "1") {
           $query = "SELECT * FROM `courses`";
       } else {
           $query = "SELECT * FROM `courses` WHERE CONCAT(`id`, `head`, `eligibility`, `duration`) LIKE '%".$valueToSearch."%'";
       }
   
       $query .= " LIMIT $startFrom, $recordsPerPage";
   
       $search_result = filterTable($query);
   } else {
       $query = "SELECT * FROM `courses`";
   
     
       $query .= " LIMIT $startFrom, $recordsPerPage";
   
       $search_result = filterTable($query);
   }
   
   function filterTable($query)
   {
       $connect = mysqli_connect("localhost", "u355669643_ballamguri", "Craftmanship@2023", "u355669643_ballamguri");
       $filter_Result = mysqli_query($connect, $query);
       return $filter_Result;
   }
   ?>
<?php include("header.php");?>
      <!-- #header -->
      <!-- start banner Area -->
      <section class="banner-area relative about-banner" id="home">
         <div class="overlay overlay-bg"></div>
         <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
               <div class="about-content col-lg-12">
                  <h1 class="text-white">
                     Elements       
                  </h1>
                  <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="elements.php"> Attendance of Trainee</a></p>
               </div>
            </div>
         </div>
      </section>
      <section class="sample-text-area">
         <div class="container">
         <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
               <div class="title text-center">
                  <h1 class="mb-10">Attendance of Trainee</h1>
               </div>
            </div>
         </div>
         <form action="trainee2.php" method="post">
            <div class="default-select" id="default-select">
               <select name="valueToSearch" >
                  <option value="1">all</option>
                  <option value="fitter">fitter</option>
                  <option value="pump">pump</option>
               </select>
               <button type="submit" class="genric-btn success-border" name="search" value="Filter">filter</button>
            </div>
            <div class="whole-wrap">
               <div class="container">
                  <div class="section-top-border">
                     <h3 class="mb-30">Records</h3>
                     <div class="progress-table-wrap">
                        <div class="progress-table">
                           <div class="table-head">
                              <div class="serial">id</div>
                              <div class="country">Name of Trainee</div>
                              <div class="visit">eligibility</div>
                              <div class="percentage">duration</div>
                           </div>
                           <?php while($row = mysqli_fetch_array($search_result)):?>
                           <div class="table-row">
                              <div class="serial"><?php echo $row['id'];?></div>
                              <div class="country"><?php echo $row['head'];?></div>
                              <div class="visit"><?php echo $row['eligibility'];?></div>
                              <div class="percentage">
                                 <?php echo $row['duration'];?>
                              </div>
                           </div>
                           <?php endwhile;?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pagination">
                  <?php
                     $connect = mysqli_connect("localhost", "u355669643_ballamguri", "Craftmanship@2023", "u355669643_ballamguri");
                     $countQuery = "SELECT COUNT(*) as total FROM `courses`";
                     $countResult = mysqli_query($connect, $countQuery);
                     $row = mysqli_fetch_assoc($countResult);
                     $totalRecords = $row['total'];
                     
                     
                     $totalPages = ceil($totalRecords / $recordsPerPage);
                     
                     
                     
                     ?>
                  <nav class="blog-pagination justify-content-center d-flex">
                     <ul class="pagination">
                        <?php if ($page > 1) { ?>
                        <li class="page-item">
                           <a href="trainee2.php?page=<?= $page - 1 ?>" class="page-link" aria-label="Previous">
                           <span aria-hidden="true">
                           <span class="lnr lnr-chevron-left"></span>
                           </span>
                           </a>
                        </li>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                           <a class="page-link" href="trainee2.php?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                        <?php } ?>
                        <?php if ($page < $totalPages) { ?>
                        <li class="page-item">
                           <a href="trainee2.php?page=<?= $page + 1 ?>" class="page-link" aria-label="Next">
                           <span aria-hidden="true">
                           <span class="lnr lnr-chevron-right"></span>
                           </span>
                           </a>
                        </li>
                        <?php } ?>
                     </ul>
                  </nav>
               </div>
         </form>
         </div>
      </section>
      <!-- start footer Area -->        
      <footer class="footer-area section-gap">
         <div class="container">
            <div class="row">
               <div class="col-lg-2 col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                     <h4>Top Products</h4>
                     <ul>
                        <li><a href="#">Managed Website</a></li>
                        <li><a href="#">Manage Reputation</a></li>
                        <li><a href="#">Power Tools</a></li>
                        <li><a href="#">Marketing Service</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                     <h4>Quick links</h4>
                     <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                     <h4>Features</h4>
                     <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                     <h4>Resources</h4>
                     <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agencies</a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4  col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                     <h4>Newsletter</h4>
                     <p>Stay update with our latest</p>
                     <div class="" id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                           <div class="input-group">
                              <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
                              <div class="input-group-btn">
                                 <button class="btn btn-default" type="submit">
                                 <span class="lnr lnr-arrow-right"></span>
                                 </button>    
                              </div>
                              <div class="info"></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-bottom row align-items-center justify-content-between">
               <p class="footer-text m-0 col-lg-6 col-md-12">
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
               </p>
               <div class="col-lg-6 col-sm-12 footer-social">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-behance"></i></a>
               </div>
            </div>
         </div>
      </footer>
      <!-- End footer Area -->
      <script src="js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="js/vendor/bootstrap.min.js"></script>            
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
      <script src="js/easing.min.js"></script>          
      <script src="js/hoverIntent.js"></script>
      <script src="js/superfish.min.js"></script>   
      <script src="js/jquery.ajaxchimp.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>   
      <script src="js/jquery.tabs.min.js"></script>                     
      <script src="js/jquery.nice-select.min.js"></script>  
      <script src="js/owl.carousel.min.js"></script>                                    
      <script src="js/mail-script.js"></script> 
      <script src="js/main.js"></script>
   </body>
</html>
