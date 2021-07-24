<?php
/**
 * Test case for \Magento\Framework\Profiler
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework;

class ProfilerTest extends \PHPUnit\Framework\TestCase
{
    protected function tearDown()
    {
        \Magento\Framework\Profiler::reset();
    }

    /**
     * @dataProvider applyConfigDataProvider
     * @param array $config
     * @param array $expectedDrivers
     */
    public function testApplyConfigWithDrivers(array $config, array $expectedDrivers)
    {
        \Magento\Framework\Profiler::applyConfig($config, '');
        $this->assertAttributeEquals($expectedDrivers, '_drivers', \Magento\Framework\Profiler::class);
    }

    /**
     * @return array
     */
    public function applyConfigDataProvider()
    {
        return [
            'Empty Config does not create any driver' => ['Config' => [], 'drivers' => []],
            'Integer 0 does not create any driver' => [
                'Config' => ['drivers' => [0]],
                'drivers' => [],
            ],
            'Integer 1 does creates standard driver' => [
                'Config' => ['drivers' => [1]],
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config array key sets driver type' => [
                'configs' => ['drivers' => ['standard' => 1]],
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config array key ignored when type set' => [
                'Config' => ['drivers' => ['custom' => ['type' => 'standard']]],
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config with outputs element as integer 1 creates output' => [
                'Config' => [
                    'drivers' => [['outputs' => ['html' => 1]]],
                    'baseDir' => '/some/base/dir',
                ],
                'drivers' => [
                    new \Magento\Framework\Profiler\Driver\Standard(
                        ['outputs' => [['type' => 'html', 'baseDir' => '/some/base/dir']]]
                    ),
                ],
            ],
            'Config with outputs element as integer 0 does not create output' => [
                'Config' => ['drivers' => [['outputs' => ['html' => 0]]]],
                'drivers' => [new \Magento\Framework\Profiler\Driver\Standard()],
            ],
            'Config with shortly defined outputs element' => [
                'Config' => ['drivers' => [['outputs' => ['foo' => 'html']]]],
                'drivers' => [
                    new \Magento\Framework\Profiler\Driver\Standard(['outputs' => [['type' => 'html']]]),
                ],
            ],
            'Config with fully defined outputs element options' => [
                'Config' => [
                    'drivers' => [
                        [
                            'outputs' => [
                                'foo' => [
                                    'type' => 'html',
                                    'filterName' => '/someFilter/',
                                    'thresholds' => ['someKey' => 123],
                                    'baseDir' => '/custom/dir',
                                ],
                            ],
                        ],
                    ],
                ],
                'drivers' => [
                    new \Magento\Framework\Profiler\Driver\Standard(
                        [
                            'outputs' => [
                                [
                                    'type' => 'html',
                                    'filterName' => '/someFilter/',
                                    'thresholds' => ['someKey' => 123],
                                    'baseDir' => '/custom/dir',
                                ],
                            ],
                        ]
                    ),
                ],
            ],
            'Config with shortly defined output' => [
                'Config' => ['drivers' => [['output' => 'html']]],
                'drivers' => [
                    new \Magento\Framework\Profiler\Driver\Standard(['outputs' => [['type' => 'html']]]),
                ],
            ]
        ];
    }
}
