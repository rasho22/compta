<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

<<<<<<< HEAD
use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Config\Resource\FileResource;
=======
use Symfony\Component\Translation\Exception\NotFoundResourceException;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

/**
 * CsvFileLoader loads translations from CSV files.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
<<<<<<< HEAD
class CsvFileLoader extends ArrayLoader
=======
class CsvFileLoader extends FileLoader
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
{
    private $delimiter = ';';
    private $enclosure = '"';
    private $escape = '\\';

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function load($resource, $locale, $domain = 'messages')
    {
        if (!stream_is_local($resource)) {
            throw new InvalidResourceException(sprintf('This is not a local file "%s".', $resource));
        }

        if (!file_exists($resource)) {
            throw new NotFoundResourceException(sprintf('File "%s" not found.', $resource));
        }

=======
    protected function loadResource($resource)
    {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $messages = array();

        try {
            $file = new \SplFileObject($resource, 'rb');
        } catch (\RuntimeException $e) {
            throw new NotFoundResourceException(sprintf('Error opening file "%s".', $resource), 0, $e);
        }

        $file->setFlags(\SplFileObject::READ_CSV | \SplFileObject::SKIP_EMPTY);
        $file->setCsvControl($this->delimiter, $this->enclosure, $this->escape);

        foreach ($file as $data) {
            if ('#' !== substr($data[0], 0, 1) && isset($data[1]) && 2 === count($data)) {
                $messages[$data[0]] = $data[1];
            }
        }

<<<<<<< HEAD
        $catalogue = parent::load($messages, $locale, $domain);

        if (class_exists('Symfony\Component\Config\Resource\FileResource')) {
            $catalogue->addResource(new FileResource($resource));
        }

        return $catalogue;
=======
        return $messages;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * Sets the delimiter, enclosure, and escape character for CSV.
     *
     * @param string $delimiter delimiter character
     * @param string $enclosure enclosure character
     * @param string $escape    escape character
     */
    public function setCsvControl($delimiter = ';', $enclosure = '"', $escape = '\\')
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
        $this->escape = $escape;
    }
}
