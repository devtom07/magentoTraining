<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

return [
    "product-details" => [
        "arguments" => [
            "data" => [
                "Config" => [
                    "dataScope" => "data.product",
                ],
            ],
        ],
        "children" => [
            "container_status" => [
                "children" => [
                    "status" => [
                        "arguments" => [
                            "data" => [
                                "Config" => [
                                    "dataType" => "select",
                                    "formElement" => "select",
                                    "options" => [
                                        [
                                            "value" => 1,
                                            "label" => "Enabled"
                                        ],
                                        [
                                            "value" => 2,
                                            "label" => "Disabled"
                                        ]
                                    ],
                                    "visible" => "1",
                                    "required" => "0",
                                    "label" => "Enable Product",
                                    "source" => "product-details",
                                    "scopeLabel" => "[WEBSITE]",
                                    "globalScope" => false,
                                    "code" => "status",
                                    "sortOrder" => "__placeholder__",
                                    "service" => [
                                        "template" => "ui/form/element/helper/service"
                                    ],
                                    "componentType" => "field"
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            "container_name" => [
                "children" => [
                    "name" => [
                        "arguments" => [
                            "data" => [
                                "Config" => [
                                    "dataType" => "text",
                                    "formElement" => "input",
                                    "visible" => "1",
                                    "required" => "1",
                                    "label" => "Product Name",
                                    "source" => "product-details",
                                    "scopeLabel" => "[STORE VIEW]",
                                    "globalScope" => false,
                                    "code" => "name",
                                    "sortOrder" => "__placeholder__",
                                    "service" => [
                                        "template" => "ui/form/element/helper/service"
                                    ],
                                    "componentType" => "field",
                                    "validation" => [
                                        "required-entry" => true
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            "container_sku" => [
                "children" => [
                    "sku" => [
                        "arguments" => [
                            "data" => [
                                "Config" => [
                                    "dataType" => "text",
                                    "formElement" => "input",
                                    "visible" => "1",
                                    "required" => "1",
                                    "label" => "SKU",
                                    "source" => "product-details",
                                    "scopeLabel" => "[GLOBAL]",
                                    "globalScope" => true,
                                    "code" => "sku",
                                    "sortOrder" => "__placeholder__",
                                    "componentType" => "field",
                                    "validation" => [
                                        "required-entry" => true
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            "container_price" => [
                "children" => [
                    "price" => [
                        "arguments" => [
                            "data" => [
                                "Config" => [
                                    "dataType" => "price",
                                    "formElement" => "input",
                                    "visible" => "1",
                                    "required" => "1",
                                    "label" => "Price",
                                    "source" => "product-details",
                                    "scopeLabel" => "[GLOBAL]",
                                    "globalScope" => true,
                                    "code" => "price",
                                    "sortOrder" => "__placeholder__",
                                    "componentType" => "field",
                                    "validation" => [
                                        "required-entry" => true
                                    ]
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
