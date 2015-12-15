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

namespace SWP\TemplatesSystem\Tests\Gimme\Model;

use SWP\TemplatesSystem\Gimme\Model\WidgetInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Widget.
 */
class Widget implements WidgetInterface
{
    const TYPE_HTML = 1;

    protected $types = [
        self::TYPE_HTML => "\\SWP\\TemplatesSystem\\Gimme\\Widget\\HtmlWidget"
    ];

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $visible;

    /**
     * @var []
     */
    protected $parameters;

    public function __construct()
    {
        $this->parameters = [];
        $this->setVisible(true);
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param string $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Gets the value of visible.
     *
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Sets the value of visible.
     *
     * @param boolean $visible the visible
     *
     * @return self
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Gets the value of type.
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the value of type.
     *
     * @param integer $type the type
     *
     * @return self
     */
    public function setType($type = self::TYPE_HTML)
    {
        if (array_key_exists($type, $this->types)) {
            $this->type = $this->types[$type];
        } else {
            $this->type = $this->types[self::TYPE_HTML];
        }

        return $this;
    }

    /**
     * Gets the value of parameters.
     *
     * @return []
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Sets the value of parameters.
     *
     * @param [] $parameters the parameters
     *
     * @return self
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }
}
