<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9d8833294cc7806cc2c9e043ead23c40
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MaxMind\\' => 8,
        ),
        'I' => 
        array (
            'IPTools\\' => 8,
        ),
        'G' => 
        array (
            'GeoIp2\\' => 7,
        ),
        'C' => 
        array (
            'Composer\\CaBundle\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MaxMind\\' => 
        array (
            0 => __DIR__ . '/..' . '/maxmind/web-service-common/src',
        ),
        'IPTools\\' => 
        array (
            0 => __DIR__ . '/..' . '/s1lentium/iptools/src',
        ),
        'GeoIp2\\' => 
        array (
            0 => __DIR__ . '/..' . '/geoip2/geoip2/src',
        ),
        'Composer\\CaBundle\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/ca-bundle/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'MaxMind' => 
            array (
                0 => __DIR__ . '/..' . '/maxmind-db/reader/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9d8833294cc7806cc2c9e043ead23c40::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9d8833294cc7806cc2c9e043ead23c40::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit9d8833294cc7806cc2c9e043ead23c40::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
