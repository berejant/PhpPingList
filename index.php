<?php

$ips = array (
    'www.yandex.ua',
    's37d.storage.yandex.net',
    's29f.storage.yandex.net',
    's17g.storage.yandex.net',
    's90h.storage.yandex.net',
    's88h.storage.yandex.net',
    's73h.storage.yandex.net',
    's51h.storage.yandex.net',
    's87h.storage.yandex.net',
    's79h.storage.yandex.net',
    's18f.storage.yandex.net',
    's83h.storage.yandex.net',
    's72h.storage.yandex.net',
    's27f.storage.yandex.net',
    's61h.storage.yandex.net',
    's68h.storage.yandex.net',
    's74h.storage.yandex.net',
    's75h.storage.yandex.net',
);


$packetsCount = $get_id = filter_input(INPUT_GET, 'c', FILTER_VALIDATE_INT, array(
    'options' => array(
        'default'   => 1,
        'min_range' => 1,
        'max_range' => 4,
    )
));

header('Content-Type:text/plain');

$commandTemplate = sprintf('ping -c %d -t %1$d -o %%s | grep -v "round-trip"', $packetsCount);

echo 'Command: ', $commandTemplate, PHP_EOL, PHP_EOL;

foreach($ips as $ip) {

    echo $ip, ':', PHP_EOL;
    flush();

    $command = sprintf($commandTemplate, escapeshellarg($ip));

    $pingStringResult = exec($command);

    echo '    ', $pingStringResult, PHP_EOL;
    flush();
}

echo PHP_EOL, PHP_EOL, 'end', PHP_EOL;