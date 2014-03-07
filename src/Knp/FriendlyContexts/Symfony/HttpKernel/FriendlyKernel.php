<?php

namespace Knp\FriendlyContexts\Symfony\HttpKernel;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

class FriendlyKernel extends Kernel
{
    protected $bundles = [];

    public function addBundle(BundleInterface $bundle)
    {
        $this->bundles[] = $bundle;

        return $this;
    }

    public function registerBundles()
    {
        $bases = [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
        ];

        return array_merge($bases, $this->bundles);
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {

    }
}
