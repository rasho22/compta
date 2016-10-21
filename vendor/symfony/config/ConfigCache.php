<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Config;

<<<<<<< HEAD
use Symfony\Component\Config\Resource\ResourceInterface;
use Symfony\Component\Filesystem\Exception\IOException;
use Symfony\Component\Filesystem\Filesystem;

/**
 * ConfigCache manages PHP cache files.
 *
 * When debug is enabled, it knows when to flush the cache
 * thanks to an array of ResourceInterface instances.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ConfigCache implements ConfigCacheInterface
{
    private $debug;
    private $file;
=======
use Symfony\Component\Config\Resource\BCResourceInterfaceChecker;
use Symfony\Component\Config\Resource\SelfCheckingResourceChecker;

/**
 * ConfigCache caches arbitrary content in files on disk.
 *
 * When in debug mode, those metadata resources that implement
 * \Symfony\Component\Config\Resource\SelfCheckingResourceInterface will
 * be used to check cache freshness.
 *
 * During a transition period, also instances of
 * \Symfony\Component\Config\Resource\ResourceInterface will be checked
 * by means of the isFresh() method. This behaviour is deprecated since 2.8
 * and will be removed in 3.0.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Matthias Pigulla <mp@webfactory.de>
 */
class ConfigCache extends ResourceCheckerConfigCache
{
    private $debug;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    /**
     * @param string $file  The absolute cache path
     * @param bool   $debug Whether debugging is enabled or not
     */
    public function __construct($file, $debug)
    {
<<<<<<< HEAD
        $this->file = $file;
=======
        parent::__construct($file, array(
            new SelfCheckingResourceChecker(),
            new BCResourceInterfaceChecker(),
        ));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $this->debug = (bool) $debug;
    }

    /**
     * Gets the cache file path.
     *
     * @return string The cache file path
     *
     * @deprecated since 2.7, to be removed in 3.0. Use getPath() instead.
     */
    public function __toString()
    {
        @trigger_error('ConfigCache::__toString() is deprecated since version 2.7 and will be removed in 3.0. Use the getPath() method instead.', E_USER_DEPRECATED);

<<<<<<< HEAD
        return $this->file;
    }

    /**
     * Gets the cache file path.
     *
     * @return string The cache file path
     */
    public function getPath()
    {
        return $this->file;
=======
        return $this->getPath();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * Checks if the cache is still fresh.
     *
<<<<<<< HEAD
     * This method always returns true when debug is off and the
=======
     * This implementation always returns true when debug is off and the
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     * cache file exists.
     *
     * @return bool true if the cache is fresh, false otherwise
     */
    public function isFresh()
    {
<<<<<<< HEAD
        if (!is_file($this->file)) {
            return false;
        }

        if (!$this->debug) {
            return true;
        }

        $metadata = $this->getMetaFile();
        if (!is_file($metadata)) {
            return false;
        }

        $time = filemtime($this->file);
        $meta = unserialize(file_get_contents($metadata));
        foreach ($meta as $resource) {
            if (!$resource->isFresh($time)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Writes cache.
     *
     * @param string              $content  The content to write in the cache
     * @param ResourceInterface[] $metadata An array of ResourceInterface instances
     *
     * @throws \RuntimeException When cache file can't be written
     */
    public function write($content, array $metadata = null)
    {
        $mode = 0666;
        $umask = umask();
        $filesystem = new Filesystem();
        $filesystem->dumpFile($this->file, $content, null);
        try {
            $filesystem->chmod($this->file, $mode, $umask);
        } catch (IOException $e) {
            // discard chmod failure (some filesystem may not support it)
        }

        if (null !== $metadata && true === $this->debug) {
            $filesystem->dumpFile($this->getMetaFile(), serialize($metadata), null);
            try {
                $filesystem->chmod($this->getMetaFile(), $mode, $umask);
            } catch (IOException $e) {
                // discard chmod failure (some filesystem may not support it)
            }
        }
    }

    /**
     * Gets the meta file path.
     *
     * @return string The meta file path
     */
    private function getMetaFile()
    {
        return $this->file.'.meta';
=======
        if (!$this->debug && is_file($this->getPath())) {
            return true;
        }

        return parent::isFresh();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
