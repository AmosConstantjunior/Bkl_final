<?php

namespace App\Form;

use App\Entity\FicheMaintenance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class FicheMaintenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateIntervention', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('CommandeEBP')
            ->add('montantHT')
            ->add('montantConsommable')
            ->add('station')
            ->add('formation')
            ->add('maint')
            ->add('process')
            ->add('valiseCNOMO')
            ->add('cuproBrasage')
            ->add('besoinFormation')
            ->add('sondageMonoFace')
            ->add('QualiteElectrique')
            // ->add('dateProchaine', DateType::class, [
            //     'widget' => 'single_text',
            //     'attr' => ['class' => 'js-datepicker'],
            // ])
            ->add('Technicien')
            ->add('atelier')
            ->add('machine')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FicheMaintenance::class,
        ]);
    }
}
