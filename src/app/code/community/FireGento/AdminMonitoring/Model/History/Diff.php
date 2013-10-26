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
 * History Diff Model
 *
 * @category FireGento
 * @package  FireGento_AdminMonitoring
 * @author   FireGento Team <team@firegento.com>
 */
class FireGento_AdminMonitoring_Model_History_Diff
{
    /**
     * @var FireGento_AdminMonitoring_Model_History_Data
     */
    private $dataModel;

    /**
     * @param FireGento_AdminMonitoring_Model_History_Data $dataModel
     */
    public function __construct(FireGento_AdminMonitoring_Model_History_Data $dataModel)
    {
        $this->dataModel = $dataModel;
    }

    /**
     * @return bool
     */
    public function hasChanged()
    {
        return ($this->dataModel->getContent() != $this->dataModel->getOrigContent());
    }

    /**
     * @return array
     */
    private function getObjectDiff ()
    {
        $dataOld = $this->dataModel->getOrigContent();
        if (is_array($dataOld)) {
            $dataNew = $this->dataModel->getContent();
            $dataDiff = array();
            foreach ($dataOld as $key => $oldValue) {
                // compare objects serialized
                if (
                    isset($dataNew[$key])
                    AND (json_encode($oldValue) != json_encode($dataNew[$key]))
                ) {
                    $dataDiff[$key] = $oldValue;
                }
            }
            return $dataDiff;
        } else {
            return array();
        }
    }

    /**
     * @return string
     */
    public function getSerializedDiff()
    {
        $dataDiff = $this->getObjectDiff();
        return json_encode($dataDiff);
    }

}