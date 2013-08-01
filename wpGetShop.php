<?php

/*
  Plugin Name: getshop-ecommerce
  Plugin URI: http://www.getshop.com
  Description: An integration plugin from GetShop
  Version: 1.1
  Author: Boggibill
  Author URI: http://www.getshop.com
  License: GPL
 */
register_activation_hook(WP_PLUGIN_DIR . '/getshop-ecommerce/wpGetShop.php', 'install_getshop');
register_deactivation_hook(WP_PLUGIN_DIR . '/getshop-ecommerce/wpGetShop.php', 'remove_getshop');
wp_enqueue_script('jquery');
wp_enqueue_script('fancybox_script', WP_PLUGIN_URL . '/getshop-ecommerce/lightbox/lightbox.js');

wp_enqueue_style('fancybox_css', WP_PLUGIN_URL . '/getshop-ecommerce/lightbox/lightbox.css');
wp_enqueue_style('default_getshop_styles', WP_PLUGIN_URL . '/getshop-ecommerce/defaultstyles.css');

session_start();
add_shortcode('productlist', 'productlist');
add_shortcode('product', 'view_product');
add_shortcode('cart', 'view_cart');
add_shortcode('checkout', 'view_checkout');

function __autoload($class_name) {
    $filepath = str_replace("_", "/", $class_name);
    $path = __DIR__ . "/events/" . $filepath . ".php";
    if (file_exists($path)) {
        include_once($path);
    }
}

//Including the getshop api.
include_once("events/API.php");
include_once("events/API2.php");
include_once("events/CommunicationHelper.php");

$api = null;

/**
 * @param type $address
 * @return \GetShopApi
 */
function initialize_api($address) {
    global $api;
    $api = new GetShopApi(21, "www.getshop.com");
    $api->getStoreManager()->initializeStore($address, session_id());
    return $api;
}

function getAddress($uuid) {
    if ($uuid != null) {
        $address = get_option("gs_" . $uuid);
        if (!$address) {
            $api = initialize_api("www.getshop.com");
            $address = $api->getGetShop()->findAddressForUUID($uuid);
            add_option("gs_" . $uuid, $address);
            if (get_option("gs_main")) {
                update_option("gs_main", $address);
            } else {
                add_option("gs_main", $address);
            }
        }
    } else {
        $address = get_option("gs_main");
    }
    initialize_api($address);
    return $address;
}

function install_getshop() {
    // Create post object
    $_p = array();
    $_p['post_title'] = "Product page view";
    $_p['post_content'] = "[product]";
    $_p['post_status'] = 'publish';
    $_p['post_type'] = 'page';
    $_p['id'] = 'product';
    $_p['comment_status'] = 'closed';
    $_p['ping_status'] = 'closed';
    $_p['post_category'] = array(1); // the default 'Uncatrgorised'
    // Insert the post into the database
    $the_page_id = wp_insert_post($_p);
    if (get_option("product_page_id")) {
        update_option("product_page_id", $the_page_id);
    } else {
        add_option("product_page_id", $the_page_id);
    }

    // Insert the post into the database
    $_p['post_title'] = "Cart";
    $_p['post_content'] = "[cart]";
    $the_page_id = wp_insert_post($_p);
    if (get_option("product_page_id")) {
        update_option("cart_page_id", $the_page_id);
    } else {
        add_option("cart_page_id", $the_page_id);
    }

    $_p['post_title'] = "Checkout";
    $_p['post_content'] = "[checkout]";
    $the_page_id = wp_insert_post($_p);
    if (get_option("checkout_page_id")) {
        update_option("checkout_page_id", $the_page_id);
    } else {
        add_option("checkout_page_id", $the_page_id);
    }
}

function remove_getshop() {
    wp_delete_post(get_option("checkout_page_id"));
    wp_delete_post(get_option("cart_page_id"));
    wp_delete_post(get_option("product_page_id"));

    delete_option("checkout_page_id");
    delete_option("cart_page_id");
    delete_option("product_page_id");
    delete_option("getshop_address");
}

function view_product($atts) {
    if (isset($atts['id'])) {
        $uuid = trim($atts['id']);
        $address = getAddress($uuid);
        $prodid = get_option("product_id_" . $uuid);
        if (!$prodid) {
            $api = initialize_api($address);
            $prodid = $api->getProductManager()->getProductFromApplicationId($uuid)->id;
            add_option("product_id_" . $uuid, $prodid);
        }
        $_GET['productid'] = $prodid;
    }
    echo "<div class='productview'>";
    require('productview.php');
    echo "</div>";
}

function view_checkout() {
    echo "<div class='checkoutview'>";
    require('checkout.php');
    echo "</div>";
}

function view_cart() {
    echo "<div class='cartview'>";
    require('cart.php');
    echo "</div>";
}

function productlist($atts) {
    global $api;
    $id = $atts['id'];
    if (!$id) {
        echo "Id settings is incorrect";
        return;
    }
    $address = getAddress($id);
    $pageId = get_option("product_page_id");
    $criteria = new core_productmanager_data_ProductCriteria();
    $criteria->listId = $id;
    $products = $api->getProductManager()->getProducts($criteria);

    $content = "";

    foreach ($products as $product) {
        /* @var $product core_productmanager_data_Product */
        $content .= "<div class='getshop_product_row'>";
        $content .= "<a href='?page_id=" . $pageId . "&productid=" . $product->id . "'>";
        $content .= "<div class='getshop_name'>" . $product->name . "</div>";
        $content .= "<span class='getshop_price'>" . $product->price . ",-</span>";
        if ($product->images) {
            foreach ($product->images as $image) {
                /* @var $image core_productmanager_data_ProductImage */
                if ($image->type == 0) {
                    $content .= "<img class='getshop_image' src='http://" . $address . "/displayImage.php?id=" . $image->fileId . "&width=100&height=100'>";
                }
            }
        }
        $content .= "<span class='short_desc'>" . $product->shortDescription . "</span>";
        $content .= "</a>";
        $content .= "</div>";
    }

    echo $content;
}

?>
