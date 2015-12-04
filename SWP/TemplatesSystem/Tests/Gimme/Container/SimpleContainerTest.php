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

    public function testRendering()
    {
    	$this->assertEquals($this->container->renderOpenTag(), '<div id="swp_container_1" class="swp_container " style="" >');
    }
}