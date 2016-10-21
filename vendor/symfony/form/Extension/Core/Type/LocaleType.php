<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Extension\Core\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Intl\Intl;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocaleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array_flip(Intl::getLocaleBundle()->getLocaleNames()),
            'choices_as_values' => true,
            'choice_translation_domain' => false,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
<<<<<<< HEAD
        return 'choice';
=======
        return __NAMESPACE__.'\ChoiceType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
<<<<<<< HEAD
=======
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        return 'locale';
    }
}
