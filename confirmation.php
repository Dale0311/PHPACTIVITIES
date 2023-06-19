<?php 
session_start();
include "./src/data.php";
   if(!isset($_POST['addToCart'])){
      header("location: index.php");
   }
   
   $key = $_SESSION['key'];
   
   // to access all data
   $product = $data[$key];
   $quantity = $_POST['quantity'];
   $size = $_POST['size'];

   // to put to session
   $itemsInCart = [
      "id" => $key,
      "image" => $product['image'],
      "name" => $product['name'],
      "price" => $product['price'],
      "size" => $size,
      "quantity" => $quantity,
   ];

   if(!isset($_SESSION['itemsInCart'])){
      $_SESSION['itemsInCart'] = [];
   }

   // flag lang talaga maasahan ko kapag gumagawa ako ng complex foreach haysk
   $index = -1;
   $tempQuantity = 0;
   if(isset($_SESSION['itemsInCart'])){
      if(count($_SESSION['itemsInCart']) < 1){
         $_SESSION['itemsInCart'][] = $itemsInCart;
      }else{
         foreach ($_SESSION['itemsInCart'] as $key=> $value) {
            if( $value['name'] === $product['name'] && $value['size'] === $size){
               $index = $key;
               $tempQuantity = $value['quantity'];
               break;
            }else{
               $_SESSION['itemsInCart'][] = $itemsInCart;
               break;
            }
         }
      }

      // if the initial index changes value then ibig sabihin may kapareho sya.
      if($index > -1){
         $_SESSION['itemsInCart'][$index]['quantity'] = $tempQuantity + $quantity;
      }
   }

   if(isset($_SESSION['numAtCart'])){
      $_SESSION['numAtCart']+= $quantity;
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="./output.css">
</head>
<body>
   <?php include "header.php" ?>
   <div class="container my-8 mx-auto">
      <h1 class="text-4xl font-semibold">Product is successfully added to your cart!</h1>
      <div class="flex space-x-12 w-1/2 items-center my-8 font-semibold">
         <a href="cart.php" class="py-2 text-center px-4 w-1/4 bg-slate-500 text-white rounded">View Cart</a>
         <a href="." class="py-2 text-center px-4 w-1/4 bg-red-500 text-white rounded">Continue Shopping</a>
      </div>
   </div>
</body>
</html>