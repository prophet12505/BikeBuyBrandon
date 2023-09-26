var myCarousel = document.querySelector('#carousel-with-indecator');
var carousel = new bootstrap.Carousel(myCarousel);
$(document).ready(function() {
    if(localStorage.getItem('category'))
    {
      let  category=localStorage.getItem('category');
      //alert("CATEGORY:"+ category);

      switch(category){
          case "All categories":{
            $('#All').prop('selected', true);
            $('#Men').prop('selected', false);
            $('#Women').prop('selected', false);
            $('#Kids').prop('selected', false);
            break;
          }
          case "Men's bikes":{
            $('#All').prop('selected', false);
            $('#Men').prop('selected', true);
            $('#Women').prop('selected', false);
            $('#Kids').prop('selected', false);
            break;

          }
          case "Women's bikes":{
            $('#All').prop('selected', false);
            $('#Men').prop('selected', false);
            $('#Women').prop('selected', true);
            $('#Kids').prop('selected', false);
            break;
          }
          case "Kids' bikes":{
            $('#All').prop('selected', false);
            $('#Men').prop('selected', false);
            $('#Women').prop('selected', false);
            $('#Kids').prop('selected', true);
            break;
          }
          default:
            break;
        }
    }
    
  });

function handleCategorySelect(category){
  localStorage.setItem('category',category);
  window.location.href = "index.php?category=" + category;
}