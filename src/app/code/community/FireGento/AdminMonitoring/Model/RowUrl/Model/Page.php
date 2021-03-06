<?php
/**
 * This file is part of a FireGento e.V. module.
 *
 * This FireGento e.V. module is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  FireGento
 * @package   FireGento_AdminMonitoring
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2013 FireGento Team (http://www.firegento.com)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 */
/**
 * RowUrl Implementation for CMS pages
 *
 * @category FireGento
 * @package  FireGento_AdminMonitoring
 * @author   FireGento Team <team@firegento.com>
 */
class FireGento_AdminMonitoring_Model_RowUrl_Model_Page
    extends FireGento_AdminMonitoring_Model_RowUrl_Model_Abstract
{
    /**
     * Retrieve the class name for the current implementation.
     *
     * @return string Class Name
     */
    protected function getClassName()
    {
        return 'Mage_Cms_Model_Page';
    }

    /**
     * Retrieve the route path for the current implementation
     *
     * @return string Route Path
     */
    protected function getRoutePath()
    {
        return 'adminhtml/cms_page/edit';
    }

    /**
     * Retrieve the route params for the current implementation and given model
     *
     * @param  Mage_Core_Model_Abstract $model Model
     * @return array Route Params
     */
    protected function getRouteParams(Mage_Core_Model_Abstract $model)
    {
        return array(
            'page_id' => $model->getId()
        );
    }
}
