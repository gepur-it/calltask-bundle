<?php
/**
 * @author: Andrii yakovlev <yawa20@gmail.com>
 * @since : 14.05.18
 */

namespace GepurIt\CallTaskBundle\DependencyInjection;

use GepurIt\CallTaskBundle\CallTaskSource\ConcreteCallTaskTypeProviderInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class CallTaskExtension
 * @package GepurIt\CallTaskBundle\DependencyInjection
 * @codeCoverageIgnore
 */
class CallTaskExtension extends Extension
{
    const CONCRETE_PROVIDER_TAG = 'call_task.concrete_provider';

    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(ConcreteCallTaskTypeProviderInterface::class)
            ->addTag(self::CONCRETE_PROVIDER_TAG);
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
