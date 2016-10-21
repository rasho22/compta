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
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PasswordType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if ($options['always_empty'] || !$form->isSubmitted()) {
            $view->vars['value'] = '';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'always_empty' => true,
            'trim' => false,
        ));
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
        return 'password';
    }
}
