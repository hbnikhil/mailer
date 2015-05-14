<?php
require 'vendor/autoload.php';
require 'Unit/OrderTest.php';

$data = array();

$data['customer_name'] = "Joseph";
$data['customer_id'] = "27118793";
$data['order_number'] = "2991867";
$data['delivery_date'] = date("jS F");
$data['order_id'] = "12";

$data['product'][0]['name'] = "Lenovo ThinkPad T440s 20AQ - 14\" - Core i7 4600U - Windows 7 Pro 64-bit / 8 Pro 64-bit downgrade - 8 GB RAM - 256 GB SSD";
$data['product'][0]['id'] = "50";
$data['product'][0]['image'] = "product1.jpg";
$data['product'][0]['price'] = "1,310.58";
$data['product'][0]['qty'] = "1";
$data['product'][0]['mpn'] = "20AQ0069UK";


$data['product'][1]['name'] = "Dell Vostro 2454 - 14\" - Core i7 4600U - Windows 7 Pro 64-bit / 8 Pro 64-bit downgrade - 8 GB RAM - 256 GB SSD";
$data['product'][1]['id'] = "55";
$data['product'][1]['image'] = "product2.jpg";
$data['product'][1]['price'] = "1,300.58";
$data['product'][1]['qty'] = "1";
$data['product'][1]['mpn'] = "20AQ0069UK";


$data['address']['delivery']['address'] = "1886 Gladwell Street";
$data['address']['delivery']['city'] = "Millington";
$data['address']['delivery']['state_code'] = "TN";
$data['address']['delivery']['postal_code'] = "38053";

$data['address']['invoice']['address'] = "1886 Gladwell Street";
$data['address']['invoice']['city'] = "Millington";
$data['address']['invoice']['state_code'] = "TN";
$data['address']['invoice']['postal_code'] = "38053";

$data['address']['card']['address'] = "1886 Gladwell Street";
$data['address']['card']['city'] = "Millington";
$data['address']['card']['state_code'] = "TN";
$data['address']['card']['postal_code'] = "38053";

$obj = new OrderTest;
$order_state = $obj->testCanBeOrderMail($data);

if($order_state == 1) {
	echo "success"; exit;
} else {
	echo "fail"; exit;
}
//echo "<pre>"; print_r($data); exit;

?>
