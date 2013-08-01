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
$address = getAddress($productid);

$product = $api->getProductManager()->getProduct($productid);
$cartId = get_option("cart_page_id");

echo "<div class='getshop_title'>";
echo $product->name . " - " . $product->price . ",-";
echo "<a href='?page_id=$cartId&product=".$product->id."&type=add'><span class='getshop_buy_button gsbutton'>Add to cart</span></a>";
echo "</div>";
foreach ($product->images as $image) {
    /* @var $image core_productmanager_data_ProductImage */
    if ($image->type == 0) {
        ?>
        <a class="lightbox getshop_main_image" rel="group" 
           href="http://<? echo $address . "/displayImage.php?id=" . $image->fileId; ?>" 
           title="<? echo $image->imageDescription; ?>">
            <img src="http://<? echo $address . "/displayImage.php?id=" . $image->fileId; ?>&width=250&height=250" alt="" />
        </a>
        <?
    }
}
echo "<div class='getshop_short_desc'>" . $product->shortDescription . "</div>";
echo "<div class='getshop_subimages'>";
foreach ($product->images as $image) {
    /* @var $image core_productmanager_data_ProductImage */
    if ($image->type != 0) {
        ?>
        <a class="lightbox getshop_main_image" rel="group" 
           href="http://<? echo $address . "/displayImage.php?id=" . $image->fileId; ?>&width=800&height=800">
            <img class='sub_image' src='http://<? echo $address; ?>/displayImage.php?id=<? echo $image->fileId; ?>&width=80&height=80'>
        </a>
        <?
    }
}
echo "</div>";

if ($product->description) {
    echo "<div class='getshop_long_desc'>";
    echo "<div class='getshop_extended_title'>Extended information</div>";
    echo $product->description;
    echo "</div>";
}
?>

<script>
    $j = jQuery.noConflict();
    $j(function() {
        $j('.lightbox').lightBox({fixedNavigation: true});
    });
</script>