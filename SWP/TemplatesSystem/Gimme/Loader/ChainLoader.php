<?php

namespace SWP\TemplatesSystem\Gimme\Loader;

/**
 * ChainLoader is a loader that calls other loaders to load Meta objects
 */
class ChainLoader implements LoaderInterface
{
    protected $loaders = array();

    /**
     * Adds a loader instance.
     *
     * @param LoaderInterface $loader A Loader instance
     */
    public function addLoader(LoaderInterface $loader)
    {
        $this->loaders[] = $loader;
    }

    /**
     * Loads a Meta class from given datasource.
     *
     * @param string $type       object type
     * @param array  $parameters parameters needed to load required object type
     * @param int    $responseType response type: single meta (LoaderInterface::SINGLE) or collection of metas (LoaderInterface::COLLECTION)
     *
     * @return Meta|bool false if meta cannot be loaded, a Meta instance otherwise
     */
    public function load($type, $parameters, $responseType = LoaderInterface::SINGLE)
    {
        foreach ($this->loaders as $loader) {
            if ($loader->isSupported($type)) {
                if (false !== $meta = $loader->load($type, $parameters, $responseType)) {
                    return $meta;
                }
            }
        }

        return false;
    }

    /**
     * Checks if Loader supports provided type
     *
     * @param string $type
     *
     * @return boolean
     */
    public function isSupported($type)
    {
        foreach ($this->loaders as $loader) {
            if ($loader->isSupported($type)) {
                    return true;
            }
        }

        return false;
    }
}
