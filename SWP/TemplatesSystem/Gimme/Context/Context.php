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

namespace SWP\TemplatesSystem\Gimme\Context;

use SWP\TemplatesSystem\Gimme\Meta\Meta;

class Context implements \ArrayAccess
{
    /**
     * Array with current page informations
     * @var string[]
     */
    protected $currentPage;

    /**
     * Array will all registered meta types
     *
     * @var \SWP\TemplatesSystem\Gimme\Meta\Meta[]
     */
    protected $registeredMeta = [];

    /**
     * Set current context page informations
     *
     * @param string[] $currentPage
     *
     * @return self
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * Get current context page informations
     *
     * @return string[]
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Register new meta type, registration is required before setting new value for meta
     *
     * @param string                                    $name Name of meta
     * @param SWP\TemplatesSystem\Gimme\Meta\Meta|null  $meta Meta object
     *
     * @return bool  if registered successfully
     *
     * @throws \Exception if already registered
     */
    public function registerMeta($name, Meta $meta = null)
    {
        if (!in_array($name, $this->registeredMeta)) {
            $this->registeredMeta[] = $name;

            if (!is_null($meta)) {
                $this->$name = $meta;
            }

            return true;
        }

        throw new \Exception(sprintf("Meta with name %s is already registered", $name));
    }

    public function offsetSet($name, $meta) {
        if (array_key_exists($name, $this->registeredMeta)) {
            $this->registeredMeta[$name] = $meta;
        }

        return true;
    }

    public function offsetExists($name) {
        return isset($this->registeredMeta[$name]);
    }

    public function offsetUnset($name) {
        unset($this->registeredMeta[$name]);

        return true;
    }

    public function offsetGet($name) {
        if (array_key_exists($name, $this->registeredMeta)) {
            return $this->registeredMeta[$name];
        }

        return false;
    }
}
