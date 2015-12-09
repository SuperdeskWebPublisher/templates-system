<?php

/**
 * This file is part of the Superdesk Web Publisher Templates System
 *
 * Copyright 2015 Sourcefabric z.u. and contributors.
 *
 * For the full copyright and license information, please see the
 * AUTHORS and LICENSE files distributed with this source code.
 *
 * @copyright 2015 Sourcefabric z.ú.
 * @license http://www.superdesk.org/license
 */

namespace SWP\TemplatesSystem\Tests\Gimme\Container;

use SWP\TemplatesSystem\Gimme\Container\SimpleContainer;

class SimpleContainerTest extends \PHPUnit_Framework_TestCase
{
    private $container;

    public function setUp()
    {
    	$containerEntity = new \SWP\TemplatesSystem\Tests\Gimme\Model\Container();
    	$containerEntity->setId(1);

        $this->container = new SimpleContainer($containerEntity);
    }

    public function testcheckingVisibility()
    {
        $this->assertTrue($this->container->isVisible());
    }

    public function testSimpleRendering()
    {
    	$this->assertEquals($this->container->renderOpenTag(), '<div id="swp_container_1" class="swp_container " style="" >');
    	$this->assertEquals($this->container->renderCloseTag(), '</div>');
    }

    public function testAdvancedRendering()
    {
    	$containerEntity = new \SWP\TemplatesSystem\Tests\Gimme\Model\Container();
    	$containerEntity->setId(2);
    	$containerEntity->setData(['key1' => true, 'key2' => 'false', 'key3' => false]);
    	$containerEntity->setWidth(400);
    	$containerEntity->setHeight(300);
    	$containerEntity->setCssClass('simple-css-class');
    	$containerEntity->setStyles('border: 1px solid red;');
    	$containerEntity->setName('simple_container');
        $container = new SimpleContainer($containerEntity);

    	$this->assertEquals($container->renderOpenTag(), '<div id="swp_container_2" class="swp_container simple-css-class" style="height: 300px;width: 400px;border: 1px solid red;" data-key1="1" data-key2="false" data-key3="" >');
    }

    public function testWidgets()
    {
    	$this->assertEquals(null, $this->container->setWidgets());
    	$this->assertEquals(null, $this->container->hasWidgets());
    	$this->assertEquals(null, $this->container->renderWidgets());
    }
}
