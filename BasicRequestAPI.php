<?php 
    require __DIR__ . '/vendor/autoload.php';
    use Automattic\WooCommerce\Client;


    $woocommerce = new Client(
        'https://us1.wpdemo.org/wpd_1689364806_7989/tmp-site-qhgzls6f65ctl.us1.wpdemo.org/', // Replace with your store URL
        'ck_3e9719f97425f79814b7fe31b49fa3746cb243c0', // Replace with your consumer key
        'cs_3da01a508eff1cf43399671a037836c364eecf53', // Replace with your consumer secret
        [
            'wp_api' => true,
            'version' => 'wc/v3',
        ]
    );
    ?>