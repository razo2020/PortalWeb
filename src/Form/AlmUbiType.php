<?php

namespace App\Form;

use App\Entity\Almacen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlmUbiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ubicaciones', CollectionType::class, [
                'label'        => 'Ubicación',
                'entry_type'   => UbicacionType::class,
                'allow_add'    => true,
                'allow_delete' => true,
                'prototype'    => true,
                'required'     => false,
                'by_reference' => true,
                'delete_empty' => true,
                'attr'         => [
                    'class' => 'collection',
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Guardar Ubicaciones',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Almacen::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'AlmUbiType';
    }
}
