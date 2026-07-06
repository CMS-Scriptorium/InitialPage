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
use Subway\core\traits\Singleton;
use Subway\core\Pages;
use InitialPage\core\language;

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
    }
}
