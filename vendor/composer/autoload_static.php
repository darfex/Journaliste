<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ebc55b994e49c065638b7a35f83c611
{
    public static $classMap = array (
        'App\\Controllers\\BlogController' => __DIR__ . '/../..' . '/app/controllers/BlogController.php',
        'App\\Controllers\\PagesController' => __DIR__ . '/../..' . '/app/controllers/PagesController.php',
        'App\\Controllers\\UsersController' => __DIR__ . '/../..' . '/app/controllers/UsersController.php',
        'App\\Model\\HOME' => __DIR__ . '/../..' . '/app/model/home.php',
        'App\\Model\\Post' => __DIR__ . '/../..' . '/app/model/post.php',
        'App\\Model\\User' => __DIR__ . '/../..' . '/app/model/auth.php',
        'ComposerAutoloaderInit8ebc55b994e49c065638b7a35f83c611' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit8ebc55b994e49c065638b7a35f83c611' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/connection.php',
        'Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'Core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/queryBuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit8ebc55b994e49c065638b7a35f83c611::$classMap;

        }, null, ClassLoader::class);
    }
}
