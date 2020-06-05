<?php

namespace Didublab\CookielawBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('didublab_cookielaw');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('cookie_name')->defaultValue('cookie-notice-accepted')->end()
                ->scalarNode('cookie_value')->defaultTrue()->end()
                ->integerNode('cookie_days')->defaultValue(10)->end()
                ->scalarNode('cookie_readmore_route')->defaultFalse()->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}