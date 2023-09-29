
<?php
function Carousel() {
    ?>
    <!-- inject carousel html  -->
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
    <?php
    // end injection 
}
?>