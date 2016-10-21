<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form;

<<<<<<< HEAD
=======
use Symfony\Component\Form\Util\StringUtil;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
abstract class AbstractType implements FormTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function finishView(FormView $view, FormInterface $form, array $options)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        if (!$resolver instanceof OptionsResolver) {
            throw new \InvalidArgumentException(sprintf('Custom resolver "%s" must extend "Symfony\Component\OptionsResolver\OptionsResolver".', get_class($resolver)));
        }

        $this->configureOptions($resolver);
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options
     */
    public function configureOptions(OptionsResolver $resolver)
    {
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getParent()
    {
        return 'form';
=======
    public function getName()
    {
        // As of Symfony 2.8, the name defaults to the fully-qualified class name
        return get_class($this);
    }

    /**
     * Returns the prefix of the template block name for this type.
     *
     * The block prefixes default to the underscored short class name with
     * the "Type" suffix removed (e.g. "UserProfileType" => "user_profile").
     *
     * @return string The prefix of the template block name
     */
    public function getBlockPrefix()
    {
        $fqcn = get_class($this);
        $name = $this->getName();

        // For BC: Use the name as block prefix if one is set
        return $name !== $fqcn ? $name : StringUtil::fqcnToBlockPrefix($fqcn);
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'Symfony\Component\Form\Extension\Core\Type\FormType';
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
