<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

$base = basename($_SERVER['SCRIPT_FILENAME']);

return [
    'navUpdaterTitles' => [
        'install' => 'New Purchases',
    ],
    'navUpdater' => [
        [
            'id'          => 'root.readiness-check-install',
            'url'         => 'readiness-check-updater',
            'templateUrl' => "{$base}/readiness-check-updater",
            'title'       => "Readiness \n Check",
            'header'      => 'Step 1: Readiness Check',
            'nav'         => true,
            'order'       => 2,
            'type'        => 'install',
            'wrapper'     => 1
        ],
        [
            'id'          => 'root.readiness-check-install.progress',
            'url'         => 'readiness-check-updater/progress',
            'templateUrl' => "$base/readiness-check-updater/progress",
            'title'       => 'Readiness Check',
            'header'      => 'Step 1: Readiness Check',
            'Controller'  => 'readinessCheckController',
            'nav'         => false,
            'order'       => 3,
            'type'        => 'install',
            'wrapper'     => 1
        ],
        [
            'id'          => 'root.create-backup-install',
            'url'         => 'create-backup',
            'templateUrl' => "$base/create-backup",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'createBackupController',
            'nav'         => true,
            'validate'    => true,
            'order'       => 4,
            'type'        => 'install',
            'wrapper'     => 1
        ],
        [
            'id'          => 'root.create-backup-install.progress',
            'url'         => 'create-backup/progress',
            'templateUrl' => "$base/complete-backup/progress",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'completeBackupController',
            'nav'         => false,
            'order'       => 5,
            'type'        => 'install',
            'wrapper'     => 1
        ],
        [
            'id'          => 'root.start-updater-install',
            'url'         => 'start-updater',
            'templateUrl' => "$base/start-updater",
            'Controller'  => 'startUpdaterController',
            'title'       => "Component \n Install",
            'header'      => 'Step 3: Install',
            'nav'         => true,
            'order'       => 6,
            'type'        => 'install',
            'wrapper'     => 1
        ],
    ],
];
