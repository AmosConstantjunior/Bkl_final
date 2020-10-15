<?php

namespace App\Form;

use App\Entity\AttestationCqs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttestationCqsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NoteEquip')
            ->add('ConclEquip')
            ->add('ActionEquip')
            ->add('NoteMaint')
            ->add('ConclMaint')
            ->add('ActionMaint')
            ->add('NoteForm')
            ->add('ConclForm')
            ->add('ActionForm')
            ->add('NoteProcess')
            ->add('ConclProcess')
            ->add('ActionProcess')
            ->add('ConclMoyen')
            ->add('ActionMoyen')
            ->add('Date')
            ->add('atelier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AttestationCqs::class,
        ]);
    }
}
