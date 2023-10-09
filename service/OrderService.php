<?php
class OrderService
{

    private $dbc;

    public function __construct($dbc)
    {
        $this->dbc = $dbc;
    }
    //
    public function checkout($cart,$userid,$total)
    {
   

        // turn autocommit off
        mysqli_autocommit($this->dbc, FALSE);

        // add the order to the orders tbl
        //Notice: order is a reserved word, not suitable for a table name
        $sql = "INSERT INTO `order` (user_id, total) VALUES ($userid, $total)";

        $result = mysqli_query($this->dbc, $sql);
        // check to see if writing to db was successful
        if (mysqli_affected_rows($this->dbc) == 1) {
            // retrieve the newly created ordernum from orders tbl
            $orderid = mysqli_insert_id($this->dbc);

            //set prepared statement for inserting into items tbl
            $insert = "INSERT INTO order_item (ordernum, product_id, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($this->dbc, $insert);
            @mysqli_stmt_bind_param($stmt, 'iiid', $orderid, $product_id, $qty, $price);

            // run the query loop
            $affected = 0;
            foreach ($cart as $product_id => $item) {
                $qty = $item['quantity'];
                $price = $item['price'];
                @mysqli_stmt_execute($stmt);
                $affected += @mysqli_stmt_affected_rows($stmt);
            }

            // close the prepared statement
            @mysqli_stmt_close($stmt);

            // check if it worked properly
            if ($affected == count($cart)) {

                // commit the transaction
                @mysqli_commit($this->dbc);

      

                // get order timestamp
                $q = "SELECT orderdate FROM `order` WHERE ordernum = $orderid limit 1";
                $r = mysqli_query($this->dbc, $q);

                // if we got the timestamp back save it
                if ($r) {
                    $row = mysqli_fetch_assoc($r);
                }

                // format the date and time
                $time = strtotime($row['orderdate']);
                $do = date("l, F d, Y", $time);
                $to = date("g:i:s A", $time);
                $dst = date("I", $time);
                return Array('status' => 0, 'value' => Array(
                    'ordernum' => $orderid,
                    'to'=>$to,
                    'displaydst'=>$dst,
                    'do'=>$do,
                    'total'=>$total
                ));
                
            }
            else{
                return Array('status' => 301, 'value' => Null);
            }
        }
    }

}