<?php

$filePath = './generated-reversed-database/schema.xml';
$xml = file_get_contents($filePath);
$xml = str_replace('<database name="default"', '<database name="default" identifierQuoting="true" ', $xml);
file_put_contents($filePath, $xml);