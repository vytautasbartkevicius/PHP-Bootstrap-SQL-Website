<?php


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products-crud', 'root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$errors = [];
$title = '';
$price = '';
$description = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');



    if (!$title){
        $errors[] ="Product title is required";
    }
    if(!$price){
        $errors[] = "Product price is required";
    }
    if(!is_dir('images')){
        mkdir('images');
    }
    if (empty($errors)) {
        $image = $_FILES['image'] ?? null;
        $imagePath = '';
        if($image && $image['tmp_name']){

            $imagePath = 'images/'.randomString(8).'/'.$image['name'];
            mkdir(dirname($imagePath));





            move_uploaded_file($image['tmp_name'],$imagePath);
        }



        $statement = $pdo->prepare("INSERT INTO prodycts (title,image,description,price,create_date)
                VALUES (:title , :image, :description,:price, :date)");

        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', $date);
        $statement->execute();
        header('Location: index.php');
    }

}
function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwyxABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i=0; $i < $n; $i++){
        $index = rand(0, strlen($characters)-1);
        $str .= $characters[$index];

    }
    return $str;
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="app.cs">
    <title>Products</title>
</head>
<body>
<h1>Create new Product</h1>
<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div> <?php echo $error ?> </div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Product Image</label>
        <br>
        <input type="file" name="image">

    </div>

    <div class="form-group">
        <label>Product Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $title?>">

    </div>

    <div class="form-group">
        <label>Product Description</label>

        <textarea class="form-control" name="description" value="<?php echo $description?>" > </textarea>



    </div>

    <div class="form-group">
        <label>Product price</label>
        <input type="number" step=".01" name="price" class="form-control" value="<?php echo $price?>" >

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>


</form>


</body>
</html>