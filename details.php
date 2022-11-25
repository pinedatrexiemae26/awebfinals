<?php
    session_start();
    $arrProducts = array(
        array(
            'name' => "Adidas Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "780",
            'picture1' => "Pic1A.jpg",
            'picture2' => "Pic1B.jpg",
        ),
        array(
            'name' => "Gucci Shirt",
            'description' => "Dolore temporibus deleniti ipsam nostrum enim dolorem accusantium commodi ullam consequuntur iure. Nesciunt esse ad inventore eos earum rerum assumenda et beatae animi, temporibus itaque repudiandae voluptas eum corrupti aut atque facere",
            'price' => "2,000",
            'picture1' => "Pic2A.jpg",
            'picture2' => "Pic2B.jpg",
        ),
        array(
            'name' => "Polo Shirt",
            'description' => "Maiores consequatur aliquid at, iste labore delectus alias ipsa. Alias, sed veritatis fuga asperiores quasi, ipsum corrupti dolores quis animi inventore tenetur illum! Animi veniam rerum et quisquam vero aliquam, sapiente repudiandae fugiat cumque! Ducimus",
            'price' => "2,500",
            'picture1' => "Pic3A.jpg",
            'picture2' => "Pic3B.jpg",
        ),
        array(
            'name' => "Adidas Short",
            'description' => "Neque. Maiores odio soluta perspiciatis aut unde eligendi dolor illum eveniet. Alias, sed veritatis fuga asperiores quasi, ipsum corrupti dolores quis animi inventore tenetur illum! Animi veniam rerum et quisquam vero aliquam, sapiente repudiandae fugiat cumque! Ducimus",
            'price' => "500",
            'picture1' => "Pic4A.jpg",
            'picture2' => "Pic4B.jpg",
        ),
        array(
            'name' => "Sling Bag",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "2,500",
            'picture1' => "Pic5A.jpg",
            'picture2' => "Pic5B.jpg",
        ),
        array(
            'name' => "Jogger",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "1,000",
            'picture1' => "Pic6A.jpg",
            'picture2' => "Pic6B.jpg",
        ),
        array(
            'name' => "Nike Shirt",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "800",
            'picture1' => "Pic7A.jpg",
            'picture2' => "Pic7B.jpg",
        ), 
        array(
            'name' => "Lebron Jersey",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "5,000",
            'picture1' => "Pic8A.jpg",
            'picture2' => "Pic8B.jpg",
        )
    );
    if(isset($_POST['btnProcess'])){
        if (isset($_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']]))
            $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] += $_POST['txtQuantity'];
        else
           $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] = $_POST['txtQuantity'];

       $_SESSION['totalQuantity'] += $_POST['txtQuantity'];
       header("location: confirm.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="shopping.css">
	<title>Details</title>
</head>
<body>
	<div class="container pt-3">
    	<div class="row">
                <div class="col-md-10">
                    <h1><i class="fa fa-store"></i> Mens Wear Shop</h1>
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
                        <h3>Select Size: </h3>
                        <input type="radio" name="radSize" id="radXS" value="XS"> <label for="radXS" class="pr-3">XS</label>
                        <input type="radio" name="radSize" id="radSM" value="SM"> <label for="radSM" class="pr-3">SM</label>
                        <input type="radio" name="radSize" id="radMD" value="MD"> <label for="radMD" class="pr-3">MD</label>
                        <input type="radio" name="radSize" id="radLG" value="LG"> <label for="radLG" class="pr-3">LG</label>
                        <input type="radio" name="radSize" id="radXL" value="XL"> <label for="radXL" class="pr-3">XL</label>
                        <br>
                        <hr>
                        <h3 class="title"></h3>
                        <h3>Enter Quantity: </h3>
                        <input type="number" name="txtQuantity" placeholder="0" class="form-control" min="1" max="100" required>
                        <br>
                        <button type="submit" name="btnProcess" class="btn btn-dark btn-lg"><i class="fa fa-check-circle"></i> Confirm Product Purchase</button>
                        <a href="index.php" class="btn btn-danger btn-lg"><i class="fa fa-left-arrow"></i> Cancel /Go Back</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </form>

   </div> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>
</body>
</html>