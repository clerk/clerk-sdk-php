<?php

declare(strict_types=1);

$fixture = json_decode(file_get_contents(__DIR__.'/response.json'), true, flags: JSON_THROW_ON_ERROR);
$matches = ($_SERVER['HTTP_AUTHORIZATION'] ?? '') === $fixture['authorization']
    && $_SERVER['REQUEST_URI'] === $fixture['path'];
file_put_contents(__DIR__.'/requests.log', "request\n", FILE_APPEND);
header('Content-Type: application/json');
echo json_encode(['keys' => $matches ? [$fixture['key']] : []], JSON_THROW_ON_ERROR);
