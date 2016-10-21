<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Fixtures;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Paráda József <joczy.parada@gmail.com>
 */
class ChoiceSubType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
<<<<<<< HEAD
        $resolver->setDefaults(array('expanded' => true));
=======
        $resolver->setDefaults(array('expanded' => true, 'choices_as_values' => true));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $resolver->setNormalizer('choices', function () {
            return array(
                'attr1' => 'Attribute 1',
                'attr2' => 'Attribute 2',
            );
        });
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName()
    {
        return 'sub_choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'choice';
=======
    public function getParent()
    {
        return 'Symfony\Component\Form\Extension\Core\Type\ChoiceType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
