<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
return [
    'scopes' => [
        'websites' => []
    ],
    /**
     * Shared configuration was written to Config.php and system-specific configuration to env.php.
     * Shared configuration file (Config.php) doesn't contain sensitive data for security reasons.
     * Sensitive data can be stored in the following environment variables:
     * CONFIG__DEFAULT__SOME__CONFIG__PATH_ONE for some/Config/path_one
     * CONFIG__DEFAULT__SOME__CONFIG__PATH_TWO for some/Config/path_two
     * CONFIG__DEFAULT__SOME__CONFIG__PATH_THREE for some/Config/path_three
     */
    'system' => [],
    'integrationTestImporter' => [
        'someGroup' => [
            'someField' => 'testValue',
        ]
    ],
    'integrationTestSecondImporter' => [
        'someGroup' => [
            'someField' => 'testSecondValue',
        ]
    ],
];
