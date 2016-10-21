<?php

/**
 * This file is part of Twig.
 *
 * (c) 2014 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
use Symfony\Component\Translation\TranslatorInterface;

/**
 * @author Robin van der Vleuten <robinvdvleuten@gmail.com>
 */
class Twig_Extensions_Extension_Date extends Twig_Extension
{
    public static $units = array(
        'y' => 'year',
        'm' => 'month',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );

    /**
     * @var TranslatorInterface
     */
    private $translator;

<<<<<<< HEAD
    /**
     * Constructor.
     *
     * @param TranslatorInterface $translator A TranslatorInterface instance.
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function __construct(TranslatorInterface $translator = null)
    {
        $this->translator = $translator;
    }

    /**
<<<<<<< HEAD
     * Returns a list of filters.
     *
     * @return array
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getFilters()
    {
        return array(
<<<<<<< HEAD
            new Twig_SimpleFilter('time_diff', array($this, 'diff'), array(
                'needs_environment' => true,
            )),
=======
            new Twig_SimpleFilter('time_diff', array($this, 'diff'), array('needs_environment' => true)),
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        );
    }

    /**
<<<<<<< HEAD
     * Name of this extension.
     *
     * @return string
     */
    public function getName()
    {
        return 'date';
    }

    /**
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     * Filter for converting dates to a time ago string like Facebook and Twitter has.
     *
     * @param Twig_Environment $env  A Twig_Environment instance.
     * @param string|DateTime  $date A string or DateTime object to convert.
     * @param string|DateTime  $now  A string or DateTime object to compare with. If none given, the current time will be used.
     *
     * @return string The converted time.
     */
    public function diff(Twig_Environment $env, $date, $now = null)
    {
        // Convert both dates to DateTime instances.
        $date = twig_date_converter($env, $date);
        $now = twig_date_converter($env, $now);

        // Get the difference between the two DateTime objects.
        $diff = $date->diff($now);

        // Check for each interval if it appears in the $diff object.
        foreach (self::$units as $attribute => $unit) {
            $count = $diff->$attribute;

            if (0 !== $count) {
                return $this->getPluralizedInterval($count, $diff->invert, $unit);
            }
        }

        return '';
    }

    protected function getPluralizedInterval($count, $invert, $unit)
    {
        if ($this->translator) {
            $id = sprintf('diff.%s.%s', $invert ? 'in' : 'ago', $unit);

            return $this->translator->transChoice($id, $count, array('%count%' => $count), 'date');
        }

<<<<<<< HEAD
        if ($count > 1) {
=======
        if (1 !== $count) {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            $unit .= 's';
        }

        return $invert ? "in $count $unit" : "$count $unit ago";
    }
<<<<<<< HEAD
=======

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'date';
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
