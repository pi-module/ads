<?php
/**
 * Pi Engine (http://piengine.org)
 *
 * @link            http://code.piengine.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://piengine.org
 * @license         http://piengine.org/license.txt New BSD License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */

namespace Module\Ads\Route;

use Pi\Mvc\Router\Http\Standard;

class Ads extends Standard
{
    /**
     * Default values.
     * @var array
     */
    protected $defaults
        = [
            'module'     => 'ads',
            'controller' => 'index',
            'action'     => 'index',
        ];

    /**
     * {@inheritDoc}
     */
    protected $structureDelimiter = '/';

    /**
     * {@inheritDoc}
     */
    protected function parse($path)
    {
        $matches = [];
        $parts   = array_filter(explode($this->structureDelimiter, $path));
        // Set controller
        $matches           = array_merge($this->defaults, $matches);
        $matches['action'] = (in_array($parts[0], ['view', 'click'])) ? $parts[0] : 'click';
        if (isset($parts[1]) && !empty($parts[1])) {
            $matches['id'] = intval($parts[1]);
        }
        if (isset($parts[2]) && !empty($parts[2])) {
            $matches['device'] = (in_array($parts[2], ['web', 'mobile'])) ? $parts[2] : 'web';
        }
        return $matches;
    }

    /**
     * assemble(): Defined by Route interface.
     *
     * @see    Route::assemble()
     * @param  array $params
     * @param  array $options
     * @return string
     */
    public function assemble(
        array $params = [],
        array $options = []
    )
    {
        $mergedParams = array_merge($this->defaults, $params);
        if (!$mergedParams) {
            return $this->prefix;
        }

        if (!empty($mergedParams['module'])) {
            $url['module'] = $mergedParams['module'];
        }

        if (!empty($mergedParams['controller'])
            && $mergedParams['controller'] != 'index'
        ) {
            $url['controller'] = $mergedParams['controller'];
        }

        if (!empty($mergedParams['action'])
            && in_array($mergedParams['action'], ['view', 'click'])
        ) {
            $url['action'] = $mergedParams['action'];
        }

        if (!empty($mergedParams['id'])) {
            $url['id'] = intval($mergedParams['id']);
        }

        if (!empty($mergedParams['device'])
            && in_array($mergedParams['device'], ['web', 'mobile'])
        ) {
            $url['device'] = $mergedParams['device'];
        }

        $url = implode($this->paramDelimiter, $url);

        if (empty($url)) {
            return $this->prefix;
        }
        return $this->paramDelimiter . $url;
    }
}