<?php
$title = "Bike Buy Brandon | shopping";
include("./inc/header.php");
include("./view/Carousel.php");
include("./view/CategoryBar.php");
include("./service/ProductService.php");
include('./view/CardList.php');
include('./view/Message.php');
$category="All categories";




  //get endpoint
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
 
      // render carouser 
      // render category bar
      if(isset($_GET['msg'])){
        Message($_GET['msg'],'warning');
      }
      Carousel();
   
      CategoryBar();

    include("./inc/dbconnect.php");
    $productService=new productService($dbc);
      if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $category = urldecode($category);
      } else {
          $category = 'All categories'; // select all products by default
      }
    $getProductsByCategoryResult=$productService->getProductsByCategory($category);
      if($getProductsByCategoryResult["status"]==0){
        CardList($getProductsByCategoryResult["value"]);
      }
      else if($getProductsByCategoryResult["status"]==101){
        Message('Sorry, they were no products found','warning');
      }
   
    
  }
  //post endpoint
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //do nothing

  }
  include("./inc/footer.php");
?>

<script src="./js/index.js">
  // var myCarousel = document.querySelector('#carousel-with-indecator');
  // var carousel = new bootstrap.Carousel(myCarousel);
</script>
