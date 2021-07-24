<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

$base = basename($_SERVER['SCRIPT_FILENAME']);

return [
    'navUpdaterTitles' => [
        'disable'    => 'Disable ',
    ],
    'navUpdater' => [
        [
            'id'          => 'root.readiness-check-disable',
            'url'         => 'readiness-check-disable',
            'templateUrl' => "{$base}/readiness-check-updater",
            'title'       => "Readiness \n Check",
            'header'      => 'Step 1: Readiness Check',
            'nav'         => true,
            'order'       => 2,
            'type'        => 'disable'
        ],
        [
            'id'          => 'root.readiness-check-disable.progress',
            'url'         => 'readiness-check-disable/progress',
            'templateUrl' => "$base/readiness-check-updater/progress",
            'title'       => 'Readiness Check',
            'header'      => 'Step 1: Readiness Check',
            'Controller'  => 'readinessCheckController',
            'nav'         => false,
            'order'       => 3,
            'type'        => 'disable'
        ],
        [
            'id'          => 'root.create-backup-disable',
            'url'         => 'create-backup',
            'templateUrl' => "$base/create-backup",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'createBackupController',
            'nav'         => true,
            'validate'    => true,
            'order'       => 4,
            'type'        => 'disable'
        ],
        [
            'id'          => 'root.create-backup-disable.progress',
            'url'         => 'create-backup/progress',
            'templateUrl' => "$base/complete-backup/progress",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'completeBackupController',
            'nav'         => false,
            'order'       => 5,
            'type'        => 'disable'
        ],
        [
            'id'          => 'root.start-updater-disable',
            'url'         => 'disable',
            'templateUrl' => "$base/start-updater",
            'title'       => "Disable",
            'Controller'  => 'startUpdaterController',
            'header'      => 'Step 3: Disable',
            'nav'         => true,
            'order'       => 6,
            'type'        => 'disable'
        ],
        [
            'id'          => 'root.disable-success',
            'url'         => 'disable-success',
            'templateUrl' => "$base/updater-success",
            'Controller'  => 'updaterSuccessController',
            'order'       => 7,
            'main'        => true,
            'noMenu'      => true
        ],
    ],
];
