<?php
global $api;


$product_id = $_GET['product'];
$address = getAddress($product_id);
$pageId = $_GET['page_id'];

$cartManager = $api->getCartManager();
$viewid = get_option("product_page_id");
$checkoutid = get_option("checkout_page_id");
/* @var $api GetShopApi */
if ($_GET['type'] == "add") {
//    echo "adding to cart";
    $cartManager->addProduct($product_id, 1, array());
} else if($_GET['type'] == "delete") {
    $cartManager->removeProduct($product_id);
} else {
//    echo "removing from cart";
    
}

$cart = $cartManager->getCart();
$items = $cart->items;

if (isset($_GET['increaseProduct'])) {
    $itemToIncrease = $_GET['increaseProduct'];
    foreach ($items as $item) {
        if ($itemToIncrease == $item->cartItemId) {
            $cartManager->updateProductCount($itemToIncrease, $item->count + 1);
            $cart = $cartManager->getCart(); 
           $items = $cart->items;
            break;
        }
    }
}

if (isset($_GET['decreaseProduct'])) {
    $itemTodecrease = $_GET['decreaseProduct'];
    foreach ($items as $item) {
        if ($itemTodecrease == $item->cartItemId) {
            $cartManager->updateProductCount($itemTodecrease, $item->count - 1);
            $cart = $cartManager->getCart();
            $items = $cart->items;
            break;
        }
    }
}

$total_amount = $cartManager->getCartTotalAmount();
?>
    <?
    foreach ($items as $item) {
        $imgId = false;
        $product = $item->product;
        foreach ($product->images as $img) {
            if ($img->type == "0") {
                $imgId = $img->fileId;
            }
        }
        ?>
        <div class='getshop_product'>
            <div class='getshop_countcontainer'>
                <a href='<? echo "?page_id=$pageId&type=delete&product=".$item->cartItemId; ?>'><span class='delete'><img src='<? echo WP_PLUGIN_URL;?>/getshop-ecommerce/x.png'></span></a>
                <a href='<? echo "?page_id=$pageId&increaseProduct=".$item->cartItemId; ?>'><span class='up'><img src='<? echo WP_PLUGIN_URL;?>/getshop-ecommerce/arrow_up.png'></span></a>
                <? echo $item->count; ?>
                <a href='<? echo "?page_id=$pageId&decreaseProduct=".$item->cartItemId; ?>'><span class='down'><img src='<? echo WP_PLUGIN_URL;?>/getshop-ecommerce/arrow_down.png'></span></a>
            </div>
            <img class='getshop_image' src='http://<? echo "$address/displayImage.php?id=$imgId"; ?>&width=150&height=150'>
            <div><a class='getshop_title' href='<? echo "?page_id=$viewid&productid=".$product->id; ?>&type=add'><? echo $product->name; ?></a></div>
            <div class='getshop_short_desc'><? echo $product->shortDescription; ?></div>
            <span class='getshop_total'>
                <? echo $api->getProductManager()->getPrice($product->id, $item->variations) * $item->count . ",-"; ?>
            </span>
        </div>
        <?
    }
    ?>
    <a href='?page_id=<? echo $checkoutid; ?>'><span class='buy_button gsbutton'>Continue to checkout</span></a>
    <div class='getshop_bottom_total'>
        Total amount <span class='getshop_total'><? echo $total_amount; ?></span>
    </div>