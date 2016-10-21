<?php

namespace Symfony\Component\Form\Tests\Fixtures;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
        ;
    }

<<<<<<< HEAD
    public function getName()
    {
        return 'author';
    }

=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Symfony\Component\Form\Tests\Fixtures\Author',
        ));
    }
}
