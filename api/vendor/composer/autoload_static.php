<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf254e3ef497eb821757a92fa4a75cbcf
{
    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Detection' => 
            array (
                0 => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/namespaced',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Mobile_Detect' => __DIR__ . '/..' . '/mobiledetect/mobiledetectlib/Mobile_Detect.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitf254e3ef497eb821757a92fa4a75cbcf::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf254e3ef497eb821757a92fa4a75cbcf::$classMap;

        }, null, ClassLoader::class);
    }
}
