<?php
// Replace with your WooCommerce API credentials
$consumer_key = 'ck_f6695b93ca42dc6fed1531f0c9ec1d8b8f741258';
$consumer_secret = 'cs_bbc9e4d9979a32bf0fbba00f16484c2f5f45dbe4';
$store_url = 'https://us1.wpdemo.org/wpd_1689708302_3548/tmp-site-qq74bsw3hwftl.us1.wpdemo.org/wp-json/wc/v3';
// Set the request URL
$request_url = $store_url . '/products';
// Create a cURL session
$ch = curl_init($request_url);
// Set the cURL options
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));
curl_setopt($ch, CURLOPT_USERPWD, $consumer_key . ':' . $consumer_secret);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the request
$response = curl_exec($ch);
// Close the cURL session
curl_close($ch);
// Process the response
if ($response) {
    $products = json_decode($response, true);
?>
    <!-- PRINT THE TABLE WITH THE RESULTS -->
    <table id="product-table" class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) { ?>
                <tr data-id="<?php echo $product['id']; ?>">
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><img src="<?php echo $product['images'][0]['src']; ?>" alt="Product Image" width="100"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} else {
    echo 'Failed to retrieve products.';
}
?>