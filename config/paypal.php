<?php

return array(
    // 'client_id' => 'AZFjoyifGEKdoTbHvh8WiDKD7DKldZ2i0GWGsy74dq29nStdTsEcZW8qtsYL4vMRfsoYGD-i6eF8Tgmo',
    // 'secret' => 'EOxDDoUwWqYGohqHsfMnvP8EtD7AFv-M6Cqp7nEA88W2krqnyF_ST0fK4EG4w-Cv2aPY5HfMyZo3Z1sU',

    // 'client_id' => 'ASJ9x1jC21QevvBF8Dfv_VYq7zG5bP6oK4MV_AjJjVtjmWjnL9rLv9OZKhkHhAjhg9IdO0oDZ2jBbB-5',
    // 'secret' => 'EPMwRKwDAqHTycLKGR5yIBC4ifMLShfD4r_b9kjlLjDkUmw65kNKLVG_6Uy3jFZFRA31Wo4zedC-FOIL',

    /**
     * Set our Sandbox and Live credentials
     */
    'sandbox_client_id' => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
    'sandbox_secret' => env('PAYPAL_SANDBOX_SECRET', ''),
    'live_client_id' => env('PAYPAL_LIVE_CLIENT_ID', ''),
    'live_secret' => env('PAYPAL_LIVE_SECRET', ''),

    'settings' => array(
        //available 'sandbox' or 'live'
        'mode' => env('PAYPAL_MODE', 'sandbox'),
        'http.ConnectionTimeOut' => 3000,
        'http.LogEnabled' => true,
        'log.FileName' => storage_path().'/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
);
