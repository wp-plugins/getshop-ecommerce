<?
/* @var $api GetShopApi */
$id = $_GET['id'];
$product = $api->getProductManager()->getProduct($id);

if (isset($_POST['update_product'])) {
    $product->name = $_POST['name'];
    $product->sku = $_POST['sku'];
    $product->price = $_POST['price'];
    $product->stockQuantity = $_POST['stockQuantity'];
    $product->shortDescription = $_POST['shortDescription'];
    $api->getProductManager()->saveProduct($product);
    echo "<div class='success'>Product has been updated</div>";
}
?>
<form action='' method='POST'>
    <h1><? echo $product->name; ?></h1>
    &nbsp;&nbsp;&nbsp;Shortcode, [gsproduct id="<? echo $product->id; ?>"]
    <div class="settingsrow">
        <div class="settings_name">
            Product name
        </div>
        <div class="settingsvalue">
            <input type='text' value='<? echo $product->name; ?>' name='name'>
        </div>
    </div>
    <div class="settingsrow">
        <div class="settings_name">
            Price
        </div>
        <div class="settingsvalue">
            <input type='text' value='<? echo $product->price; ?>' name='price'>
        </div>
    </div>
    <div class="settingsrow">
        <div class="settings_name">
            SKU
        </div>
        <div class="settingsvalue">
            <input type='text' value='<? echo $product->sku; ?>' name='sku'>
        </div>
    </div>
    <div class="settingsrow">
        <div class="settings_name">
            Quantity
        </div>
        <div class="settingsvalue">
            <input type='text' value='<? echo $product->stockQuantity; ?>' name='stockQuantity'>
        </div>
    </div>
    <div class="settingsrow">
        <div class="settings_name">
            Description
        </div>
        <div class="settingsvalue">
            <textarea type='text' name='shortDescription' class='shortDescription'><? echo $product->shortDescription; ?></textarea>
        </div>
    </div>

    <div class="settingsrow">
        <div class="settings_name">
            &nbsp;
        </div>
        <div class="settingsvalue">
            <input type='submit' class='button' value='Update product' name='update_product'>
        </div>
    </div>
</form><br><br>

<h1>Images attached to product</h1>

<?
echo "<div class='imagecontainer_for_product'>";
if (empty($product->imagesAdded)) {
    echo "No images has been uploaded to this product yet, please upload one.";
} else {
    print_images_on_product($product->imagesAdded);
}
echo "</div>";
?>
<div style='clear:both;'></div>

<div class="container">
    <br>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success" style="height: 20px; background-color: green; width: 0%; "></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
</div>

<script>
    /*jslint unparam: true */
    /*global window, $ */
    $(function () {
        'use strict';
        
        $(document).on('click', '.imagecontainer i', function() {
            var id = $(this).attr('id');
            var toRemove = $(this).parent();
            
            var toPost = {
                    'action': 'removeImageFromProductAction',
                    'productId' : '<? echo $id; ?>',
                    'imageId': id
                };
                
                  jQuery.post(ajaxurl, toPost, function(response) {
                      toRemove.fadeOut();
                });
            
        });
        
        $('#fileupload').fileupload({
            url: "https://www.getshop.com/uploadImage.php",
            dataType: 'json',
            done: function (e, data) {
                var toPost = {
                    'action': 'addImageToProductAction',
                    'productId' : '<? echo $id; ?>',
                    'files': data.result      // We pass php values differently!
                };
                
                  jQuery.post(ajaxurl, toPost, function(response) {
                      $('#progress .progress-bar').css('width','0%');
                      $('.imagecontainer_for_product').html(response);
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                        'width',
                        progress + '%'
                        );
            }
        }).prop('disabled', !$.support.fileInput)
                .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>




<style>
    .imagecontainer_for_product img { max-width: 150px; max-height: 150px;}
    .settingsrow { clear:both; padding-bottom: 10px; padding-top: 10px; height: 20px; }
    .settingsrow div { width: 30%; float:left; display:inline-block; }
    .settingsrow .settingsvalue { width: 70%; }
    .shortDescription { width: 500px; height: 100px; }
    .success { border: solid 1px #bbb; background-color:green; text-align: center; color:#FFF; padding: 10px; }
    .imagecontainer { position:relative; display:inline-block; border: solid 1px; height: 150px; width: 150px; margin:5px; float:left; }
    .imagecontainer i { position:absolute; right: 5px; top: 5px; border: solid 1px; background-color:#fff; padding: 3px; border-radius: 3px; cursor:pointer; }
</style>