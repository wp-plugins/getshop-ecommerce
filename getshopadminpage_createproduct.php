<?
/* @var $api GetShopApi */
if(isset($_POST['title']) && $_POST['title']) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $sku = $_POST['sku'];
    $product = $api->getProductManager()->createProduct();
    $product->name = $title;
    $product->price = $price;
    $product->sku = $sku;
    $api->getProductManager()->saveProduct($product);
    echo "<script>";
    echo "window.location.href='?page=ge-settings&tab=editproduct&id=" . $product->id . "'";
    echo "</script>";
}

?>
<form action='' method='POST'>
    <h1>Create a new product</h1>
    <div class="settingsrow">
        <div class="settings_name">
            Product title
        </div>
        <div class="settingsvalue">
            <input type='txt' name='title'>
        </div>
    </div>
    <div class="settingsrow">
        <div class="settings_name">
            Price (inc taxes)
        </div>
        <div class="settingsvalue">
            <input type='txt' name='price'>
        </div>
    </div>
    <div class="settingsrow">
        <div class="settings_name">
            SKU (unique idenitifier, optional)
        </div>
        <div class="settingsvalue">
            <input type='txt' name='sku'>
        </div>
    </div>
    <div class="settingsrow">
        <div class="settings_name">
            &nbsp;
        </div>
        <div class="settingsvalue">
            <input type="submit" class="button" value="Create product"></span>
        </div>
    </div>
</form>

<style>
    .settingsrow { clear:both; padding-bottom: 10px; padding-top: 10px; height: 20px; }
    .settingsrow div { width: 30%; float:left; display:inline-block; }
    .settingsrow .settingsvalue { width: 70%; }
</style>