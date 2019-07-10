<?php
    require 'pages/header.php';
    require 'classes/Category.class.php';
    require 'classes/Offer.class.php';

    if(empty($_SESSION['clogin'])){
?>
    <script type="text/javascript">window.location.href="login.php"</script>
<?php
    };


    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $id = addslashes($_GET['id']);
        $_offer = new Offer();
        $title = addslashes($_POST['title']);
        $price = addslashes((float)$_POST['price']);
        $category = addslashes((int)$_POST['category']);
        $description = addslashes($_POST['description']);
        $condition = addslashes((int)$_POST['condition']);
        if (isset($_FILES['images'])) {
            $images = $_FILES['images'];
        } else {
            $images = [];
        }

        $_offer->editOffer($title, $category, $price, $description, $condition, $images, $id);
        ?>
            <div class="alert alert-success">
                <div class="container">
                    Successfuly edited offer. Thank you for using our plataform.
                </div>
            </div>
        <?php
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = addslashes($_GET['id']);
        $_offer = new Offer();
        $offer = $_offer->getOffer($id);
    } else {
        ?>
        <script type="text/javascript">window.location.href="login.php"</script>
        <?php
    }

?>

<div class="container">
    <h1 class="mt-4 mb-4">Edit offer</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">
                <?php
                    $category = new Category();
                    $categories = $category->getList();
                    foreach($categories as $item) {
                ?>
                    <option value="<?php echo $item['id']; ?>" <?php if($offer['id_category'] == $item['id']){echo "selected";} ?>> <?php echo $item['name']; ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="<?php echo $offer['title'] ?>">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input class="form-control" type="text" name="price" id="price" value="<?php echo $offer['price'] ?>">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input class="form-control" type="text" name="description" id="description" value="<?php echo $offer['description'] ?>">
        </div>
        <div class="form-group">
            <label for="condition">Condition:</label>
            <select class="form-control" name="condition" id="condition">
                <option value="1" <?php if($offer['prod_cond'] == 1){echo "selected";} ?>>Old look</option>
                <option value="2" <?php if($offer['prod_cond'] == 2){echo "selected";} ?>>Parcial look</option>
                <option value="3" <?php if($offer['prod_cond'] == 3){echo "selected";} ?>>Brand new look</option>
            </select>
        </div>

        <div class="form-group">
            <label for="addImg" class="form-label">Add offer images:</label>
            <input type="file" class="file-input" name="images[]" multiple>
            <div class="card mt-2">
                <h5 class="card-header">Images:</h5>
                <div class="card-body d-flex align-items-end">
                    <?php foreach($offer['images'] as $image): ?>
                        <div class="image-wrapper">
                            <img src="assets/images/offers/<?php echo $image['url']; ?>" class="img-thumbnail">
                            <a href="delete-image.php?id=<?php echo $image['id']; ?>" class="btn btn-danger ml-3">Delete image</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <input type="submit" name="editOffer" value="Save" class="btn btn-primary mt-3">
    </form>
</div>


<?php require 'pages/footer.php' ?>
