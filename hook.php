<?php

/**
 * Install hook
 * 
 * @return bool
 */
function plugin_qchat_install() {
    global $DB;

    // Create the plugin table
    $query = "CREATE TABLE IF NOT EXISTS `glpi_plugin_qchat` (
                `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                `qchat_url` varchar(255) DEFAULT NULL,
                `qchat_token` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $DB->query($query) or die($DB->error());

    return true;
}

/**
 * Uninstall hook
 * 
 * @return bool
 */
function plugin_qchat_uninstall() {
    global $DB;

    // Drop the plugin table
    $query = "DROP TABLE IF EXISTS `glpi_plugin_qchat`;";
    $DB->query($query) or die($DB->error());

    return true;
}

?>
