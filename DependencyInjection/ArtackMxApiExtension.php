<?php

namespace Artack\MxApiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ArtackMxApiExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $container->setParameter('artack_mx_api.host', $config['host']);
        $container->setParameter('artack_mx_api.use_ssl', $config['use_ssl']);
        $container->setParameter('artack_mx_api.version', $config['version']);
        $container->setParameter('artack_mx_api.customer_key', $config['customer_key']);
        $container->setParameter('artack_mx_api.api_key', $config['api_key']);
        $container->setParameter('artack_mx_api.api_secret', $config['api_secret']);
        $container->setParameter('artack_mx_api.format', $config['format']);
        
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        
        if (true === $config['enabled']) {
            $loader->load('services.xml');
        }
    }
}
