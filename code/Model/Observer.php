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
 * Observer model
 *
 * @category    Ash
 * @package     Ash_Core
 * @author      August Ash Team <core@augustash.com>
 */
class Ash_Core_Model_Observer
{
    /**
     * Inject maintenance reminder block if enabled.
     *
     * @param   Varien_Event_Observer $observer
     * @return  void
     */
    public function afterGenerateBlocks(Varien_Event_Observer $observer)
    {
        if (Ash_Core_Helper_Data::canDisplayReminder()) {
            $layout = $observer->getEvent()->getLayout();
            $layout->getBlock('after_body_start')
                   ->append($layout->createBlock('ash/maintenance_reminder'));
       }
    }
}
