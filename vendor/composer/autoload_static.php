<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite51a0d7e4cff10052a0cad0b2ca8f252
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite51a0d7e4cff10052a0cad0b2ca8f252::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite51a0d7e4cff10052a0cad0b2ca8f252::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite51a0d7e4cff10052a0cad0b2ca8f252::$classMap;

        }, null, ClassLoader::class);
    }
}