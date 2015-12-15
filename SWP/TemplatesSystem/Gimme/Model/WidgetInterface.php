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

namespace SWP\TemplatesSystem\Gimme\Model;

/**
 * Container Interface.
 */
interface WidgetInterface
{
    /**
     * Get widget Id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get widget name
     *
     * @return integer
     */
    public function getName();

    /**
     * Get widget type
     *
     * @return integer
     */
    public function getType();

    /**
     * Get widget visibility
     *
     * @return boolean
     */
    public function getVisible();

    /**
     * Get widget data
     *
     * @return array
     */
    public function getParameters();
}
