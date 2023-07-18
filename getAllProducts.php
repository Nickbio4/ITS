<?php

// WooCommerce API credentials
$consumer_key = 'ck_f6695b93ca42dc6fed1531f0c9ec1d8b8f741258';
$consumer_secret = 'cs_bbc9e4d9979a32bf0fbba00f16484c2f5f45dbe4';
$store_url = 'https://us1.wpdemo.org/wpd_1689708302_3548/tmp-site-qq74bsw3hwftl.us1.wpdemo.org/';

// Effettua la richiesta per ottenere l'elenco dei prodotti
$endpoint = $store_url . '/wp-json/wc/v3/products';
$request_url = $endpoint . '?consumer_key=' . $consumer_key . '&consumer_secret=' . $consumer_secret;
$response = file_get_contents($request_url);
$products = json_decode($response, true);

?>

<!-- STAMPA RISULTATO IN TABELLA BOOTSTRAP -->
<div class="container">
  <h2>Lista prodotti</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID prodotto</th>
        <th>Immagine</th>
        <th>Nome prodotto</th>
        <th>Prezzo prodotto</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) { ?>
      <tr>
        <td><?php echo $product['id']; ?></td>
        <td><img src="<?php echo $product['images'][0]['src']; ?>" alt="<?php echo $product['name']; ?>" style="max-width: 100px;"></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['price']; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>

