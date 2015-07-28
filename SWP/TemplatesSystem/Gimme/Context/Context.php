<?php

namespace SWP\TemplatesSystem\Gimme\Context;

use SWP\TemplatesSystem\Gimme\Meta\Meta;

class Context implements \ArrayAccess
{
    /**
     * Array will all registered meta types
     *
     * @var array
     */
    protected $registeredMeta = [];

    /**
     * Register new meta type, registration is required before setting new value for meta
     *
     * @param string     $name Name of meta
     * @param  Meta|null $meta Meta object
     *
     * @return bool|Exception  true if registered successfully, Exception if already registered 
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
