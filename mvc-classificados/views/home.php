<?php
    if (empty($_SESSION['clogin'])) {
        header("Location: login");
        exit;
    }
?>
<div class="container">
    <div class="jumbotron mt-4">
        <h1>You have <?php echo $totalOffers; ?> offers today</h1>
        <p class="lead">There are <?php echo $totalUsers; ?> stoners registered</p>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <h2>Search</h2>
            <form method="get" class="mt-3">
                <div class="form-group">
                    <label for="filters[category]" class="form-label mt-2"><strong>Category</strong></label>
                    <select class="form-control" name="filters[category]">
                        <option value=""></option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category['id'] ?>" <?php if($category['id']==$filters['category']){echo "selected=selected";} ?>><?php echo $category['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="filters[price]" class="form-label mt-2"><strong>Price</strong></label>
                    <select class="form-control" name="filters[price]">
                        <option value=""></option>
                        <option value="0-50" <?php if($filters['price']=='0-50'){echo "selected=selected";} ?>>$ 0 - 50</option>
                        <option value="51-100" <?php if($filters['price']=='51-100'){echo "selected=selected";} ?>>$ 51 - 100</option>
                        <option value="101-200" <?php if($filters['price']=='101-200'){echo "selected=selected";} ?>>$ 101 - 200</option>
                        <option value="201-500" <?php if($filters['price']=='201-500'){echo "selected=selected";} ?>>$ 201 - 500</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="filters[condition]" class="form-label mt-2"><strong>Condition</strong></label>
                    <select class="form-control" name="filters[condition]">
                        <option value=""></option>
                        <option value="0" <?php if($filters['condition']=='0'){echo "selected=selected";} ?>>Old look</option>
                        <option value="1" <?php if($filters['condition']=='1'){echo "selected=selected";} ?>>Parcial look</option>
                        <option value="2" <?php if($filters['condition']=='2'){echo "selected=selected";} ?>>Brand new look</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" name="search" value="Search" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="col-sm-9">
            <h2>Last Offers</h2>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($offers as $offer): ?>
                    <?php
                        if(!$offer['url']){
                            $imgTemp = "no-image-icon.png";
                        } else {
                            $imgTemp = $offer['url'];
                        }
                    ?>
                        <tr>
                            <td>
                                <img src="<?php echo BASE_URL; ?>assets/images/offers/<?php echo $imgTemp; ?>" height="50">
                            </td>
                            <td>
                                <a href="<?php echo BASE_URL; ?>product/open/<?php echo $offer['id'] ?>"><?php echo $offer['title']; ?></a><br>
                                <?php echo $offer['category']; ?>
                            </td>
                            <td>
                                $ <?php echo number_format($offer['price'], 2); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <ul class="pagination">

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if($page == $i){echo 'active';} ?>"><a href="<?php echo BASE_URL; ?>?<?php 
                    $tempFilters = $_GET; 
                    $tempFilters['page'] = $i; 
                    echo urldecode(http_build_query($tempFilters)); 
                ?>" class="page-link"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</div>