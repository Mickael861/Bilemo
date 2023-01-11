<?php

namespace App;

use Bazinga\Bundle\HateoasBundle\BazingaHateoasBundle;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        $bundles = [
            new BazingaHateoasBundle()
        ];

        return $bundles;
    }
}
