<?php

// Create a DSN for the database using its filename
$filename = require __DIR__ . '/../db/connect.php';

return [
    'class' => 'yii\db\Connection',
    'dsn' => "$filename",
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
