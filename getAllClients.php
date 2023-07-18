<?php
// Imposta le credenziali di accesso alle API di WooCommerce
$consumer_key = 'ck_1504b69b64ea659a3aca206617c025d97063d4b9';
$consumer_secret = 'cs_5e144673e9ab86e45c9183d6908e155531d21a8d';
$store_url = 'https://us1.wpdemo.org/wpd_1689714997_4757/tmp-site-qsgnfpapjxftl.us1.wpdemo.org/';
// URL per ottenere la lista dei clienti
$api_url = $store_url . '/wp-json/wc/v3/customers';
// Crea l'intestazione per l'autenticazione
$auth_headers = array(
    'Authorization: Basic ' . base64_encode($consumer_key . ':' . $consumer_secret),
);
// Inizializza una nuova richiesta cURL
$ch = curl_init();
// Imposta l'URL e altre opzioni per la richiesta cURL
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $auth_headers);
// Esegui la richiesta cURL e ottieni la risposta
$response = curl_exec($ch);
// Controlla se la richiesta ha avuto successo
if (curl_errno($ch)) {
    echo 'Errore nella richiesta API: ' . curl_error($ch);
} else {
    // Decodifica la risposta JSON
    $customers = json_decode($response, true);
    // Stampa la lista dei clienti
    foreach ($customers as $customer) {
        echo 'ID cliente: ' . $customer['id'] . '<br>';
        echo 'Nome: ' . $customer['first_name'] . ' ' . $customer['last_name'] . '<br>';
        echo 'Email: ' . $customer['email'] . '<br><br>';
    }
}
// Chiudi la connessione cURL
curl_close($ch);
?>