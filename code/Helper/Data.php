<?php
/**
 * Ash Core Extension
 *
 * Maintains common settings and configuration for AAI-built Magento websites.
 *
 * @category    Ash
 * @package     Ash_Core
 * @copyright   Copyright (c) 2012 August Ash, Inc. (http://www.augustash.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Core data helper
 *
 * @category    Ash
 * @package     Ash_Core
 * @author      August Ash Team <core@augustash.com>
 */
class Ash_Core_Helper_Data extends Mage_Core_Helper_Abstract
{
    const MAINTENANCE_MODE     = 'ash_offline/general/enabled';
    const MAINTENANCE_REMINDER = 'ash_offline/general/reminder';
    const MAINTENANCE_MESSAGE  = 'ash_offline/general/message';

    /**
     * Determines if appropriate to display maintenance mode reminder.
     *
     * @return  boolean
     */
    static public function canDisplayReminder()
    {
        if (Mage::getStoreConfigFlag(self::MAINTENANCE_MODE)
            && Mage::getStoreConfigFlag(self::MAINTENANCE_REMINDER)) {
            return true;
        }

        return false;
    }
}
