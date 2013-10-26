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
 * History Model
 *
 * @category FireGento
 * @package  FireGento_AdminMonitoring
 * @author   FireGento Team <team@firegento.com>
 */
class FireGento_AdminMonitoring_Model_History extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('firegento_adminmonitoring/history');
    }

    /**
     * @return Mage_Core_Model_Abstract
     */
    public function getOriginalModel()
    {
        $objectType = $this->getObjectType();
        /* @var Mage_Core_Model_Abstract $model */
        $model = new $objectType;
        $content = $this->getDecodedContent();
        if (isset($content['store_id'])) {
            $model->setStoreId($content['store_id']);
        }
        $model->load($this->getObjectId());
        return $model;
    }

    /**
     * @return array
     */
    public function getDecodedContentDiff()
    {
        return json_decode($this->getContentDiff(), true);
    }

    /**
     * @return array
     */
    private function getDecodedContent()
    {
        return json_decode($this->getContent(), true);
    }

    /**
     * @return bool
     */
    public function isUpdate()
    {
        return ($this->getAction() == FireGento_AdminMonitoring_Helper_Data::ACTION_UPDATE);
    }

    /**
     * @return bool
     */
    public function isDelete()
    {
        return ($this->getAction() == FireGento_AdminMonitoring_Helper_Data::ACTION_DELETE);
    }

}