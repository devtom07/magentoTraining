<?php
/**
 * Obsolete configuration nodes
 *
 * Format: <class_name> => <replacement>
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreStart

return [
    '/Config/global/fieldsets' => '',
    '/Config/global/cache/betatypes' => '',
    '/Config/admin/fieldsets' => '',
    '/Config/general/locale' => 'This configuration moved to Di configuration of \Magento\Framework\Locale\ConfigInterface',
    '/Config/global/can_use_base_url' => 'This configuration moved to Di configuration of \Magento\Backend\App\Action\Context class',
    '/Config/global/locale/allow/codes' => 'This configuration moved to Di configuration of \Magento\Framework\Locale\ConfigInterface',
    '/Config/global/locale/allow/currencies' => 'This configuration moved to Di configuration of \Magento\Framework\Locale\ConfigInterface',
    '/Config/global/mime/types' => 'This configuration moved to Di configuration for \Magento\Downloadable\Helper\File class',
    '/Config/global/models/*/deprecatedNode' => '',
    '/Config/global/models/*/entities/*/table' => '',
    '/Config/global/models/*/class' => '',
    '/Config/global/helpers/*/class' => '',
    '/Config/global/blocks/*/class' => '',
    '/Config/global/models/*/resourceModel' => '',
    '/Config/global/page/layouts' => 'Moved to page_layouts.xml',
    '/Config/global/cms/layouts' => 'This was never used and is no longer supported',
    '/Config/global/payment/cc/types/*/validator' => 'This configuration was moved to DI configuration of \Magento\Centinel\Model\StateFactory',
    '/Config/global/payment' => 'Move them to payment.xml.',
    '/Config/adminhtml/menu' => 'Move them to adminhtml.xml.',
    '/Config/adminhtml/acl' => 'Move them to adminhtml.xml.',
    '/Config/adminhtml/global_search' => 'This configuration moved to Di configuration of \Magento\Backend\Controller\Index',
    '/Config/*[self::global|self::adminhtml|self::frontend]/di' => 'This configuration moved to di.xml file',
    '/Config/*[self::global|self::adminhtml|self::frontend]/events' => 'This configuration moved to events.xml file',
    '/Config/*[self::global|self::adminhtml|self::frontend]/routers' => 'Routes configuration moved to routes.xml file,' .
    'routers list can be set through Di configuration of \Magento\Framework\App\RouterList model',
    '/Config/global/importexport' => 'This configuration moved to import.xml and export.xml files',
    '/Config/global/catalog/product/type' => 'This configuration moved to product_types.xml file',
    '/Config/global/catalog/product/options' => 'This configuration moved to product_options.xml file',
    '/Config/global/catalog/product/media/image_types' => 'This configuration moved to Di configuration of ' .
    '\Magento\Backend\Block\Catalog\Product\Frontend\Product\Watermark',
    '/Config/global/eav_attributes' => 'This configuration moved to eav_attributes.xml file',
    '/Config/global/index' => 'This configuration moved to indexers.xml file',
    '/Config/global/catalogrule' => 'This configuration moved to Di configuration of \Magento\CatalogRule\Model\Rule',
    '/Config/global/salesrule' => 'This configuration moved to Di configuration of \Magento\SalesRule\Helper\Coupon',
    '/Config/global/session' => 'This configuration moved to Di configuration of \Magento\Framework\Session\Validator',
    '/Config/global/ignore_user_agents' => 'This configuration moved to Di configuration of \Magento\Log\Model\Visitor',
    '/Config/global/request' => 'This configuration moved to Di configuration of \Magento\Framework\App\RequestInterface',
    '/Config/global/secure_url' => 'This configuration moved to Di configuration of \Magento\Framework\Url\SecurityInfo',
    '/Config/global/dev' => 'This configuration moved to Di configuration of \Magento\Framework\App\Action\Context',
    '/Config/global/webapi' => 'This configuration moved to Di configuration of \Magento\Webapi\Controller\Request\Rest\Interpreter\Factory' .
    ' and \Magento\Webapi\Controller\Response\Rest\Renderer\Factory',
    '/Config/global/cms' => 'This configuration moved to Di configuration of \Magento\Cms\Model\Wysiwyg\Images\Storage' .
    ' and \Magento\Cms\Model\Wysiwyg\Config',
    '/Config/global/widget' => 'This configuration moved to Di configuration of \Magento\Cms\Model\Template\FilterProvider',
    '/Config/global/catalog/product/flat/max_index_count' => 'This configuration moved to Di configuration of \Magento\Catalog\Model\ResourceModel\Product\Flat\Indexer',
    '/Config/global/catalog/product/flat/attribute_groups' => 'This configuration moved to Di configuration of \Magento\Catalog\Model\ResourceModel\Product\Flat\Indexer',
    '/Config/global/catalog/product/flat/add_filterable_attributes' => 'This configuration moved to Di configuration of \Magento\Catalog\Helper\Product\Flat\Indexer',
    '/Config/global/catalog/product/flat/add_child_data' => 'This configuration moved to Di configuration of \Magento\Catalog\Helper\Product\Flat\Indexer',
    '/Config/global/catalog/content/template_filter' => 'This configuration moved to Di configuration of \Magento\Catalog\Helper\Data',
    '/Config/frontend/catalog/per_page_values/list' => 'This configuration moved to Di configuration of \Magento\Catalog\Model\Config\Source\ListPerPage',
    '/Config/frontend/catalog/per_page_values/grid' => 'This configuration moved to Di configuration of \Magento\Catalog\Model\Config\Source\GridPerPage',
    '/Config/global/catalog/product/design' => 'This configuration moved to Di configuration of' .
    ' \Magento\Catalog\Model\Entity\Product\Attribute\Design\Option\Container',
    '/Config/global/catalog/product/attributes' => 'This configuration moved catalog_attributes.xml',
    '/Config/global/eav_frontendclasses' => 'This configuration was removed. ' .
    'Please pluginize \Magento\Eav\Helper\Data::getFrontendClasses to extend frontend classes list',
    '/Config/global/resources' => 'This configuration moved to Di configuration of \Magento\Framework\App\ResourceConnection',
    '/Config/global/resource' => 'This configuration moved to Di configuration of \Magento\Framework\App\ResourceConnection',
    '/Config/*/events/core_block_abstract_to_html_after' => 'Event has been replaced with "core_layout_render_element"',
    '/Config/*/events/catalog_controller_product_delete' => '',
    '/Config//observers/*/args' => 'This was an undocumented and unused feature in event subscribers',
    '/Config/default/design/theme' => 'Relocated to /Config/<area>/design/theme',
    '/Config/global/theme' => 'Configuration moved to DI file settings',
    '/Config/default/web/*/base_js_url' => '',
    '/Config/default/web/*/base_skin_url' => '/Config/default/web/*/base_static_url',
    '/Config/default/web/*/base_cache_url' => '/Config/default/web/*/base_static_url',
    '/Config/global/cache/types/*/tags' => 'use /Config/global/cache/types/*/class node instead',
    '/Config/global/disable_local_modules' => '',
    '/Config/global/newsletter/tempate_filter' => 'Use DI configs to setup model for template processing',
    '/Config/*/layout' => 'Use convention for layout files placement instead of configuration',
    '/Config/frontend/product/collection/attributes' => 'Use /Config/group[@name="catalog_product"] of catalog_attributes.xml',
    '/Config/frontend/category/collection/attributes' => 'Use /Config/group[@name="catalog_category"] of catalog_attributes.xml',
    '/Config/global/sales/quote/item/product_attributes' => 'Use /Config/group[@name="quote_item"] of catalog_attributes.xml',
    '/Config/global/wishlist/item/product_attributes' => 'Use /Config/group[@name="wishlist_item"] of catalog_attributes.xml',
    '/Config/global/catalog/product/flat/attribute_nodes' => 'Use /Config/global/catalog/product/flat/attribute_groups',
    '/Config/global/customer/address/formats' => 'Use /Config/format of address_formats.xml',
    '/Config/global/pdf' => 'Use configuration in pdf.xml',
    '/Config/install' => 'Configurations moved to DI file settings',
    '/Config/install/design' => 'Configurations moved to DI file settings',
    '/Config/adminhtml/design' => 'Configurations moved to DI file settings',
    '/Config/frontend/design' => 'Configurations moved to DI file settings',
    '/Config/crontab' => 'All cron configurations moved to crontab.xml',
    '/Config/global/areas' => 'Configurations moved to DI file settings',
    '/Config/vde' => 'Was moved to di',
    '/Config/global/ignoredModules' => 'Was replaced using di',
    '/Config/global/helpers' => 'Was replaced using di',
    '/Config/global/external_cache' => 'Was replaced using di',
    '/Config/global/currency/import/services' => 'Configurations moved to DI file settings',
    '/Config/global/template' => 'Use /Config/template of email_templates.xml',
    '/Config/default/general/file/sitemap_generate_valid_paths' => '/Config/default/sitemap/file/valid_paths',
    '/Config/dev/css/minify_adapter' => 'Was replaced using di',
    '/Config/dev/js/minify_adapter' => 'Was replaced using di',
];
