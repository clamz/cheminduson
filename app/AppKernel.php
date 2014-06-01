<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new CheminDuSon\SiteBundle\CheminDuSonSiteBundle(),
        	new FOS\UserBundle\FOSUserBundle(),
            new CheminDuSon\UserBundle\CheminDuSonUserBundle(),
        	new Knp\Bundle\MenuBundle\KnpMenuBundle(),
        	new Genemu\Bundle\FormBundle\GenemuFormBundle(),
        	new Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
        	new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
        	new MtHamlBundle\MtHamlBundle(),
            new \JMS\SerializerBundle\JMSSerializerBundle(),
            new \FOS\ElasticaBundle\FOSElasticaBundle(),
            new Ivory\GoogleMapBundle\IvoryGoogleMapBundle(),
            new Widop\HttpAdapterBundle\WidopHttpAdapterBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new Elao\WebProfilerExtraBundle\WebProfilerExtraBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
