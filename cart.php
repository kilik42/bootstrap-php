

<!DOCTYPE html>
<html>
    <head>
        <title>Shopping cart</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="cart.css">


    </head>
    
    
    <body>
      <div class="container">
          
          
          <?php 

$connect = mysqli_connect('localhost', 'root', '', 'cart');

$query = 'SELECT * FROM products ORDER  by id ASC';

$result = mysqli_query($connect, $query);

if($result){

    if(mysqli_num_rows($result) > 0):
       while($product = mysqli_fetch_assoc($result)):
       // print_r($product);
           ?>
           
           <div class="col-sm-4 col-md-3">
               <form method="post" action="index.php?action=add&id=" <?php echo $product['id']; ?>">
               
                   <div class="products">
                        <img src="<?php echo $product['image'];?>" class="img-responsive" ?>
                        
                        <h4 class="text-info">
                               <? php 
                                 echo  $product['name'];
                               ?>
                        </h4>
                        
                        <h4>$ 
                        <?php
                        
                        echo $product ['price'];
                        
                        ?>
                        </h4>
                        
                        
                        <input type ="text" name="quantity" class="form-control" value="1"/>
                        
                        <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                        
                        
                         <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                         
                         <input type "submit" name= "add_to_cart" class= "btn btn-info" style="margin-top: 5px;" value="Add to Cart" />
                        
                        
                   </div>
                   
               </form>
           </div>
           
           <?php
          endwhile;
         endif;
      endif;
?>
      </div> 
        
        
    
        
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>


