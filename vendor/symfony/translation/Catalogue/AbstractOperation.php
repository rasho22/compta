<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Catalogue;

use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageCatalogueInterface;

/**
 * Base catalogues binary operation class.
 *
<<<<<<< HEAD
=======
 * A catalogue binary operation performs operation on
 * source (the left argument) and target (the right argument) catalogues.
 *
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
abstract class AbstractOperation implements OperationInterface
{
    /**
<<<<<<< HEAD
     * @var MessageCatalogueInterface
=======
     * @var MessageCatalogueInterface The source catalogue
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    protected $source;

    /**
<<<<<<< HEAD
     * @var MessageCatalogueInterface
=======
     * @var MessageCatalogueInterface The target catalogue
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    protected $target;

    /**
<<<<<<< HEAD
     * @var MessageCatalogue
=======
     * @var MessageCatalogue The result catalogue
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    protected $result;

    /**
<<<<<<< HEAD
     * @var null|array
=======
     * @var null|array The domains affected by this operation
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    private $domains;

    /**
<<<<<<< HEAD
     * @var array
=======
     * This array stores 'all', 'new' and 'obsolete' messages for all valid domains.
     *
     * The data structure of this array is as follows:
     * ```php
     * array(
     *     'domain 1' => array(
     *         'all' => array(...),
     *         'new' => array(...),
     *         'obsolete' => array(...)
     *     ),
     *     'domain 2' => array(
     *         'all' => array(...),
     *         'new' => array(...),
     *         'obsolete' => array(...)
     *     ),
     *     ...
     * )
     * ```
     *
     * @var array The array that stores 'all', 'new' and 'obsolete' messages
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    protected $messages;

    /**
<<<<<<< HEAD
     * @param MessageCatalogueInterface $source
     * @param MessageCatalogueInterface $target
=======
     * @param MessageCatalogueInterface $source The source catalogue
     * @param MessageCatalogueInterface $target The target catalogue
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     *
     * @throws \LogicException
     */
    public function __construct(MessageCatalogueInterface $source, MessageCatalogueInterface $target)
    {
        if ($source->getLocale() !== $target->getLocale()) {
            throw new \LogicException('Operated catalogues must belong to the same locale.');
        }

        $this->source = $source;
        $this->target = $target;
        $this->result = new MessageCatalogue($source->getLocale());
        $this->domains = null;
        $this->messages = array();
    }

    /**
     * {@inheritdoc}
     */
    public function getDomains()
    {
        if (null === $this->domains) {
            $this->domains = array_values(array_unique(array_merge($this->source->getDomains(), $this->target->getDomains())));
        }

        return $this->domains;
    }

    /**
     * {@inheritdoc}
     */
    public function getMessages($domain)
    {
        if (!in_array($domain, $this->getDomains())) {
            throw new \InvalidArgumentException(sprintf('Invalid domain: %s.', $domain));
        }

        if (!isset($this->messages[$domain]['all'])) {
            $this->processDomain($domain);
        }

        return $this->messages[$domain]['all'];
    }

    /**
     * {@inheritdoc}
     */
    public function getNewMessages($domain)
    {
        if (!in_array($domain, $this->getDomains())) {
            throw new \InvalidArgumentException(sprintf('Invalid domain: %s.', $domain));
        }

        if (!isset($this->messages[$domain]['new'])) {
            $this->processDomain($domain);
        }

        return $this->messages[$domain]['new'];
    }

    /**
     * {@inheritdoc}
     */
    public function getObsoleteMessages($domain)
    {
        if (!in_array($domain, $this->getDomains())) {
            throw new \InvalidArgumentException(sprintf('Invalid domain: %s.', $domain));
        }

        if (!isset($this->messages[$domain]['obsolete'])) {
            $this->processDomain($domain);
        }

        return $this->messages[$domain]['obsolete'];
    }

    /**
     * {@inheritdoc}
     */
    public function getResult()
    {
        foreach ($this->getDomains() as $domain) {
            if (!isset($this->messages[$domain])) {
                $this->processDomain($domain);
            }
        }

        return $this->result;
    }

    /**
<<<<<<< HEAD
     * @param string $domain
=======
     * Performs operation on source and target catalogues for the given domain and
     * stores the results.
     *
     * @param string $domain The domain which the operation will be performed for
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    abstract protected function processDomain($domain);
}
