<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

$base = basename($_SERVER['SCRIPT_FILENAME']);

return [
    'navUpdaterTitles' => [
        'enable'    => 'Enable ',
    ],
    'navUpdater' => [
        [
            'id'          => 'root.readiness-check-enable',
            'url'         => 'readiness-check-enable',
            'templateUrl' => "{$base}/readiness-check-updater",
            'title'       => "Readiness \n Check",
            'header'      => 'Step 1: Readiness Check',
            'nav'         => true,
            'order'       => 2,
            'type'        => 'enable'
        ],
        [
            'id'          => 'root.readiness-check-enable.progress',
            'url'         => 'readiness-check-enable/progress',
            'templateUrl' => "$base/readiness-check-updater/progress",
            'title'       => 'Readiness Check',
            'header'      => 'Step 1: Readiness Check',
            'Controller'  => 'readinessCheckController',
            'nav'         => false,
            'order'       => 3,
            'type'        => 'enable'
        ],
        [
            'id'          => 'root.create-backup-enable',
            'url'         => 'create-backup',
            'templateUrl' => "$base/create-backup",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'createBackupController',
            'nav'         => true,
            'validate'    => true,
            'order'       => 4,
            'type'        => 'enable'
        ],
        [
            'id'          => 'root.create-backup-enable.progress',
            'url'         => 'create-backup/progress',
            'templateUrl' => "$base/complete-backup/progress",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'completeBackupController',
            'nav'         => false,
            'order'       => 5,
            'type'        => 'enable'
        ],
        [
            'id'          => 'root.start-updater-enable',
            'url'         => 'enable',
            'templateUrl' => "$base/start-updater",
            'title'       => "Enable Module",
            'Controller'  => 'startUpdaterController',
            'header'      => 'Step 3: Enable Module',
            'nav'         => true,
            'order'       => 6,
            'type'        => 'enable'
        ],
        [
            'id'          => 'root.enable-success',
            'url'         => 'enable-success',
            'templateUrl' => "$base/updater-success",
            'Controller'  => 'updaterSuccessController',
            'order'       => 7,
            'main'        => true,
            'noMenu'      => true
        ],
    ],
];
