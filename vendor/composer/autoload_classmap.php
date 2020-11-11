<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Controllers\\BlogController' => $baseDir . '/app/controllers/BlogController.php',
    'App\\Controllers\\PagesController' => $baseDir . '/app/controllers/PagesController.php',
    'App\\Controllers\\UsersController' => $baseDir . '/app/controllers/UsersController.php',
    'App\\Models\\Post' => $baseDir . '/app/models/post.php',
    'App\\Models\\User' => $baseDir . '/app/models/auth.php',
    'ComposerAutoloaderInit8ebc55b994e49c065638b7a35f83c611' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInit8ebc55b994e49c065638b7a35f83c611' => $vendorDir . '/composer/autoload_static.php',
    'Connection' => $baseDir . '/core/database/connection.php',
    'Core\\App' => $baseDir . '/core/App.php',
    'Core\\Request' => $baseDir . '/core/Request.php',
    'Core\\Router' => $baseDir . '/core/Router.php',
    'QueryBuilder' => $baseDir . '/core/database/queryBuilder.php',
);
