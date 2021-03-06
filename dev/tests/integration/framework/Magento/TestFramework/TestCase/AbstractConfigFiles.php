<?php
/**
 * Abstract class that helps in writing tests that validate Config xml files
 * are valid both individually and when merged.
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\TestFramework\TestCase;

use Magento\Framework\Component\ComponentRegistrar;

abstract class AbstractConfigFiles extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $_schemaFile;

    /**
     * @var  \Magento\Framework\Config\Reader\Filesystem
     */
    protected $_reader;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $_fileResolverMock;

    /**
     * @var \Magento\TestFramework\ObjectManager
     */
    protected $_objectManager;

    /**
     * @var ComponentRegistrar
     */
    protected $componentRegistrar;

    public function setUp()
    {
        $this->componentRegistrar = new ComponentRegistrar();
        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $xmlFiles = $this->getXmlConfigFiles();
        if (!empty($xmlFiles)) {
            $this->_fileResolverMock = $this->getMockBuilder(
                \Magento\Framework\App\Arguments\FileResolver\Primary::class
            )->disableOriginalConstructor()->getMock();

            /* Enable Validation regardless of MAGE_MODE */
            $validateStateMock = $this->getMockBuilder(
                \Magento\Framework\Config\ValidationStateInterface::class
            )->disableOriginalConstructor()->getMock();
            $validateStateMock->expects($this->any())->method('isValidationRequired')->will($this->returnValue(true));

            $this->_reader = $this->_objectManager->create(
                $this->_getReaderClassName(),
                [
                    'configFiles' => $xmlFiles,
                    'fileResolver' => $this->_fileResolverMock,
                    'validationState' => $validateStateMock
                ]
            );

            $this->_schemaFile = $this->_getXsdPath();
        }
    }

    protected function tearDown()
    {
        $this->_objectManager->removeSharedInstance($this->_getReaderClassName());
    }

    /**
     * @dataProvider xmlConfigFileProvider
     */
    public function testXmlConfigFile($file, $skip = false)
    {
        if ($skip) {
            $this->markTestSkipped('There are no xml files in the system for this test.');
        }
        $validationStateMock = $this->createMock(\Magento\Framework\Config\ValidationStateInterface::class);
        $validationStateMock->method('isValidationRequired')
            ->willReturn(false);
        $domConfig = new \Magento\Framework\Config\Dom($file, $validationStateMock);
        $errors = [];
        $result = $domConfig->validate($this->_schemaFile, $errors);
        $message = "Invalid XML-file: {$file}\n";
        foreach ($errors as $error) {
            $message .= "{$error}\n";
        }

        $this->assertTrue($result, $message);
    }

    public function testMergedConfig()
    {
        $files = $this->getXmlConfigFiles();
        if (empty($files)) {
            $this->markTestSkipped('There are no xml files in the system for this test.');
        }
        // have the file resolver return all relevant xml files
        $this->_fileResolverMock->expects($this->any())
            ->method('get')
            ->will($this->returnValue($this->getXmlConfigFiles()));

        try {
            // this will merge all xml files and validate them
            $this->_reader->read('global');
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->fail($e->getMessage());
        }
    }

    /**
     * Returns an array of all the Config xml files for this test.
     *
     * Handles the case where no files were found and notifies the test to skip.
     * This is needed to avoid a fatal error caused by a provider returning an empty array.
     *
     * @return array
     */
    public function xmlConfigFileProvider()
    {
        $fileList = $this->getXmlConfigFiles();
        $result = [];
        foreach ($fileList as $fileContent) {
            $result[] = [$fileContent];
        }
        return $result;
    }

    /**
     * Finds all Config xml files based on a path glob.
     *
     * @return \Magento\Framework\Config\FileIterator
     */
    public function getXmlConfigFiles()
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        /** @var $moduleDirSearch \Magento\Framework\Component\DirSearch */
        $moduleDirSearch = $objectManager->get(\Magento\Framework\Component\DirSearch::class);

        return $objectManager->get(\Magento\Framework\Config\FileIteratorFactory::class)
            ->create($moduleDirSearch->collectFiles(ComponentRegistrar::MODULE, $this->_getConfigFilePathGlob()));
    }

    /**
     * Returns the reader class name that will be instantiated via ObjectManager
     *
     * @return string reader class name
     */
    abstract protected function _getReaderClassName();

    /**
     * Returns a string that represents the path to the Config file, starting in the app directory.
     *
     * Format is glob, so * is allowed.
     *
     * @return string
     */
    abstract protected function _getConfigFilePathGlob();

    /**
     * Returns an absolute path to the XSD file corresponding to the XML files specified in _getConfigFilePathGlob
     *
     * @return string
     */
    abstract protected function _getXsdPath();
}
