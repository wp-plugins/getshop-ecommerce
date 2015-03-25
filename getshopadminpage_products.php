<h1>Shortcodes</h1>
[gsproductlist id="6c7eb8ff-bf92-4622-814b-19523919c24f"]<br>
[gsproduct id="37209802-6426-4a0f-a795-f4a429f4cc00"]<br>
<br>
<h1>Products</h1>
<?
/* @var $api GetShopApi */
if(isset($_POST['delete_products'])) {
    foreach($_POST as $name => $value) {
        if(stristr($name, "product_") && $value == "on") {
            $id = str_replace("product_", "", $name);
            $api->getProductManager()->removeProduct($id);
        }
    }
}
$products = $api->getProductManager()->getAllProducts();
if(isset($_POST['createproductlist'])) {
    $name = $_POST['listname'];
    $api->getProductManager()->createProductList($name);
}
if(isset($_POST['deletelists'])) {
    foreach($_POST as $name => $value) {
        if(stristr($name, "list_") && $value == "on") {
            $id = str_replace("list_", "", $name);
            $api->getProductManager()->deleteProductList($id);
        }
    }
}

echo "<form action='' method='POST'>";
if(sizeof($products) == 0) {
    echo "You do not have any products created yet.";
} else {
    echo "<table width='100%'>";
    echo "<tr>";
    echo "<th align='left'>Product id</th>";
    echo "<th align='left'>Product title</th>";
    echo "<th align='left'>Price</th>";
    echo "</tr>";
    foreach($products as $product) {
        echo "<tr>";
        echo "<td width='300'><input type='checkbox' name='product_".$product->id."'>" . $product->id . "</td>";
        echo "<td>" . $product->name . " - <a href='?page=ge-settings&tab=editproduct&id=" . $product->id."' style='text-decoration:none;' >edit product</a></td>";
        echo "<td width='10'>" . $product->price . "</td>";
        echo "<td width='10'></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<br><br>
<div style="text-align: right;">
    <? if(sizeof($products) > 0) { ?>   
        <input type='submit' class="button" style="float:left;" value='Remove selected products' name='delete_products'>
    <? } ?>
    <a href='?page=ge-settings&tab=createproduct'><span class="button">Create a new product</span></a>
</div>
<? echo '</form>'; ?>
<br><br>
<h1>Product lists</h1>

<form action='' method='POST'>
    <?
    $lists = $api->getProductManager()->getProductLists();
    if(sizeof($lists) == 0) {
        echo "No lists created yet, create one first.";
    } else {
        foreach($lists as $list) {
            echo "<input type='checkbox' name='list_".$list->id."'>" .$list->id. " - " . $list->listName . "<a style='float:right'>manage product list</a><br>";
        }
    }
    ?>
    <br>
    <br>
    <?
    if(sizeof($lists) > 0) {
        ?>
        <input type='submit' style='float:left;' class="button" name='deletelists' value='Remove selected lists'>
        <?
    }
    ?>
    <div style="text-align: right;">
        <input type='text' placeholder='Name of list' name='listname'><input type='submit' class="button" name='createproductlist' value='Create a new product list'>
    </div>
</form>



