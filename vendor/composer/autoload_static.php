<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit75d130b833c3aa1bcbb981452a192142
{
    public static $prefixLengthsPsr4 = array (
        'U' => 
        array (
            'Utopia\\Swoole\\' => 14,
            'Utopia\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Utopia\\Swoole\\' => 
        array (
            0 => __DIR__ . '/..' . '/utopia-php/swoole/src/Swoole',
        ),
        'Utopia\\' => 
        array (
            0 => __DIR__ . '/..' . '/utopia-php/framework/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit75d130b833c3aa1bcbb981452a192142::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit75d130b833c3aa1bcbb981452a192142::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit75d130b833c3aa1bcbb981452a192142::$classMap;

        }, null, ClassLoader::class);
    }
}
