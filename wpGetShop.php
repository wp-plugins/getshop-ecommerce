<?php

/*
  Plugin Name: getshop-ecommerce
  Plugin URI: http://www.getshop.com
  Description: An integration plugin from GetShop
  Version: 1.2
  Author: Boggibill
  Author URI: http://www.getshop.com
  License: GPL
 */
register_activation_hook(WP_PLUGIN_DIR . '/getshop-ecommerce/wpGetShop.php', 'install_getshop');
register_deactivation_hook(WP_PLUGIN_DIR . '/getshop-ecommerce/wpGetShop.php', 'remove_getshop');

wp_deregister_script('jquery');
wp_register_script('jquery',  WP_PLUGIN_URL . '/getshop-ecommerce/js/jquery.js');
wp_enqueue_script('jquery');
wp_enqueue_script('jqueryui', WP_PLUGIN_URL . '/getshop-ecommerce/js/imageuploader/js/vendor/jquery.ui.widget.js');

wp_enqueue_script('fancybox_script', WP_PLUGIN_URL . '/getshop-ecommerce/lightbox/js/lightbox.min.js');
wp_enqueue_script('convertscript', WP_PLUGIN_URL . '/getshop-ecommerce/js/convert.js');
wp_enqueue_script('imageuploadscript', WP_PLUGIN_URL . '/getshop-ecommerce/js/imageuploader/js/jquery.fileupload.js');

wp_enqueue_style('fancybox_css', WP_PLUGIN_URL . '/getshop-ecommerce/js/imageuploader/css/style.css');
wp_enqueue_style('fancybox_css', WP_PLUGIN_URL . '/getshop-ecommerce/js/imageuploader/css/jquery.fileupload.css');

wp_enqueue_style('fancybox_css3', WP_PLUGIN_URL . '/getshop-ecommerce/lightbox/css/lightbox.css');
wp_enqueue_style('default_getshop_styles', WP_PLUGIN_URL . '/getshop-ecommerce/defaultstyles.css');

session_start();
add_shortcode('gsproductlist', 'productlist');
add_shortcode('gsproduct', 'view_product');
add_shortcode('cart', 'view_cart');
add_shortcode('checkout', 'view_checkout');
add_filter('admin_footer_text', 'admin_footer_text', 1);
add_action('admin_menu', 'fwds_plugin_settings');

function getshopSettings($links) {
    $settings_link = '<a href="admin.php?page=ge-settings">settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'getshopSettings');

add_action( 'wp_ajax_addImageToProductAction', 'addImageCallback' );
add_action( 'wp_ajax_removeImageFromProductAction', 'removeImageFromProductCallback' );

function removeImageFromProductCallback() {
    $imageId = $_POST['imageId'];
    $productId = $_POST['productId'];
    $api = initialize_api();
    $product = $api->getProductManager()->getProduct($productId);
    
    $existingImages = $product->imagesAdded;
    $newImageArray = array();
    foreach($existingImages as $img) {
        if($img == $imageId) {
            continue;
        }
        $newImageArray[] = $img;
    }
    $product->imagesAdded = $newImageArray;
    
    $api->getProductManager()->saveProduct($product);
}

function addImageCallback() {
    $files = $_POST['files'];
    $productId = $_POST['productId'];
    $api = initialize_api();
    $product = $api->getProductManager()->getProduct($productId);
    
    foreach($files as $file) {
        $product->imagesAdded[] = $file;
    }
    $api->getProductManager()->saveProduct($product);
    print_images_on_product($product->imagesAdded);
    wp_die();
}

function print_images_on_product($images) {
    foreach($images as $image) {
        echo "<span class='imagecontainer'><i id='".$image."'>X</i><img src='http://www.getshop.com/displayImage.php?id=" . $image . "'></span>";
    }    
}

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
function initialize_api() {
    global $api;
    $sessionId = session_id();
    $api = new GetShopApi(3224, "www.getshop.com", $sessionId);

    $webAddress = get_site_url();
    $webAddress = str_replace("http://", "", $webAddress);
    $webAddress = str_replace("https://", "", $webAddress);
    $admin_email = get_settings('admin_email');

    $store = $api->getStoreManager()->initializeStore($webAddress, $sessionId);
    $password = randomGetShopPassword();
    $user_info = get_userdata(1);
    if (!$store) {
        $store = $api->getStoreManager()->createStore($webAddress, $admin_email, $password, true);
        $api->getStoreManager()->initializeStore($webAddress, $sessionId);
        $user = new core_usermanager_data_User();
        $user->emailAddress = $admin_email;
        $user->username = $admin_email;
        $user->password = $password;
        $user->fullName = $user_info->data->user_nicename;
        $api->getUserManager()->createUser($user);
    }

    if (is_admin()) {
        $user = $api->getUserManager()->getLoggedOnUser();
        if (!$user) {
            $api->getUserManager()->logOn($admin_email, $password);
        }
    }

    return $api;
}

function randomGetShopPassword() {
    if (get_option("getshop_password")) {
        return get_option("getshop_password");
    }
    
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $password = implode($pass); //turn the array into a string
    add_option("getshop_password", $password);
}

function admin_footer_text($footer_text) {
    return "If you like <strong>GetShop eCommerce</strong> please leave us a 5 star rating, or provide us with feedback to make it a five star plugin. A huge thank you from GetShop in advance!";
}

function getShopAdminPage() {
    $api = initialize_api();
    include_once("getshopadminpage.php");
}

function fwds_plugin_settings() {
    add_menu_page('getShopAdminPage', 'GetShop Settings', 'administrator', 'ge-settings', 'getShopAdminPage');
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
    $api = initialize_api();

    if (isset($atts['id'])) {
        $uuid = trim($atts['id']);
        $prodid = get_option("product_id_" . $uuid);
        if (!$prodid) {
            $prodid = $api->getProductManager()->getProduct($uuid)->id;
            add_option("product_id_" . $uuid, $prodid);
        }
        $_GET['productid'] = $uuid;
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
    $api = initialize_api();
    $id = $atts['id'];
    if (!$id) {
        echo "Id settings is incorrect";
        return;
    }
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
                    $content .= "<img class='getshop_image' src='https://www.getshop.com/displayImage.php?id=" . $image->fileId . "&width=100&height=100'>";
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
