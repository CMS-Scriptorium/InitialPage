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

    protected function __construct(array $params = [])
    {
        // 1 - internal css
        I::insertCssFile(WB_URL . self::CSS_PATH, 'HEAD BTM+');
        // 2 - internal js
        I::insertJsFile(WB_URL . self::JS_PATH, 'HEAD BTM+');
    }
}
