<?php
require_once('../layouts/header.php');
require_once('../logic/products.php');
$products = getProducts();

?>
<div class="container-fluid mb-30">
<div class="col-12 px-xl-5 mb-30 left">
                        <button class="main-btn primary-btn btn-hover">
                        <i class="lni lni-plus me-2"></i>
                          Add Product
                        </button>
                      </div>
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <div class="table-wrapper table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="lead-info">
                                    <h6>Name</h6>
                                </th>
                                <th class="lead-email">
                                    <h6>Price</h6>
                                </th>
                                <th class="lead-phone">
                                    <h6>Size</h6>
                                </th>
                                <th class="lead-company">
                                    <h6>Color</h6>
                                </th>
                                <th class="lead-company">
                                    <h6>Category</h6>
                                </th>
                                <th>
                                    <h6>Action</h6>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) { ?>
                                <tr>
                                    <td class="min-width">
                                        <div class="lead">
                                            <div class="lead-image">
                                                <img src="<?= '/'.$product['image_url'] ?>" alt="">
                                            </div>
                                            <div class="lead-text">
                                                <p><?= $product['name'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="min-width">
                                        <p><?= $product['price'] ?></p>
                                    </td>
                                    <td class="min-width">
                                    <p><?= $product['size_name'] ?></p>
                                    </td>
                                    <td class="min-width">
                                    <p><?= $product['color_name'] ?></p>
                                    </td>
                                    <td class="min-width">
                                    <p><?= $product['category_name'] ?></p>
                                    </td>
                                    <td>
                                        <div class="action">
                                            <button class="text-primary">
                                                <i class="lni lni-pencil-alt"></i>

                                            </button>
                                            <button class="text-danger">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                                <?php } ?>
                            <!-- end table row -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('../layouts/footer.php');
?>