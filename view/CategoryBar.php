<?php
function CategoryBar()
{
  ?>
  <!-- inject Category HTML  -->
  <div>
    <hr>
    <h5 class="text-secondary">Category</h5>
    <select class="form-select" aria-label="Default select example" onchange="handleCategorySelect(this.value)">
      <option id="All" value="All categories">All categories</option>
      <option id="Men" value="Men's bikes">Men's bikes</option>
      <option id="Women" value="Women's bikes">Women's bikes</option>
      <option id="Kids" value="Kids' bikes">Kids' bikes</option>
    </select>
  </div>
  <!-- end injection  -->
  <?php
}
?>