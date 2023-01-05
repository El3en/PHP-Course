<?php
require_once(BASE_PATH . '../dal/dal.php');
function getProducts()
{
    $query = "SELECT p.*,c.name category_name,s.name size_name,cl.name color_name,r.rating,r.rating_count FROM 
    products p JOIN categories c ON p.category_id=c.id
    JOIN sizes s on s.id = p.size_id
    JOIN colors cl on cl.id = p.color_id
	JOIN (SELECT product_id,AVG(rate) rating,COUNT(0) rating_count FROM `ratings` GROUP BY product_id) r ON r.product_id = p.id";
    return get_rows($query);
}

function display_product($product)
{
    return '<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
    <div class="product-item bg-light mb-4">
        <div class="product-img position-relative overflow-hidden">
            <img class="img-fluid w-100" src="' . $product['image_url'] . '" alt="" />
            <div class="product-action">
                <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-shopping-cart"></i></a>
                <a class="btn btn-outline-dark btn-square" href="#"><i class="far fa-heart"></i></a>
                <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-sync-alt"></i></a>
                <a class="btn btn-outline-dark btn-square" href="#"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="text-center py-4">
            <a class="h6 text-decoration-none text-truncate" href="">' . $product['name'] . '</a>
            <div class="d-flex align-items-center justify-content-center mt-2">
                <h5>$' . ($product['price'] - ($product['price'] * $product['discount'])) . '</h5>
                <h6 class="text-muted ml-2"><del>$' . $product['price'] . '</del></h6>
            </div>
            <div class="d-flex align-items-center justify-content-center mb-1">
                <small class="fa fa-star text-primary mr-1"></small>
                <small class="fa fa-star text-primary mr-1"></small>
                <small class="fa fa-star text-primary mr-1"></small>
                <small class="fa fa-star text-primary mr-1"></small>
                <small class="fa fa-star text-primary mr-1"></small>
                <small>(' . $product['rating_count'] . ')</small>
            </div>
        </div>
    </div>
</div>';
}