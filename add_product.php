<?php
include 'includes/header.php';
if (isset($_POST['submit'])) {
    $barcode = $_POST['barcode'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    if (!empty($barcode) && !empty($name) && !empty($description) && !empty($stock) && !empty($price)) {
        $sql = 'INSERT INTO product(barcode,name,description,stock,price) VALUES(:barcode,:name,:description,:stock,:price)';
        $stmt = $conn->prepare($sql);
        if ($stmt->execute(['barcode' => $barcode, 'name' => $name, 'description' => $description, 'stock' => $stock, 'price' => $price])) {
            header('Location: index.php');
        }
    }
}
?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode</label>
                    <input type="text" class="form-control" id="barcode" name="barcode">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" id="stock" name="stock">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="float" class="form-control" id="price" name="price">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php
include 'includes/footer.php';
?>