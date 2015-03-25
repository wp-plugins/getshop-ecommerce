<?php
/* @var $api GetShopApi */
global $api;

if (!isset($_GET['productid'])) {
    echo "No product id has been set, please select a product from a product list or a product view.<br><br>";
    echo ".... This page is not intended to be displayed in a manner like this, use a plugin hide it (for example hide pages).<br><br>";
    echo "And oh yes.. you need it, this is the page displaying a product when navigating trough a product list.";
    return;
}

$productid = $_GET['productid'];

$product = $api->getProductManager()->getProduct($productid);
$cartId = get_option("cart_page_id");

echo "<div class='getshop_title'>";
echo "<h1>" . $product->name . " - " . $product->price . ",- ";
echo "<a href='?page_id=$cartId&product=".$product->id."&type=add'><span class='getshop_buy_button gsbutton'>Add to cart</span></a>";
echo "</h1>";
echo "</div>";
foreach ($product->imagesAdded as $image) {
    ?>
    <a class="getshop_main_image" data-lightbox="image"
       href="https://www.getshop.com/displayImage.php?id=<? echo $image; ?>"
        ><img src="https://www.getshop.com/displayImage.php?id=<?echo $image; ?>&width=250&height=250" alt="" />
    </a>
    <?
    break;
}
echo "<div class='getshop_short_desc'>" . $product->shortDescription . "</div>";
echo "<div class='getshop_subimages'>";
foreach ($product->imagesAdded as $image) {
    /* @var $image core_productmanager_data_ProductImage */
?>
    <a class="getshop_sub_image" rel="group"  data-lightbox="image"
       href="https://www.getshop.com/displayImage.php?id=<? echo $image; ?>&width=800&height=800">
        <img class='sub_image' src='https://www.getshop.com/displayImage.php?id=<? echo $image; ?>&width=80&height=80'>
    </a>
    <?
}
echo "</div>";

if ($product->description) {
    echo "<div class='getshop_long_desc'>";
    echo "<div class='getshop_extended_title'>Extended information</div>";
    echo $product->description;
    echo "</div>";
}
?>

<style>
    .getshop_buy_button { float:right; } 
</style>