<?php session_start() ?>
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
    <!-- ayusin ko muna yung tailwind ko, it is so inconsistent -->
    <?php include "header.php" ?>
    <div class="container mx-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="border-b border-gray-200">
                <tr class="">
                    <th class="py-4"></th>
                    <th class="py-4">Product</th>
                    <th class="py-4">Size</th>
                    <th class="py-4">Quantity</th>
                    <th class="py-4">Price</th>
                    <th class="py-4">Total</th>
                </tr>
            </thead>
            <tbody class="px-4">
                <?php foreach ($_SESSION['itemsInCart'] as $key => $row): ?>
                    <?php 
                        $bg = "bg-white";
                        if($key % 2 == 0){
                            $bg = "bg-slate-200";
                        }    
                    ?>
                    <tr class="<?php echo $bg;?>">
                        <td class="w-1/4 p-4 border-b border-gray-200">
                            <img src="./img/<?php echo $row['image']?>" alt="" class="w-1/4 rounded">
                        </td>
                        <td class="border-b border-gray-200 text-center font-semibold"><?php echo $row['name'] ?> </td>
                        <td class="border-b border-gray-200 text-center font-semibold"><?php echo $row['size'] ?></td>
                        <td class="border-b border-gray-200 text-center font-semibold"><?php echo $row['quantity'] ?></td>
                        <td class="border-b border-gray-200 text-center font-semibold">₱<?php echo $row['price'] ?></td>
                        <td class="border-b border-gray-200 text-center font-semibold">₱<?php echo $row['price'] * $row['quantity']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>