<?php

namespace App\Form;

use App\Entity\Calendertable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalendertableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('title')
            ->add('end',DateTimeType::class,[
                'date_widget'=>'single_text'
            ])
            ->add('start',DateTimeType::class,[
                'date_widget'=>'single_text'
            ])
            ->add('description')
            ->add('bacgroundcouleur',ColorType::class)
            ->add('bordercouleur',ColorType::class)
            ->add('textcouleur',ColorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calendertable::class,
        ]);
    }
}
