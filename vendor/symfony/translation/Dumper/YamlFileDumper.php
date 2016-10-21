<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Dumper;

use Symfony\Component\Translation\MessageCatalogue;
<<<<<<< HEAD
=======
use Symfony\Component\Translation\Util\ArrayConverter;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
use Symfony\Component\Yaml\Yaml;

/**
 * YamlFileDumper generates yaml files from a message catalogue.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class YamlFileDumper extends FileDumper
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function format(MessageCatalogue $messages, $domain)
=======
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = array())
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    {
        if (!class_exists('Symfony\Component\Yaml\Yaml')) {
            throw new \LogicException('Dumping translations in the YAML format requires the Symfony Yaml component.');
        }

<<<<<<< HEAD
        return Yaml::dump($messages->all($domain));
=======
        $data = $messages->all($domain);

        if (isset($options['as_tree']) && $options['as_tree']) {
            $data = ArrayConverter::expandToTree($data);
        }

        if (isset($options['inline']) && ($inline = (int) $options['inline']) > 0) {
            return Yaml::dump($data, $inline);
        }

        return Yaml::dump($data);
    }

    /**
     * {@inheritdoc}
     */
    protected function format(MessageCatalogue $messages, $domain)
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 2.8 and will be removed in 3.0. Use the formatCatalogue() method instead.', E_USER_DEPRECATED);

        return $this->formatCatalogue($messages, $domain);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'yml';
    }
}
