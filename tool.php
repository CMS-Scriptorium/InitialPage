<?php

/**
 *
 * @package         WBCE - admintools
 * @authors         Kant (Aldus)
 * @version         1.0.0
 * @platform        WBCE 1.6.x
 * @license         CC BY-SA 4.0
 * @license_terms   https://creativecommons.org/licenses/by-sa/4.0/
 *
 */

if (!defined('WB_URL'))
{
    header('Location: ../../index.php');
}

$oINIT = InitialPage\core\InitialPage::getInstance();

echo $oINIT->getToolInterface();
