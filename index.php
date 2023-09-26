<?php
$title = "Bike Buy Brandon | shopping";
include("./inc/header.php");
// include "./inc/constants/shopCardList.php";
include("./view/Card.php");
$category="All categories";
?>
<!-- html section    -->
<section>
  <!-- carousel  -->
    <div id="carousel-with-indecator" class="carousel slide" data-bs-ride="carousel">
    <h1 class="bikebuy-heading fade-in-left">Bike Buy</h1>
    <h2 class="bikebuy-subheading fade-in-right">A premier online platform for all your bicycle needs<h2>
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel-with-indecator" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel-with-indecator" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carousel-with-indecator" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/carousel/demonstrate_1.jpg" class="d-block w-100" height="700" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./img/carousel/demonstrate_2.jpg" class="d-block w-100" height="700" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./img/carousel/demonstrate_3.jpg" class="d-block w-100" height="700" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carousel-with-indecator"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carousel-with-indecator"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  <!-- </div> -->
  <hr>
  <h5 class="text-secondary">Category</h5>
  <select class="form-select" aria-label="Default select example" onchange="handleCategorySelect(this.value)">
      <option id="All" value="All categories"
      >All categories</option>
      <option id="Men" value="Men's bikes"
      >Men's bikes</option>
      <option id="Women" value="Women's bikes"
      >Women's bikes</option>
      <option id="Kids" value="Kids' bikes"
      >Kids' bikes</option>
  </select>
  <?php
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
