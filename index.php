<?php
    session_start();
    $arrProducts = array(
        array(
            'name' => "Adidas Shirt",
            'description' => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore voluptate ea consequatur! Doloribus maiores, fugit, laborum unde magnam necessitatibus a minima animi",
            'price' => "780",
            'photo1' => "Pic1A.jpg",
            'photo2' => "Pic1B.jpg",
        ),
        array(
            'name' => "Gucci Shirt",
            'description' => "Dolore temporibus deleniti ipsam nostrum enim dolorem accusantium commodi ullam consequuntur iure. Nesciunt esse ad inventore eos earum rerum assumenda et beatae animi, temporibus itaque repudiandae voluptas eum corrupti aut atque facere",
            'price' => "2,000",
            'photo1' => "Pic2A.jpg",
            'photo2' => "Pic2B.jpg",
        ),
        array(
            'name' => "Polo Shirt",
            'description' => "Maiores consequatur aliquid at, iste labore delectus alias ipsa. Alias, sed veritatis fuga asperiores quasi, ipsum corrupti dolores quis animi inventore tenetur illum! Animi veniam rerum et quisquam vero aliquam, sapiente repudiandae fugiat cumque! Ducimus",
            'price' => "2,500",
            'photo1' => "Pic3A.jpg",
            'photo2' => "Pic3B.jpg",
        ),
        array(
            'name' => "Adidas Short",
            'description' => "Neque. Maiores odio soluta perspiciatis aut unde eligendi dolor illum eveniet. Alias, sed veritatis fuga asperiores quasi, ipsum corrupti dolores quis animi inventore tenetur illum! Animi veniam rerum et quisquam vero aliquam, sapiente repudiandae fugiat cumque! Ducimus",
            'price' => "500",
            'photo1' => "Pic4A.jpg",
            'photo2' => "Pic4B.jpg",
        ),
        array(
            'name' => "Sling Bag",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "2,500",
            'photo1' => "Pic5A.jpg",
            'photo2' => "Pic5B.jpg",
        ),
        array(
            'name' => "Jogger",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "1,000",
            'photo1' => "Pic6A.jpg",
            'photo2' => "Pic6B.jpg",
        ),
        array(
            'name' => "Nike Shirt",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "800",
            'photo1' => "Pic7A.jpg",
            'photo2' => "Pic7B.jpg",
        ), 
        array(
            'name' => "Lebron Jersey",
            'description' => "Sequi blanditiis reprehenderit repudiandae vel explicabo voluptas voluptatibus veritatis? Corrupti saepe rem autem omnis labore nobis nam sunt quos asperiores neque reprehenderit accusantium",
            'price' => "5,000",
            'photo1' => "Pic8A.jpg",
            'photo2' => "Pic8B.jpg",
        ),
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="shopping.css">
    <title> Formal Attire Online Shopping | Shopping Cart</title>
</head>
<body>
<form method="post">
        <div class="container pt-5">
            <div class="row">
                <div class="col-md-10">
                    <h1><i class="fa fa-store"></i> TMN Shopping Cart</h1>
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

        <div class="row">
           <?php foreach ($arrProducts as $key => $value): ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="details.php?k=<?php echo $key; ?>">
                                <img class="pic-1" src="img/<?php echo $value['photo1'];?>">
                                <img class="pic-2" src="img/<?php echo $value['photo2'];?>">
                            </a>
                            <a class="add-to-cart" href="details.php?k=<?php echo $key; ?>"><i class="fa-sharp fa-solid fa-cart-plus"></i> <b>Add to cart</b></a>
                        </div>
                        <div class="product-content">
                            <h3 class="title">
                                <b><?php echo $value['name'];?></b>
                                <span class="badge badge-dark">₱<?php echo $value['price'];?></span>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </form>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>
</html>