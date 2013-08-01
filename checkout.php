<?
global $api,$address;
$webaddress = getAddress(null);

$address = new core_usermanager_data_Address();
$address->address = @$_POST['address'];
$address->city = @$_POST['city'];
$address->emailAddress = @$_POST['emailAddress'];
$address->fullName = @$_POST['fullName'];
$address->phone = @$_POST['phone'];
$address->postCode = @$_POST['postCode'];

$sessid = session_id();

/* @var $api GetShopApi */

if (isset($_POST['fullName'])) {
    if (!$address->fullName || !$address->emailAddress || !$address->address || !$address->postCode || !$address->city || !$address->phone) {
        echo "<span class='warning'>All fields are required.</span>";
    } else {
        //Save the address and continue to 
        $api->getCartManager()->setAddress($address);
        $order = $api->getOrderManager()->createOrder($address);  
        $order->cart = $api->getCartManager()->getCart();

        
        /* @var $apps core_appmanager_data_AvailableApplications */
        $apps = $api->getPageManager()->getApplicationsByType("PaymentApplication");
        if(sizeof($apps) > 1) {
            echo "Please select a payment method";
            foreach($apps as $app) {
                /* @var $app core_common_AppConfiguration */
                $ns = "ns_" . str_replace("-","_",$app->appSettingsId);
                $name = $app->appName;
                $api->getOrderManager()->saveOrder($order);
                
                echo "<span class='payment' onclick='document.location.href=\"http://$webaddress/loadPayment.php?session_id=$sessid&id=".$app->id."&orderid=".$order->id."\"'>";
                echo '<img src="http://'.$webaddress.'/showApplicationImages.php?appNamespace='.$ns.'&image='.$name.'.png">';
                echo "</span>";            
            }
        } else if(sizeof($apps) == 1) {
            //Transfer directly to this payment option.
        } else {
            echo "Thank you for your order, it will be processed as soon as possible.";
        }
        return;
    }
}
?>
<form action='' method='POST' id='addressform'>
    <table>
        <tbody><tr><td class="col1 firstname">Full name</td><td><input type="textfield" name="fullName" value="<? echo $address->fullName; ?>"></td></tr>
            <tr><td class="col1 email">Email</td><td><input type="textfield" name="emailAddress" value="<? echo $address->emailAddress; ?>"></td></tr>
            <tr><td class="col1 address">Address</td><td><input type="textfield" name="address" value="<? echo $address->address; ?>"></td></tr>
            <tr><td class="col1 postcode">Postal code</td><td><input type="textfield" name="postCode" value="<? echo $address->postCode; ?>"></td></tr>
            <tr><td class="col1 city">City</td><td><input type="textfield" name="city" value="<? echo $address->city; ?>"></td></tr>
            <tr><td class="col1 phone">Phone</td><td><input type="textfield" name="phone" value="<? echo $address->phone; ?>"></td></tr>
        </tbody></table>
    <span class='buy_button gsbutton' onclick='document.getElementById("addressform").submit();'>Continue</span>
</form>
