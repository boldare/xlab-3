<?php

namespace PostfinanceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('postfinance');

        $rootNode
            ->children()
                ->arrayNode('postfinance')
                    ->isRequired()
                    ->children()
                        ->scalarNode('pspid')
                            ->isRequired()
                        ->end()
                        ->scalarNode('shasign')
                            ->isRequired()
                        ->end()
                        ->scalarNode('shaout')
                            ->isRequired()
                        ->end()
                        ->booleanNode('sandbox')
                            ->isRequired()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
