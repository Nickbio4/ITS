<?php
// Replace with your WooCommerce API credentials
$consumer_key = 'ck_1504b69b64ea659a3aca206617c025d97063d4b9';
$consumer_secret = 'cs_5e144673e9ab86e45c9183d6908e155531d21a8d';
$store_url = 'https://us1.wpdemo.org/wpd_1689714997_4757/tmp-site-qsgnfpapjxftl.us1.wpdemo.org/wp-json/wc/v3'; // CAMBIA SOLO URL SITO NON ENDPOINT
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