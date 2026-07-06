<?php

declare(strict_types=1);

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

if (!defined('WB_PATH'))
{
    header('Location: ../../index.php');
    die();
}

/**
 * [1] Just to make sure the WBCE autoloader will find the module classes
 *     (As this one line is missing in the "inizialize" file of the root.)
 */
WbAuto::AddDir(WB_PATH."/modules/");

/**
 * [1.1] Just to make sure the WBCE autoloader will find the frontend-template
 *       classes and also the theme ones.
 *       (As this one line is also missing in the "inizialize" file of the root.)
 */
WbAuto::AddDir(WB_PATH."/templates/");
