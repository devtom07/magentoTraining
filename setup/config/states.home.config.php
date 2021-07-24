<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

$base = basename($_SERVER['SCRIPT_FILENAME']);

return [
    'navUpdater' => [
        [
            'id'          => 'root',
            'step'        => 0,
            'views'       => ['root' => []],
        ],
        [
            'id'          => 'root.home',
            'url'         => 'home',
            'title'       => 'Setup Wizard',
            'templateUrl' => "$base/home",
            'header'      => 'Home',
            'nav'         => false,
            'default'     => true,
            'noMenu'      => true,
            'order'       => -1,
        ],
        [
            'id'          => 'root.module',
            'url'         => 'module-grid',
            'templateUrl' => "$base/module-grid",
            'title'       => 'Module Manager',
            'Controller'  => 'moduleGridController',
            'nav'         => false,
            'noMenu'      => true,
            'order'       => 1,
            'type'        => 'module'
        ],
        [
            'id'          => 'root.extension-auth',
            'url'         => 'marketplace-credentials',
            'templateUrl' => "$base/marketplace-credentials",
            'title'       => 'Extension Manager',
            'Controller'  => 'MarketplaceCredentialsController',
            'order'       => 1,
            'nav'         => false,
            'noMenu'      => true,
            'type'        => 'extension'
        ],
        [
            'id'          => 'root.extension',
            'url'         => 'extension-grid',
            'templateUrl' => "$base/extension-grid",
            'title'       => 'Extension Manager',
            'Controller'  => 'extensionGridController',
            'order'       => 2,
            'nav'         => false,
            'noMenu'      => true,
            'type'        => 'extension'
        ],
        [
            'id'          => 'root.install',
            'url'         => 'install-extension-grid',
            'templateUrl' => "$base/install-extension-grid",
            'title'       => "Extension Manager",
            'Controller'  => 'installExtensionGridController',
            'nav'         => false,
            'noMenu'      => true,
            'order'       => 1,
            'type'        => 'install',
            'wrapper'     => 1,
            'header'      => 'Ready to Install'
        ],
        [
            'id'          => 'root.update',
            'url'         => 'update-extension-grid',
            'templateUrl' => "$base/update-extension-grid",
            'title'       => "Extension Manager",
            'Controller'  => 'updateExtensionGridController',
            'nav'         => false,
            'noMenu'      => true,
            'order'       => 1,
            'type'        => 'update',
            'wrapper'     => 1,
            'header'      => 'New Updates'
        ],
        [
            'id'          => 'root.upgrade',
            'url'         => 'marketplace-credentials',
            'templateUrl' => "$base/marketplace-credentials",
            'title'       => 'System Upgrade',
            'Controller'  => 'MarketplaceCredentialsController',
            'order'       => 1,
            'nav'         => false,
            'noMenu'      => true,
            'type'        => 'upgrade'
        ],
    ],
];
