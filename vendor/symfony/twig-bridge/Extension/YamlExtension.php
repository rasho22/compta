<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\Twig\Extension;

use Symfony\Component\Yaml\Dumper as YamlDumper;
<<<<<<< HEAD
=======
use Symfony\Component\Yaml\Yaml;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

/**
 * Provides integration of the Yaml component with Twig.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class YamlExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('yaml_encode', array($this, 'encode')),
            new \Twig_SimpleFilter('yaml_dump', array($this, 'dump')),
        );
    }

    public function encode($input, $inline = 0, $dumpObjects = false)
    {
        static $dumper;

        if (null === $dumper) {
            $dumper = new YamlDumper();
        }

<<<<<<< HEAD
=======
        if (defined('Symfony\Component\Yaml\Yaml::DUMP_OBJECT')) {
            return $dumper->dump($input, $inline, 0, is_bool($dumpObjects) ? Yaml::DUMP_OBJECT : 0);
        }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        return $dumper->dump($input, $inline, 0, false, $dumpObjects);
    }

    public function dump($value, $inline = 0, $dumpObjects = false)
    {
        if (is_resource($value)) {
            return '%Resource%';
        }

        if (is_array($value) || is_object($value)) {
            return '%'.gettype($value).'% '.$this->encode($value, $inline, $dumpObjects);
        }

        return $this->encode($value, $inline, $dumpObjects);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'yaml';
    }
}
