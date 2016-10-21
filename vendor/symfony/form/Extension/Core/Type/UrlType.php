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
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\EventListener\FixUrlProtocolListener;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UrlType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (null !== $options['default_protocol']) {
            $builder->addEventSubscriber(new FixUrlProtocolListener($options['default_protocol']));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('default_protocol', 'http');

        $resolver->setAllowedTypes('default_protocol', array('null', 'string'));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
<<<<<<< HEAD
        return 'text';
=======
        return __NAMESPACE__.'\TextType';
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
        return 'url';
    }
}
