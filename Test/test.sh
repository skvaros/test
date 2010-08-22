#!/bin/bash
PHPUNIT="/opt/lampp/lib/php/phpunit"

sleep 30 &

$PHPUNIT AllTests
wait

