<?php

return array(
    'client_id' => 'AZFjoyifGEKdoTbHvh8WiDKD7DKldZ2i0GWGsy74dq29nStdTsEcZW8qtsYL4vMRfsoYGD-i6eF8Tgmo',
    'secret' => 'EOxDDoUwWqYGohqHsfMnvP8EtD7AFv-M6Cqp7nEA88W2krqnyF_ST0fK4EG4w-Cv2aPY5HfMyZo3Z1sU',

    'settings' => array(
        //available 'sandbox' or 'live'
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'http.LogEnabled' => true,
        'log.FileName' => storage_path().'/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
);