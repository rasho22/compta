<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
class Twig_Tests_FileCachingTest extends PHPUnit_Framework_TestCase
{
    protected $fileName;
    protected $env;
    protected $tmpDir;

    public function setUp()
=======
require_once dirname(__FILE__).'/FilesystemHelper.php';

class Twig_Tests_FileCachingTest extends PHPUnit_Framework_TestCase
{
    private $env;
    private $tmpDir;

    protected function setUp()
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    {
        $this->tmpDir = sys_get_temp_dir().'/TwigTests';
        if (!file_exists($this->tmpDir)) {
            @mkdir($this->tmpDir, 0777, true);
        }

        if (!is_writable($this->tmpDir)) {
            $this->markTestSkipped(sprintf('Unable to run the tests as "%s" is not writable.', $this->tmpDir));
        }

        $this->env = new Twig_Environment(new Twig_Loader_Array(array('index' => 'index', 'index2' => 'index2')), array('cache' => $this->tmpDir));
    }

<<<<<<< HEAD
    public function tearDown()
    {
        if ($this->fileName) {
            unlink($this->fileName);
        }

        $this->removeDir($this->tmpDir);
    }

=======
    protected function tearDown()
    {
        Twig_Tests_FilesystemHelper::removeDir($this->tmpDir);
    }

    /**
     * @group legacy
     */
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function testWritingCacheFiles()
    {
        $name = 'index';
        $this->env->loadTemplate($name);
        $cacheFileName = $this->env->getCacheFilename($name);

        $this->assertTrue(file_exists($cacheFileName), 'Cache file does not exist.');
<<<<<<< HEAD
        $this->fileName = $cacheFileName;
    }

=======
    }

    /**
     * @group legacy
     */
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function testClearingCacheFiles()
    {
        $name = 'index2';
        $this->env->loadTemplate($name);
        $cacheFileName = $this->env->getCacheFilename($name);

        $this->assertTrue(file_exists($cacheFileName), 'Cache file does not exist.');
        $this->env->clearCacheFiles();
        $this->assertFalse(file_exists($cacheFileName), 'Cache file was not cleared.');
    }
<<<<<<< HEAD

    private function removeDir($target)
    {
        $fp = opendir($target);
        while (false !== $file = readdir($fp)) {
            if (in_array($file, array('.', '..'))) {
                continue;
            }

            if (is_dir($target.'/'.$file)) {
                self::removeDir($target.'/'.$file);
            } else {
                unlink($target.'/'.$file);
            }
        }
        closedir($fp);
        rmdir($target);
    }
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
