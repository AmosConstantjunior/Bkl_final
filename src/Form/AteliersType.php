<?php

namespace App\Form;

use App\Entity\Ateliers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AteliersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomAtelier')
            ->add('AdresseLieu')
            ->add('NumAtelier')
            ->add('Certification')
            ->add('contrat')
            ->add('client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ateliers::class,
        ]);
    }
}
