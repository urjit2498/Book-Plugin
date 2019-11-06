<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2985de3cbb609b3fe925939b8c6f2dae
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2985de3cbb609b3fe925939b8c6f2dae::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2985de3cbb609b3fe925939b8c6f2dae::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
