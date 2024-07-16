<?php

function plugin_init_qchat() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['qchat'] = true;

    // Registering notification targets
    $PLUGIN_HOOKS['item_add_targets']['qchat'] = [
        'NotificationTarget' => 'plugin_qchat_notification_targets'
    ];

    // Registering notification target actions
    $PLUGIN_HOOKS['item_action_targets']['qchat'] = [
        'NotificationTarget' => 'plugin_qchat_notification_targets'
    ];

    // Registering profile changes
    $PLUGIN_HOOKS['change_profile']['qchat'] = ['PluginQchatProfile', 'initProfile'];
}

function plugin_qchat_notification_targets($item) {
    return [
        'PluginQchatNotificationTarget' => __('QChat Notification', 'qchat')
    ];
}

function plugin_qchat_install() {
    global $DB;

    $query = "CREATE TABLE IF NOT EXISTS `glpi_plugin_qchat` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `qchat_url` varchar(255) DEFAULT NULL,
                `qchat_token` varchar(255) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

    $DB->query($query) or die($DB->error());
    return true;
}

function plugin_qchat_uninstall() {
    global $DB;

    $query = "DROP TABLE IF EXISTS `glpi_plugin_qchat`;";
    $DB->query($query) or die($DB->error());
    return true;
}

function plugin_version_qchat() {
    return [
        'name'           => 'QChat',
        'version'        => '1.0.0',
        'author'         => 'QoS',
        'license'        => 'GPLv2+',
        'homepage'       => 'https://qosit.cloud',
        'minGlpiVersion' => '10.0'
    ];
}

function plugin_qchat_check_config() {
    return true;
}

?>