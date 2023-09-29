<?php 
class ProductService {
    private $dbc;

    public function __construct($dbc) {
        $this->dbc = $dbc;
    }
    //validate and handle error
    public function getProductsByCategory($category){
        //todo
        $sql = "SELECT * FROM product";
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
            break;
        }
        $result =mysqli_query($this->dbc,$sql);
        $shopCardList=[];
        //construct a list  
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
            return array("status"=>0,"value"=>$shopCardList);
        }
        else{
            return array("status"=>101,"value"=>Null);//
        }

    }
    //move the register process here 
    public function getCartItems(){
        //rewrite it to the service layer
        $sql="SELECT product_id, product_name, price, 	image_url from bikebuy WHERE product_id IN (";
        foreach($_SESSION['cart'] as $prod_id => $val){
            $sql.=" $prod_id,";
        }
        $sql=substr($sql,0,-1);//strip last comma
        $sql.=") ORDER BY product_name ASC";
        // echo $sql;
        $result=mysqli_query($this->dbc,$sql);
        //create a form with a table Layout for the cart
        
    }

    // ...
}



?>
