<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Setup\Fixtures;

use Magento\Framework\Xml\Parser;

/**
 * Config data for fixtures
 */
class FixtureConfig
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var Parser
     */
    private $parser;

    /**
     * @param Parser $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Load Config from file
     *
     * @param string $filename
     * @throws \Exception
     *
     * @return void
     */
    public function loadConfig($filename)
    {
        if (!is_readable($filename)) {
            throw new \Exception("Profile configuration file `{$filename}` is not readable or does not exists.");
        }
        $this->parser->getDom()->load($filename);
        $this->parser->getDom()->xinclude();
        $this->config = $this->parser->xmlToArray();
        $this->config['Config']['profile']['di'] = dirname($filename) . '/'
            . (isset($this->config['Config']['profile']['di'])
                ? $this->config['Config']['profile']['di']
                : '../../Config/di.xml'
            );
    }

    /**
     * Get profile configuration value
     *
     * @param string $key
     * @param null|mixed $default
     *
     * @return mixed
     */
    public function getValue($key, $default = null)
    {
        return isset($this->config['Config']['profile'][$key]) ?
            (
                // Work around for how attributes are handled in the XML parser when injected via xinclude due to the
                // files existing outside of the current working directory.
            isset($this->config['Config']['profile'][$key]['_value']) ?
                $this->config['Config']['profile'][$key]['_value'] : $this->config['Config']['profile'][$key]
            ) : $default;
    }
}
