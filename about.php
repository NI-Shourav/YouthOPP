<?php 

include ('connectDB/config.php');


    $sql = "SELECT * from post ORDER by post_id DESC LIMIT 0,10";

    $result = mysqli_query($conn, $sql); // get the result set (set of rows)

    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetch the resulting rows as an array

?>
<!-- for posted opportunity-->
<!DOCTYPE html>
<!-- Path: post.html -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Yotunities | About Us</title>
        <link rel="stylesheet" href="about.css">
        <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      </head>
      <body>
<!-- navbar-->
<div class="wrapper">
  <header>
      <div class="logo">
          <a href="index.html"><img src="icons/opportunity.png" alt=""></a>
      </div>
      <nav>
      <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="main.php">Back</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
      </nav>
  </header>
</div>

<!-- main body-->

<!-- post an opportunity title -->
<div class="container-fluid post-margin bg-header">
  <div class="row">
    <div class="col-md-12 mt-4 mb-0">
      <h1 class="text-left t-blue mb-4 ">About Us!</h1>
    </div>
  </div>
  </div>

<!-- about us -->
<div class="d-inline-flex t-white post-margin">
    <div class="container-fluid display-flex">
        <h5> Yotunities is the biggest platform for finding new opportunities for youth. We are a team of young people who are passionate about helping young people to find opportunities that will help them to grow and develop their skills. We are here to help you to find the right opportunity for you.</h5>
    </div>





    <div class="sidebar sidebar-main col-sm-3 sidebar-right">
      <div class="inner-content widgets-container">
          
        <h4 class="widget-title m-lg-4 t-orange">Trending</h4>
        <div class="widget-content">
          <ul class="trending-posts">

            <?php foreach($arr as $arrData){ ?>
                  <li>
                    <div class="post-info">
                      <h5 class="entry-title"><a href="<?php echo htmlspecialchars($arrData['appliedLink']); ?>"><?php echo $arrData['title']; ?></a></h5>
                      <div class="post-meta">
                        <span class="post-date "><b>Deadline: <?php echo $arrData['eDate']; ?> </b></span>
                      </div>
                  </div>
                  </li>
              <?php } ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- footer -->
<?php 
        include 'footer.php';
      ?>







<!-- footer -->
<!-- <div id="footer">
    <footer class="bg-black page-footer font-small blue pt-4">
      <div class="container-fluid text-center text-md-left">
        <div class="row">
          <div class="col-md-6 mt-md-0 mt-3">
            <h5 class="t-orange text-uppercase">About Us</h5>
            <h5 class="text-uppercase text-bg-light t-color">Yotunities</h5>
            <p class="text-white">We are a group of students from the University of the Immaculate Conception and passionate about opportunities and want to help others find them.</p>
          </div>
          <hr class="clearfix w-100 d-md-none pb-3">
          <div class="col-md-3 mb-md-0 mb-3">
            <h5 class="text-uppercase t-orange">Links</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 mb-md-0 mb-3">
            <h5 class="text-uppercase t-orange">Contact Us:</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="text-white footer-copyright text-center py-3">© 2022 Copyright: All Rights Reserved || Yotunities Team
      </div>
      </footer>
      </div> -->