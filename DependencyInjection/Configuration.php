<?php

/*
 * This file is part of the VipxBotDetectBundle package.
 *
 * (c) Lennart Hildebrandt <http://github.com/lennerd>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vipx\BotDetectBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\HttpKernel\Kernel;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        if (Kernel::MAJOR_VERSION <= 4) {
            $treeBuilder = new TreeBuilder();
            $rootNode = $treeBuilder->root('vipx_bot_detect');
        } else {
            $treeBuilder = new TreeBuilder('vipx_bot_detect');
            $rootNode = $treeBuilder->getRootNode();
        }

        $rootNode->children()
            ->scalarNode('metadata_file')->defaultValue('basic_bot.yml')->end()
            ->scalarNode('cache_file')->defaultValue('project_vipx_bot_detect_metadata.php')->end()
            ->booleanNode('use_listener')->defaultValue(false)->end()
        ->end();

        return $treeBuilder;
    }
}
