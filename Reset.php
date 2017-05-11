<?php

/**
 * @package Reset
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\reset;

use gplcart\core\Module;

/**
 * Main class for Reset module
 */
class Reset extends Module
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        $routes['admin/tool/reset'] = array(
            'access' => '__superadmin',
            'menu' => array('admin' => 'Reset'),
            'handlers' => array(
                'controller' => array('gplcart\\modules\\reset\\controllers\\Reset', 'editReset')
            )
        );
    }

}
