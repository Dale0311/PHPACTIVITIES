<?php include "./src/data.php" ?>
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
    <?php if(isset($_GET['key'])):?>
        <?php $product = $data[$_GET['key']]; ?>
        <div class="container mx-auto mt-4">
            <div class="flex space-x-4">
                <div>
                    <img src="./img/<?php echo $product['image'] ?>" class="w-full" alt="">
                </div>
                <div class="">
                    <!-- title -->
                    <span class="flex items-center text-3xl space-x-4">
                        <h1 class=""><?php echo $product['name']?></h1>
                        <p class="py-1 px-6 bg-slate-700 text-white"><?php echo $product['price']?></p>
                    </span>
                    <span>
                        <p><?php echo $product['description'] ?></p>
                    </span>
                </div>
            </div>
        </div>
    <?php endif ?>
</body>
</html>