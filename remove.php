<?php
    session_start();
    $arrProducts = array(
        array(
            'name' => "Brown Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "550",
            'picture1' => "Pic1A.jpg",
            'picture2' => "Pic1B.jpg",
        ),
        array(
            'name' => "Gray Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "550",
            'picture1' => "Pic2A.jpg",
            'picture2' => "Pic2B.jpg",
        ),
        array(
            'name' => "White Blazer",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "750",
            'picture1' => "Pic3A.jpg",
            'picture2' => "Pic3B.jpg", 
        ),
        array(
            'name' => "Dark Blue Polo Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "600",
            'picture1' => "Pic4A.jpg",
            'picture2' => "Pic4B.jpg",  
        ),
        array(
            'name' => "DarkBlueLongSleeves",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "800",
            'picture1' => "Pic5A.jpg",
            'picture2' => "Pic5B.jpg",
        ),    
        array(
            'name' => "White Long Sleeves",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "800",
            'picture1' => "Pic6A.jpg",
            'picture2' => "Pic6B.jpg",
        ),
        array(
            'name' => "Dark Blue Blazer",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "750",
            'picture1' => "Pic7A.jpg",
            'picture2' => "Pic7B.jpg",
        ),
        array(
            'name' => "Floral Polo",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "650",
            'picture1' => "Pic8A.jpg",
            'picture2' => "Pic8B.jpg",
        )
    );


    if(isset($_POST['btnRemove'])){
        unset($_SESSION['cartItems'][$_POST['hdnKey']][$_POST['hdnSize']]);

        $_SESSION['totalQuantity'] -= $_POST['hdnQuantity'];
        header("location: cart.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="shopping.css">
    <title>Remove</title>
</head>
<body>
    <div class="container pt-3">
        <div class="row">
                <div class="col-md-10">
                <h3 class="h3 d-inline mt-5"><i class="fa-solid fa-store"></i>TMN Shopping Cart</h3>                
                </div>
                <div class="col-md-2">
                    <a href="cart.php" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <?php 
                        if(isset($_SESSION['totalQuantity']))
                            echo '<span class="badge badge-light">' . $_SESSION['totalQuantity'] . '</span>';
                        else
                            echo '<span class="badge badge-light">0</span>';
                    ?>    
                    </a>
                </div>
            </div>
        <hr>

    <form method="post"> 
        <div class="row">
            <?php if(isset($_GET['k']) && isset($arrProducts[$_GET['k']])): ?> 
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="product-grid card mb-4">
                        <div class="product-image">
                            <a href="details.php?k=<?php echo $key; ?>"></a>
                                <img class="pic-1" src="img/<?php echo $arrProducts[$_GET['k']]['picture1'];?>">
                                <img class="pic-2" src="img/<?php echo $arrProducts[$_GET['k']]['picture2'];?>">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="product-content">
                        <h3 class="title">
                            <?php echo $arrProducts[$_GET['k']]['name']; ?>
                            <span class="badge badge-dark">₱<?php echo $arrProducts[$_GET['k']]['price']; ?></span>
                        </h3>
                        <p><?php echo $arrProducts[$_GET['k']]['description']; ?></p>
                        <hr>
                        <input type="hidden" name="hdnKey" value="<?php echo $_GET['k']; ?>">
                        <input type="hidden" name="hdnSize" value="<?php echo $_GET['s']; ?>">
                        <input type="hidden" name="hdnQuantity" value="<?php echo $_GET['q']; ?>">
                        <h3 class="title">Size: <?php echo $_GET['s']; ?></h3>
                        <br>
                        <hr>
                        <h3 class="title"></h3>
                        <h3 class="title">Quantity: <?php echo $_GET['q']; ?></h3>
                        <br>
                        <button type="submit" name="btnRemove" class="btn btn-dark btn-lg"><i class="fas fa-trash"></i> Confirm Product Remove</button>
                        <a href="cart.php" class="btn btn-danger btn-lg"><i class="fa fa-left-arrow"></i> Cancel /Go Back</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </form>

   </div> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>