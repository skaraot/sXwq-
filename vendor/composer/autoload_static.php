<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit91c1d161db1cb087d4cd20c062e1afa0
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'VendingMachine\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'VendingMachine\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit91c1d161db1cb087d4cd20c062e1afa0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit91c1d161db1cb087d4cd20c062e1afa0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}