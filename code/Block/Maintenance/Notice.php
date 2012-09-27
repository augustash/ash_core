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
 * Maintenance notice block
 *
 * @category    Ash
 * @package     Ash_Core
 * @author      August Ash Team <core@augustash.com>
 */
class Ash_Core_Block_Maintenance_Notice extends Mage_Page_Block_Html
{
    /**
     * Path to template file in theme.
     *
     * @var string
     */
    protected $_template = 'ash/maintenance/notice.phtml';
}
