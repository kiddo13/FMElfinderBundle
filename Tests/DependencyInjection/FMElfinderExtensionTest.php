<?php

namespace FM\ElfinderBundle\Tests\DependencyInjection;

use FM\ElfinderBundle\DependencyInjection\FMElfinderExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

class FMElfinderExtensionTest extends \PHPUnit_Framework_TestCase
{

    public function testDefault()
    {
        $container = new ContainerBuilder();
        $loader = new FMElfinderExtension();
        $loader->load(array(array()), $container);
        $this->assertTrue($container->hasParameter('fm_elfinder'));
        $parameters = $container->getParameter('fm_elfinder');
        $this->assertEquals('uploads', $parameters['path']);
        $this->assertEquals('LocalFileSystem', $parameters['driver']);
        $this->assertEquals('en_US.UTF8', $parameters['locale']);
        $this->assertEquals('ckeditor', $parameters['editor']);
//        $this->assertFalse($parameters['showhidden']);
    }
}