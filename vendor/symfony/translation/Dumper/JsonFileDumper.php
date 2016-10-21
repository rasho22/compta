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

/**
 * JsonFileDumper generates an json formatted string representation of a message catalogue.
 *
 * @author singles
 */
class JsonFileDumper extends FileDumper
{
    /**
     * {@inheritdoc}
     */
    public function format(MessageCatalogue $messages, $domain = 'messages')
    {
<<<<<<< HEAD
        return json_encode($messages->all($domain), defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : 0);
=======
        @trigger_error('The '.__METHOD__.' method is deprecated since version 2.8 and will be removed in 3.0. Use the formatCatalogue() method instead.', E_USER_DEPRECATED);

        return $this->formatCatalogue($messages, $domain);
    }

    /**
     * {@inheritdoc}
     */
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = array())
    {
        if (isset($options['json_encoding'])) {
            $flags = $options['json_encoding'];
        } else {
            $flags = defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : 0;
        }

        return json_encode($messages->all($domain), $flags);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'json';
    }
}
