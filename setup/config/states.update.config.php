<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

$base = basename($_SERVER['SCRIPT_FILENAME']);

return [
    'navUpdaterTitles' => [
        'update'    => 'Update ',
    ],
    'navUpdater' => [
        [
            'id'          => 'root.readiness-check-update',
            'url'         => 'readiness-check-updater',
            'templateUrl' => "{$base}/readiness-check-updater",
            'title'       => "Readiness \n Check",
            'header'      => 'Step 1: Readiness Check',
            'nav'         => true,
            'order'       => 2,
            'type'        => 'update'
        ],
        [
            'id'          => 'root.readiness-check-update.progress',
            'url'         => 'readiness-check-updater/progress',
            'templateUrl' => "$base/readiness-check-updater/progress",
            'title'       => 'Readiness Check',
            'header'      => 'Step 1: Readiness Check',
            'Controller'  => 'readinessCheckController',
            'nav'         => false,
            'order'       => 3,
            'type'        => 'update'
        ],
        [
            'id'          => 'root.create-backup-update',
            'url'         => 'create-backup',
            'templateUrl' => "$base/create-backup",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'createBackupController',
            'nav'         => true,
            'validate'    => true,
            'order'       => 4,
            'type'        => 'update'
        ],
        [
            'id'          => 'root.create-backup-update.progress',
            'url'         => 'create-backup/progress',
            'templateUrl' => "$base/complete-backup/progress",
            'title'       => "Create \n Backup",
            'header'      => 'Step 2: Create Backup',
            'Controller'  => 'completeBackupController',
            'nav'         => false,
            'order'       => 5,
            'type'        => 'update'
        ],
        [
            'id'          => 'root.start-updater-update',
            'url'         => 'start-updater',
            'templateUrl' => "$base/start-updater",
            'Controller'  => 'startUpdaterController',
            'title'       => "Extension \n Update",
            'header'      => 'Step 3: Extension Update',
            'nav'         => true,
            'order'       => 6,
            'type'        => 'update'
        ],
    ],
];
