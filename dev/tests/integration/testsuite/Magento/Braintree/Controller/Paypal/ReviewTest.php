<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Braintree\Controller\Paypal;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\TestFramework\TestCase\AbstractController;

/**
 * ReviewTest
 */
class ReviewTest extends AbstractController
{
    /**
     * @var Review
     */
    private $controller;

    /**
     * @inheritdoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->controller = $this->_objectManager->create(Review::class);
    }

    /**
     * Test Controller implements correct interfaces
     *
     */
    public function testInterfaceImplementation()
    {
        $this->assertInstanceOf(HttpGetActionInterface::class, $this->controller);
        $this->assertInstanceOf(HttpPostActionInterface::class, $this->controller);
    }
}
