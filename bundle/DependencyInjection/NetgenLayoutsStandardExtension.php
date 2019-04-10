<?php

declare(strict_types=1);

namespace Netgen\Bundle\LayoutsStandardBundle\DependencyInjection;

use Jean85\PrettyVersions;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\GlobFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Yaml\Yaml;

final class NetgenLayoutsStandardExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $locator = new FileLocator(__DIR__ . '/../Resources/config');

        $loader = new DelegatingLoader(
            new LoaderResolver(
                [
                    new GlobFileLoader($container, $locator),
                    new YamlFileLoader($container, $locator),
                ]
            )
        );

        $loader->load('services/**/*.yml', 'glob');
    }

    public function prepend(ContainerBuilder $container): void
    {
        $container->setParameter(
            'nglayouts_standard.asset.version',
            PrettyVersions::getVersion('netgen/layouts-standard')->getShortCommitHash()
        );

        $prependConfigs = [
            'block_definitions.yml' => 'netgen_layouts',
            'block_type_groups.yml' => 'netgen_layouts',
            'block_types.yml' => 'netgen_layouts',
            'layout_types.yml' => 'netgen_layouts',
            'view/layout_view.yml' => 'netgen_layouts',
            'view/block_view.yml' => 'netgen_layouts',
            'framework/assets.yml' => 'framework',
        ];

        foreach ($prependConfigs as $configFile => $prependConfig) {
            $configFile = __DIR__ . '/../Resources/config/' . $configFile;
            $config = Yaml::parse((string) file_get_contents($configFile));
            $container->prependExtensionConfig($prependConfig, $config);
            $container->addResource(new FileResource($configFile));
        }
    }
}
