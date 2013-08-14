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
        
        $container->setParameter($this->getAlias().'.host', $config['host']);
        $container->setParameter($this->getAlias().'.use_ssl', $config['use_ssl']);
        $container->setParameter($this->getAlias().'.verify_peer', $config['verify_peer']);
        $container->setParameter($this->getAlias().'.default_version', $config['default_version']);
        $container->setParameter($this->getAlias().'.default_language', $config['default_language']);
        $container->setParameter($this->getAlias().'.customer_key', $config['customer_key']);
        $container->setParameter($this->getAlias().'.api_key', $config['api_key']);
        $container->setParameter($this->getAlias().'.api_secret', $config['api_secret']);
        $container->setParameter($this->getAlias().'.format', $config['format']);
        $container->setParameter($this->getAlias().'.timeout', $config['timeout']);
        
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        
        if (true === $config['enabled']) {
            $loader->load('services.xml');
        }
    }
}