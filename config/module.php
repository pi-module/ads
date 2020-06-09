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
return [
    // Module meta
    'meta'     => [
        'title'       => _a('Ads'),
        'description' => _a('For generate ads'),
        'version'     => '1.4.0',
        'license'     => 'New BSD',
        'logo'        => 'image/logo.png',
        'readme'      => 'docs/readme.txt',
        'demo'        => 'http://piengine.org',
        'icon'        => 'fa-asterisk',
    ],
    // Author information
    'author'   => [
        'Name'    => 'Hossein Azizabadi',
        'email'   => 'azizabadi@faragostaresh.com',
        'website' => 'http://piengine.org',
        'credits' => 'Pi Engine Team',
    ],
    // resource
    'resource' => [
        'database'   => 'database.php',
        'config'     => 'config.php',
        'block'      => 'block.php',
        'permission' => 'permission.php',
        'page'       => 'page.php',
        'navigation' => 'navigation.php',
        'route'      => 'route.php',
    ],
];