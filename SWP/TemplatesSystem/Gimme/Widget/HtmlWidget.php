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

namespace SWP\TemplatesSystem\Gimme\Widget;

/**
 * Widgets idea
 * * Every widget have it's own clas with widget implementation
 * * Every widget have his own parameters 
 */

/**
 * Container Interface.
 */
class HtmlWidget implements WidgetInterface
{
    protected $widgetModel;

    public function __construct($widgetModel)
    {
        $this->widgetModel = $widgetModel;
    }

    /**
     * Render widget content
     *
     * @return string
     */
    public function render()
    {
        return $this->widgetModel->getParameters()['html_body'];
    }

    /**
     * Check if widget should be rendered
     *
     * @return boolean
     */
    public function isVisible()
    {
        return $this->widgetModel->getVisible();
    }
}
