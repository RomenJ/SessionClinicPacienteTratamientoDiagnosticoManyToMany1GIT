<?php

namespace App\Form;

use App\Entity\Paciente;
use App\Entity\Terapeuta;
use App\Entity\Tratamiento;
use App\Entity\Diagnostico;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class PacienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('telephone')
         //   ->add('tratamientos')
       //     ->add('diagnosticos')




            ->add('tratamientos',EntityType::class, [
                // looks for choices from this entity
                'class' => Tratamiento::class,
                // used to render a select box, check boxes or radios
                 'multiple' => true,
                 'expanded' => true,
            ])


            ->add('diagnosticos',EntityType::class, [
            
                'class' => Diagnostico::class,
                 'multiple' => true,
                 'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paciente::class,
        ]);
    }
}
