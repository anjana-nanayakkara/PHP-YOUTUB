
<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');

    // $statement = $pdo->prepare(" INSERT INTO products (title, image, description, price, create_date)")
    // VALUES (:title, :image, :description, :price, :date));

    $statement = $pdo->prepare("INSERT INTO products (title, image,description, price, create_date)
            VALUE (:title, :image, :description, :price, :date)");

    $statement->bindValue(':title',$title);
    $statement->bindValue(':image','');
    $statement->bindValue(':description',$description);
    $statement->bindValue(':price',$price);
    $statement->bindValue(':date',$date);


    $statement->execute();
}

?>







<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Create New Product</h1>

    <form action="" method="post">
  <div class="mb-3">
    <label>Product Image</label><br>
    <input type="file" name="image">
    
  </div>

  <div class="mb-3">
    <label>Product title</label>
    <textarea class="form-control" name="title"></textarea>
    
  </div>

  <div class="mb-3">
    <label>Product Description</label>
    <input type="textarea" name="description" class="form-control" >
    
  </div>

  <div class="mb-3">
    <label>Product Price</label>
    <input type="number" step=".01" name="price" class="form-control" >
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </body>
</html>