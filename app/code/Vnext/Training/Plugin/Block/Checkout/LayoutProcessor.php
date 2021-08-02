<?php

namespace Vnext\Training\Plugin\Block\Checkout;

class LayoutProcessor
{
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, $jsLayout)
    {
        $children = $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
        ['children']['shippingAddress']['children']['shipping-address-fieldset']['children'];
        // custom input text
        $children['custom_radio'] = array_merge($children, [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
            ],
            'validation' => [
                'required-entry' => true,
                'max_text_length' => 255
            ],
            'dataScope' => 'shippingAddress.custom_attributes.custom_text',
            'provider' => 'checkoutProvider',
            'label' => 'Note',
            'visible' => true,
            'sortOrder' => 250,
            'id' => 'custom-text'
        ]);


        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
        ['children']['shippingAddress']['children']['shipping-address-fieldset']['children'] = $children;
        return $jsLayout;

    }
}