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

use SWP\TemplatesSystem\Tests\Gimme\Model\Widget;
use SWP\TemplatesSystem\Gimme\Widget\HtmlWidget;

class HtmlWidgetTest extends \PHPUnit_Framework_TestCase
{
    private $widget;

    public function setUp()
    {
    	$widgetEntity = new Widget();
    	$widgetEntity->setId(1);
        $widgetEntity->setParameters(['html_body' => 'simple html body']);

        $this->widget = new HtmlWidget($widgetEntity);
    }

    public function testcheckingVisibility()
    {
        $this->assertTrue($this->widget->isVisible());
    }

    public function testRendering()
    {
        $this->assertEquals($this->widget->render(), 'simple html body');
    }
}
