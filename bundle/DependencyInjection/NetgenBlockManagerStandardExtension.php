<?php

declare(strict_types=1);

namespace Netgen\Bundle\BlockManagerStandardBundle\DependencyInjection;

use Jean85\PrettyVersions;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Yaml\Yaml;

final class NetgenBlockManagerStandardExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );

        $loader->load('services/block_definitions.yml');
    }

    public function prepend(ContainerBuilder $container)
    {
        $container->setParameter(
            'ngbm_standard.asset.version',
            PrettyVersions::getVersion('netgen/block-manager-standard')->getShortCommitHash()
        );

        $prependConfigs = [
            'block_definitions.yml' => 'netgen_block_manager',
            'block_type_groups.yml' => 'netgen_block_manager',
            'block_types.yml' => 'netgen_block_manager',
            'layout_types.yml' => 'netgen_block_manager',
            'view/layout_view.yml' => 'netgen_block_manager',
            'view/block_view.yml' => 'netgen_block_manager',
            'framework/assets.yml' => 'framework',
        ];

        foreach ($prependConfigs as $configFile => $prependConfig) {
            $configFile = __DIR__ . '/../Resources/config/' . $configFile;
            $config = Yaml::parse((string) file_get_contents($configFile));
            $container->prependExtensionConfig($prependConfig, $config);
            $container->addResource(new FileResource($configFile));
        }

        // Register templates from this bundle under @NetgenBlockManager namespace
        // to keep external references to templates working after they were
        // separated from the core repo
        $container->prependExtensionConfig(
            'twig',
            [
                'paths' => [
                    __DIR__ . '/../Resources/views/ngbm/themes/standard' => 'NetgenBlockManager',
                    __DIR__ . '/../Resources/views' => 'NetgenBlockManager',
                ],
            ]
        );
    }
}
