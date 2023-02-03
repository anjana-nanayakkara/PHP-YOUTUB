
<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';

// exit;

$id = $_GET['id'] ?? null;

if(!$id){
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id',$id);
$statement->execute();

$product = $statement->fetch(PDO::FETCH_ASSOC);



$errors = [];

$title = $product['title'];
$description = $product['description'];
$price = $product['price'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    

    if(!$title){

        $errors[] = 'Product title is required';

    }

    if(!$price){

        $errors[] = 'Product price is required';

    }


    if(!is_dir('images')){
      mkdir('images');
    }

    if(empty($errors)){

      $image = $_FILES['image'] ?? null; 
      $imagePath = $product['image'];
      
      


      if($image && $image['tmp_name']) {

        if ($product['image']) {
            unlink($product['image']);
          }

        $imagePath = 'images/'.randomString(8).'/'.$image['name'];

        mkdir(dirname($imagePath));

        move_uploaded_file($image['tmp_name'], $imagePath);
      }

      
    // $statement = $pdo->prepare(" INSERT INTO products (title, image, description, price, create_date)")
    // VALUES (:title, :image, :description, :price, :date));

    $statement = $pdo->prepare("UPDATE products SET title = :title, image = :image, description = :description,  price = :price WHERE id = :id");

    $statement->bindValue(':title',$title);
    $statement->bindValue(':image',$imagePath);
    $statement->bindValue(':description',$description);
    $statement->bindValue(':price',$price);
    $statement->bindValue(':id',$id);


    $statement->execute();

    header('Location: index.php');

    }
}

function randomString($n){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';

  for($i = 0; $i < $n; $i++){
    $index = rand(0, strlen($characters) - 1);
    $str .= $characters[$index];
  }

  return $str;
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

  <p>

    <a href="index.php" class="btn btn-secondary">Go Back to Products</a>

  </p>
    <h1>Update Product <?php echo $product['title']?></h1>



<?php if (!empty($errors)):?>
  <div class="alert alert-danger">

      <?php foreach ($errors as $error): ?>

        <div><?php echo $error ?></div>

      <?php endforeach; ?>


  </div>
<?php endif;?>



    <form action="" method="post" enctype="multipart/form-data">


<?php if($product['image']): ?>

    <img src="<?php echo $product['image'] ?>" class="update-image">

<?php endif; ?>



  <div class="mb-3">
    <label>Product Image</label><br>
    <input type="file" name="image">
    
  </div>

  <div class="mb-3">
    <label>Product title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $title;?>"></textarea>
    
  </div>

  <div class="mb-3">
    <label>Product Description</label>
    <input type="textarea" name="description" class="form-control" value="<?php echo $description;?>" >
    
  </div>

  <div class="mb-3">
    <label>Product Price</label>
    <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price;?>" >
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  </body>
</html>