<?php

/**
 * @package Reset
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\reset\controllers;

use gplcart\core\controllers\backend\Controller as BackendController;

/**
 * Handles incoming requests and outputs data related to Reset module
 */
class Reset extends BackendController
{

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Route page callback
     */
    public function editReset()
    {
        $this->controlAccessSuperAdmin();

        $this->setTitleEditReset();
        $this->setBreadcrumbEditReset();

        $this->submitReset();
        $this->outputEditReset();
    }

    /**
     * Set title on the reset page
     */
    protected function setTitleEditReset()
    {
        $this->setTitle($this->text('Reset'));
    }

    /**
     * Set breadcrumbs on the reset page
     */
    protected function setBreadcrumbEditReset()
    {
        $this->setBreadcrumbHome();
    }

    /**
     * Handles submitted data
     */
    protected function submitReset()
    {
        if ($this->isPosted('submit') && $this->validateReset()) {
            $this->doReset();
        }
    }

    /**
     * Validates submitted data
     * @return boolean
     */
    protected function validateReset()
    {
        $this->setSubmitted('reset');

        if ($this->getSubmitted('confirm') !== $this->getStore('name')) {
            $this->setError('confirm', $this->text('Wrong confirmation word'));
        }
        return !$this->hasErrors(false);
    }

    /**
     * Update module settings
     */
    protected function doReset()
    {
        $this->controlAccessSuperAdmin();
        $this->doDbTablesReset();
        $this->doConfigReset();

        $this->url->redirect($this->url->get('install', array(), true, true));
    }

    /**
     * Delete config files created during installation
     */
    protected function doConfigReset()
    {
        chmod(GC_FILE_CONFIG_COMPILED, 0777);
        unlink(GC_FILE_CONFIG_COMPILED);
    }

    /**
     * Delete all tables from the database
     */
    public function doDbTablesReset()
    {
        $db = $this->config->getDb();
        $db->exec('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($db->fetchColumnAll('SHOW TABLES') as $table) {
            $db->query("DROP TABLE $table");
        }

        $db->exec('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Render and output the reset page
     */
    protected function outputEditReset()
    {
        $this->output('reset|reset');
    }

}
