<?php

/**
 * pjdietz\WellRESTed\StaticRoute
 *
 * @author PJ Dietz <pj@pjdietz.com>
 * @copyright Copyright 2014 by PJ Dietz
 * @license MIT
 */

namespace pjdietz\WellRESTed\Routes;

use InvalidArgumentException;
use pjdietz\WellRESTed\Interfaces\RequestInterface;

/**
 * Maps a list of static URI paths to a Handler
 */
class StaticRoute extends BaseRoute
{
    /** @var array List of static URI paths */
    protected $paths;

    /**
     * Create a new StaticRoute for a given path or paths and a handler class.
     *
     * @param string|array $paths Path or list of paths the request must match
     * @param string $targetClassName Fully qualified name to an autoloadable handler class.
     * @throws \InvalidArgumentException
     */
    public function __construct($paths, $targetClassName)
    {
        parent::__construct($targetClassName);
        if (is_string($paths)) {
            $this->paths = array($paths);
        } elseif (is_array($paths)) {
            $this->paths = $paths;
        } else {
            throw new InvalidArgumentException("$paths must be a string or array of string");
        }
    }

    // ------------------------------------------------------------------------
    /* HandlerInterface */

    /**
     * Return the response issued by the handler class or null.
     *
     * A null return value indicates that this route failed to match the request.
     *
     * @param RequestInterface $request
     * @param array $args
     * @return null|\pjdietz\WellRESTed\Interfaces\ResponseInterface
     */
    public function getResponse(RequestInterface $request, array $args = null)
    {
        $requestPath = $request->getPath();
        foreach ($this->paths as $path) {
            if ($path === $requestPath) {
                $target = $this->getTarget();
                return $target->getResponse($request, $args);
            }
        }
        return null;
    }

}
