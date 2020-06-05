<?php

namespace Didublab\CookielawBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class DidublabCookielawExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        $container->setParameter('didublab_cookielaw.cookie_name', $config['cookie_name']);
        $container->setParameter('didublab_cookielaw.cookie_value', $config['cookie_value']);
        $container->setParameter('didublab_cookielaw.cookie_days', $config['cookie_days']);
        $container->setParameter('didublab_cookielaw.cookie_readmore_route', $config['cookie_readmore_route']);
    }
}