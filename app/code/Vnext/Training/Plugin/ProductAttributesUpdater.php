<?php
namespace Vnext\Training\Plugin;

class ProductAttributesUpdater
{
    public function beforeSetName(\Magento\Catalog\Model\Product $subject,$name)
    {
        $name = "Anh Manh";
      return ['(' . $name . ')'];
    }
    public function afterGetName(\Magento\Catalog\Model\Product $subject,$result){
        $result = "Manh nguyen"
      return '|' . $result . '|';
    }
    public function aroundSave(\Magento\Catalog\Model\Product $subject, callable $proceed)
    {
        $someValue = $this->doSmthBeforeProductIsSaved();
        $returnValue = null;

        if ($this->canCallProceedCallable($someValue)) {
            $returnValue = $proceed();
        }

        if ($returnValue) {
            $this->postProductToFacebook();
        }

        return $returnValue;
    }
}
