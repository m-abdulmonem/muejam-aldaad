<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit30e8b4147d83603bd6fcc89a14bffb83
{
    public static $files = array (
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'N' => 
        array (
            'Noodlehaus\\' => 11,
        ),
        'I' => 
        array (
            'Interop\\Container\\' => 18,
        ),
        'F' => 
        array (
            'FastRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
        'Noodlehaus\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
        'Interop\\Container\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit30e8b4147d83603bd6fcc89a14bffb83::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit30e8b4147d83603bd6fcc89a14bffb83::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit30e8b4147d83603bd6fcc89a14bffb83::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}