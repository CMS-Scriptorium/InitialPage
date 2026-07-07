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

namespace InitialPage\core;

use I;
use InitialPage\core\language;
use Subway\core\Pages;
use Subway\core\sql\Database;
use Subway\core\traits\Singleton;
use const LANGUAGE;
use const WB_URL;

/**
 * That is truly experimental.
 */
class InitialPage
{
    use Singleton;

    protected const CSS_PATH = "/modules/InitialPage/css/backend.css";
    protected const JS_PATH = "/modules/InitialPage/js/backend.js";

    public static $instance;

    public array $lang = [];
    public array $pageTree = [];
    public array $adminTools = [];
    public array $backendPages = [];

    protected function __construct()
    {
        // [1] internal css
        I::insertCssFile(WB_URL . self::CSS_PATH, 'HEAD BTM+');
        
        // [2] internal js
        I::insertJsFile(WB_URL . self::JS_PATH, 'HEAD BTM+');
        
        // [3] language
        $lookUpClass = "\\InitialPage\\core\\language\\". LANGUAGE;
        if (!class_exists($lookUpClass, true))
        {
            $lookUpClass = "\\InitialPage\\core\\language\\EN";
        }
        $this->lang = $lookUpClass::getInstance()->getConstants();

        // [4] PageTree
        $this->pageTree = Pages::getInstance()->getPageTree(
                0, // root
                ['page_id', 'page_title', 'menu_title']
        );

        // [5] Get all AdminTools
        Database::executeQuery(
            "SELECT `directory`, `name` FROM `{TP}addons` WHERE `function` LIKE '%tool%' ORDER BY `name`",
            true,
            $this->adminTools,
            true
        );

        // [6] Backend-Pages
        $this->backendPages = [
            'Start'         => "admin/start/index.php",
            'Pages'         => "admin/pages/index.php",
            'Media'         => "admin/media/index.php",
            'Add-ons'       => "admin/addons/index.php",
            'Preferences'   => "admin/preferences/index.php",
            'Settings'      => "admin/settings/index.php",
            'Admin-Tools'   => "addmintools/index.php",
            'Access'        => "admin/access/index.php"
        ];
    }
}
