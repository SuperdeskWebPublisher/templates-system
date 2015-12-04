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

namespace SWP\TemplatesSystem\Gimme\Container;

use SWP\TemplatesSystem\Gimme\Model\ContainerInterface;

class SimpleContainer
{
    protected $containerEntity;

    protected $twig;

    const OPEN_TAG_TEMPLATE = '<div id="swp_container_{{ id }}" class="swp_container {{ class }}" style="{% if height %}height: {{ height }}px;{% endif %}{% if width %}width: {{width}}px;{% endif %}{{styles}}"{% for key, value in data %} data-{{key}}="{{value}}"{% endfor %} >';
    const CLOSE_TAG_TEMPLATE = '</div>';

    public function __construct(ContainerInterface $containerEntity)
    {
        $this->containerEntity = $containerEntity;
        $this->twig = new \Twig_Environment(new \Twig_Loader_Array(['open_tag' => self::OPEN_TAG_TEMPLATE, 'close_tag' => self::CLOSE_TAG_TEMPLATE]));
    }

    public function setWidgets()
    {
        // widgets are not yet implemented
        return;
    }

    public function renderOpenTag()
    {
        return $this->twig->render('open_tag', array(
            'id' => $this->containerEntity->getId(),
            'class' => $this->containerEntity->getCssClass(),
            'height' => $this->containerEntity->getHeight(),
            'width' => $this->containerEntity->getWidth(),
            'styles' => $this->containerEntity->getStyles(),
            'visible' => $this->containerEntity->getVisible(),
            'data' => $this->containerEntity->getData()
        ));
    }

    public function hasWidgets()
    {
        // widgets are not yet implemented
        return;
    }

    public function renderWidgets()
    {
        // widgets are not yet implemented
        return;
    }

    public function isVisible()
    {
        return $this->containerEntity->getVisible();
    }

    public function renderCloseTag()
    {
        return $this->twig->render('close_tag');
    }
}
