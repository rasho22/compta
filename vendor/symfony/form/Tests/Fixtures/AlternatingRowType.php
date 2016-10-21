<?php

namespace Symfony\Component\Form\Tests\Fixtures;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormBuilderInterface;

class AlternatingRowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $formFactory = $builder->getFormFactory();

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($formFactory) {
            $form = $event->getForm();
<<<<<<< HEAD
            $type = $form->getName() % 2 === 0 ? 'text' : 'textarea';
            $form->add('title', $type);
        });
    }

    public function getName()
    {
        return 'alternating_row';
    }
=======
            $type = $form->getName() % 2 === 0
                ? 'Symfony\Component\Form\Extension\Core\Type\TextType'
                : 'Symfony\Component\Form\Extension\Core\Type\TextareaType';
            $form->add('title', $type);
        });
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
