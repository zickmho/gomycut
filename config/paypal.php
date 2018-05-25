<?php

return array(
    'client_id' => 'AZFjoyifGEKdoTbHvh8WiDKD7DKldZ2i0GWGsy74dq29nStdTsEcZW8qtsYL4vMRfsoYGD-i6eF8Tgmo',
    // 'client_id' => 'ASJ9x1jC21QevvBF8Dfv_VYq7zG5bP6oK4MV_AjJjVtjmWjnL9rLv9OZKhkHhAjhg9IdO0oDZ2jBbB-5',
    'secret' => 'EOxDDoUwWqYGohqHsfMnvP8EtD7AFv-M6Cqp7nEA88W2krqnyF_ST0fK4EG4w-Cv2aPY5HfMyZo3Z1sU',
    // 'secret' => 'EPMwRKwDAqHTycLKGR5yIBC4ifMLShfD4r_b9kjlLjDkUmw65kNKLVG_6Uy3jFZFRA31Wo4zedC-FOIL',

    'settings' => array(
        //available 'sandbox' or 'live'
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'http.LogEnabled' => true,
        'log.FileName' => storage_path().'/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
);
