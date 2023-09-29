<?php
$title = "Bike Buy Brandon | shopping";
include("./inc/header.php");
// include "./inc/constants/shopCardList.php";
include("./view/Card.php");
include("./view/Carousel.php");
include("./view/CategoryBar.php");
$category="All categories";
?>
<!-- html section    -->
<section>
  <!-- carousel  -->
  <?php 
  Carousel();
  CategoryBar();
  //render bootstrap rows
  include("./inc/dbconnect.php");
  $sql = "SELECT * FROM product";
  if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $category = urldecode($category);
  } else {
      $category = 'All categories'; // select all products by default
  }
  switch ($category) {
    case "Men's bikes":
      $sql=$sql." WHERE category = 'Men\'s bikes'";
      break;
    case "Women's bikes":
      $sql=$sql." WHERE category = 'Women\'s bikes'";
      break;
    case "Kids' bikes":
      $sql=$sql." WHERE category = 'Kids\' bikes'";
      break;
    default:
    ;
  }

  $result =mysqli_query($dbc,$sql);
  $shopCardList=[];
      if(mysqli_num_rows($result)>0)
        {
            while($row =mysqli_fetch_assoc($result)){
                    //$prod_id=$row['prod_id'];
                    if($row['image_url']==NULL){
                        $row['image_url']='./img/goods/product_placeholder.png';
                    }
                    array_push($shopCardList, $row);
                     // output product info into a card
            }
        }
        else{
            Message('Sorry, they were no products found','warning');
        }
  echo '<div id="shoplist">';
      //render shopcards
      for ($i = 0; $i < count($shopCardList); $i++) {
        //render a bootstrap column for each grid
        Card($shopCardList[$i]);
      }
  echo '</div>';
  include("./inc/footer.php");
  ?>
</section>
<script src="./js/index.js">
  // var myCarousel = document.querySelector('#carousel-with-indecator');
  // var carousel = new bootstrap.Carousel(myCarousel);
</script>
