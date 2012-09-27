<?php
/**
 * Ash Common Extension
 *
 * Maintains common settings and configuration for AAI-built Magento websites.
 *
 * @category    Ash
 * @package     Ash_Core
 * @copyright   Copyright (c) 2012 August Ash, Inc. (http://www.augustash.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Standard router
 *
 * @category    Ash
 * @package     Ash_Core
 * @author      August Ash Team <core@augustash.com>
 */
class Ash_Core_Controller_Router_Standard extends Mage_Core_Controller_Varien_Router_Standard
{
    /**
     * Match the request
     *
     * @param  Zend_Controller_Request_Http $request
     * @return boolean
     */
    public function match(Zend_Controller_Request_Http $request)
    {
        // is maintenance mode enabled?
        if (Mage::getStoreConfig(Ash_Core_Helper_Data::MAINTENANCE_MODE, $request->getStoreCodeFromPath())) {

            Mage::getSingleton('core/session', array('name' => 'adminhtml'));
            if (!Mage::getSingleton('admin/session')->isLoggedIn()) {
                // re-establish frontend session
                Mage::getSingleton('core/session', array('name' => 'front'));

                // configure headers
                $response = $this->getFront()->getResponse();
                $response->setHeader('HTTP/1.1','503 Service Temporarily Unavailable');
                $response->setHeader('Status','503 Service Temporarily Unavailable');
                $response->setHeader('Retry-After','3600');

                // set body to custom message & send
                $page = Mage::app()->getLayout()->createBlock('ash/maintenance_notice');
                $response->setBody(html_entity_decode($page->toHtml(), ENT_QUOTES, 'utf-8'));
                $response->sendHeaders();
                $response->outputBody();
                exit;
            }
        }

        return parent::match($request);
    }
}
