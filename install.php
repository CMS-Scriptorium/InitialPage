<?php

use Subway\core\sql\Database;

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

if (defined('WB_URL'))
{
    $jobs = [
        "DROP TABLE IF EXISTS `{TP}mod_initial_page` "
        ,
        "CREATE TABLE `{TP}mod_initial_page` (
            `id`         int(11)        NOT NULL AUTO_INCREMENT,
            `user_id`    int(11)        NOT NULL DEFAULT '1',
            `init_page`  varchar(255)   NOT NULL DEFAULT 'pages/index.php',
            `page_param` varchar(255)   NOT NULL DEFAULT '',
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
        ,
        "INSERT INTO `{TP}mod_initial_page`
            (id, user_id, init_page, page_param)
            VALUES
            (NULL, 1, 'pages/index.php', '');"
    ];

    Database::handleJobs($jobs);
}
