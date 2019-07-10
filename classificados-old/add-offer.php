<?php
    require 'pages/header.php';
    require 'classes/Category.class.php';
    require 'classes/Offer.class.php';
    if(empty($_SESSION['clogin'])):
?>
    <script type="text/javascript">window.location.href="login.php"</script>
<?php
    endif;

    $offer = new Offer();
    if (isset($_POST['title']) && !empty($_POST['title'])) {
        $title = addslashes($_POST['title']);
        $price = addslashes((float)$_POST['price']);
        $category = addslashes((int)$_POST['category']);
        $description = addslashes($_POST['description']);
        $condition = addslashes((int)$_POST['condition']);

        if ($offer->addNewOffer($title, $category, $price, $description, $condition)) {
            ?>
                <div class="alert alert-success">
                    <div class="container">
                        Successfuly added offer. Thank you for using our plataform.
                    </div>
            </div>
            <?php
        } else {
            ?>
                <div class="alert alert-success">
                    <div class="container">
                        Error adding the offer. Please double check the fields before submitting the offer.
                    </div>
                </div>

            <?php
        }


    }
?>

<div class="container">
    <h1 class="mt-4 mb-3">Add new Offer</h1>

    <form method="post">
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">
                <?php
                    $category = new Category();
                    $categories = $category->getList();
                    foreach($categories as $item) {
                ?>
                    <option value="<?php echo $item['id']; ?>"> <?php echo $item['name']; ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" type="text" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input class="form-control" type="text" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="condition">Condition</label>
            <select class="form-control" name="condition" id="condition">
                <option value="1">Old look</option>
                <option value="2">Parcial look</option>
                <option value="3">Brand new look</option>
            </select>
        </div>

        <input type="submit" name="addOffer" value="Add new offer" class="btn btn-primary mt-3">
    </form>
</div>


<?php require 'pages/footer.php' ?>
