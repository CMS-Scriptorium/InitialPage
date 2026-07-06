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

echo "No interface is implateted at this time!";

$oINIT = InitialPage\core\InitialPage::getInstance();

\Subway\core\css\Fomantic::getInstance();

$oTwig = \Subway\core\template\TwigBox::getInstance();
$oTwig->registerModule("InitialPage");

echo $oTwig->render(
    "@InitialPage/tool.twig",
    [
        'Message' => "Baustelle!",
        'icons'   => ['coffee', 'code', 'hammer', 'pencil ruler', 'drafting compass']
    ]

);