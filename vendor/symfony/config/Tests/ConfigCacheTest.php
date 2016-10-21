<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Config\Tests;

use Symfony\Component\Config\ConfigCache;
<<<<<<< HEAD
use Symfony\Component\Config\Resource\FileResource;

class ConfigCacheTest extends \PHPUnit_Framework_TestCase
{
    private $resourceFile = null;

    private $cacheFile = null;

    private $metaFile = null;

    protected function setUp()
    {
        $this->resourceFile = tempnam(sys_get_temp_dir(), '_resource');
        $this->cacheFile = tempnam(sys_get_temp_dir(), 'config_');
        $this->metaFile = $this->cacheFile.'.meta';

        $this->makeCacheFresh();
        $this->generateMetaFile();
=======
use Symfony\Component\Config\Tests\Resource\ResourceStub;

class ConfigCacheTest extends \PHPUnit_Framework_TestCase
{
    private $cacheFile = null;

    protected function setUp()
    {
        $this->cacheFile = tempnam(sys_get_temp_dir(), 'config_');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    protected function tearDown()
    {
<<<<<<< HEAD
        $files = array($this->cacheFile, $this->metaFile, $this->resourceFile);
=======
        $files = array($this->cacheFile, $this->cacheFile.'.meta');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        foreach ($files as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }
    }

<<<<<<< HEAD
    public function testGetPath()
    {
        $cache = new ConfigCache($this->cacheFile, true);

        $this->assertSame($this->cacheFile, $cache->getPath());
    }

    public function testCacheIsNotFreshIfFileDoesNotExist()
    {
        unlink($this->cacheFile);

        $cache = new ConfigCache($this->cacheFile, false);
=======
    /**
     * @dataProvider debugModes
     */
    public function testCacheIsNotValidIfNothingHasBeenCached($debug)
    {
        unlink($this->cacheFile); // remove tempnam() side effect
        $cache = new ConfigCache($this->cacheFile, $debug);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertFalse($cache->isFresh());
    }

<<<<<<< HEAD
    public function testCacheIsAlwaysFreshIfFileExistsWithDebugDisabled()
    {
        $this->makeCacheStale();

        $cache = new ConfigCache($this->cacheFile, false);
=======
    public function testIsAlwaysFreshInProduction()
    {
        $staleResource = new ResourceStub();
        $staleResource->setFresh(false);

        $cache = new ConfigCache($this->cacheFile, false);
        $cache->write('', array($staleResource));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->assertTrue($cache->isFresh());
    }

<<<<<<< HEAD
    public function testCacheIsNotFreshWithoutMetaFile()
    {
        unlink($this->metaFile);

        $cache = new ConfigCache($this->cacheFile, true);

        $this->assertFalse($cache->isFresh());
    }

    public function testCacheIsFreshIfResourceIsFresh()
    {
        $cache = new ConfigCache($this->cacheFile, true);

        $this->assertTrue($cache->isFresh());
    }

    public function testCacheIsNotFreshIfOneOfTheResourcesIsNotFresh()
    {
        $this->makeCacheStale();

        $cache = new ConfigCache($this->cacheFile, true);

        $this->assertFalse($cache->isFresh());
    }

    public function testWriteDumpsFile()
    {
        unlink($this->cacheFile);
        unlink($this->metaFile);

        $cache = new ConfigCache($this->cacheFile, false);
        $cache->write('FOOBAR');

        $this->assertFileExists($this->cacheFile, 'Cache file is created');
        $this->assertSame('FOOBAR', file_get_contents($this->cacheFile));
        $this->assertFileNotExists($this->metaFile, 'Meta file is not created');
    }

    public function testWriteDumpsMetaFileWithDebugEnabled()
    {
        unlink($this->cacheFile);
        unlink($this->metaFile);

        $metadata = array(new FileResource($this->resourceFile));

        $cache = new ConfigCache($this->cacheFile, true);
        $cache->write('FOOBAR', $metadata);

        $this->assertFileExists($this->cacheFile, 'Cache file is created');
        $this->assertFileExists($this->metaFile, 'Meta file is created');
        $this->assertSame(serialize($metadata), file_get_contents($this->metaFile));
    }

    private function makeCacheFresh()
    {
        touch($this->resourceFile, filemtime($this->cacheFile) - 3600);
    }

    private function makeCacheStale()
    {
        touch($this->cacheFile, filemtime($this->resourceFile) - 3600);
    }

    private function generateMetaFile()
    {
        file_put_contents($this->metaFile, serialize(array(new FileResource($this->resourceFile))));
=======
    /**
     * @dataProvider debugModes
     */
    public function testIsFreshWhenNoResourceProvided($debug)
    {
        $cache = new ConfigCache($this->cacheFile, $debug);
        $cache->write('', array());
        $this->assertTrue($cache->isFresh());
    }

    public function testFreshResourceInDebug()
    {
        $freshResource = new ResourceStub();
        $freshResource->setFresh(true);

        $cache = new ConfigCache($this->cacheFile, true);
        $cache->write('', array($freshResource));

        $this->assertTrue($cache->isFresh());
    }

    public function testStaleResourceInDebug()
    {
        $staleResource = new ResourceStub();
        $staleResource->setFresh(false);

        $cache = new ConfigCache($this->cacheFile, true);
        $cache->write('', array($staleResource));

        $this->assertFalse($cache->isFresh());
    }

    public function debugModes()
    {
        return array(
            array(true),
            array(false),
        );
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
