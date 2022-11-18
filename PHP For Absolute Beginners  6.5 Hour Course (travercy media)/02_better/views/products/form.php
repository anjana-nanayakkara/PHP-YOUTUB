
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
