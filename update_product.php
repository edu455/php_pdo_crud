<?php
include 'includes/header.php';
if(isset($_GET['id'])&&fetch_product($_GET['id'])){
    $current_product=fetch_product($_GET['id']);
    if (isset($_POST['submit'])) {
        $barcode = $_POST['barcode'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        if (!empty($barcode) && !empty($name) && !empty($description) && !empty($stock) && !empty($price)) {
            update_product($current_product->id,$barcode,$name,$description,$stock,$price);
            header('Location: index.php');
        }
    }
}else{
    header('Location: index.php');
}
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">PRODUCT ID: <?= $current_product->id?></h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode</label>
                    <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $current_product->barcode?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $current_product->name?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?= $current_product->description?>">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="<?= $current_product->stock?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="float" class="form-control" id="price" name="price" value="<?= $current_product->price?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php
include 'includes/footer.php';
?>