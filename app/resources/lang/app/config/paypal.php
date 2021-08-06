<?php

return array(

    'client_id' => 'ATHvHcapSglW_83h9nXqYV9WFPcpFIyJ_zDFriw3jU6QVUpzl_7qacFKty_ok6lJc6j7kqwxe-SlKMXC',
    'secret' => 'EPV2iuTqhaMHu_bmpeTBxYLFVYoVtAow3wrq5DYtQ5AD2XrflRlA1v5VmxRxLUPjOjdg12SqtqVt8qar',

    'settings' => array(

        //sanbox or live
        'mode' => 'sandbox',

        'http.ConnectionTimeOut' => 30,

        'log.LogEnabled' => true,

        'log.FileName' => storage_path() . '/logs/paypal.log',

        'log.LogLevel' => 'FINE',

    ),
);
