<?php

namespace App\Form;

use App\Entity\UndMedida;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UndMedidaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idundMedida', TextType::class, [
                'label' => 'Abreviatura:',
                'attr' => ['autofocus' => true],
            ])
            ->add('nombre', TextType::class, [
                'label' => 'Nombre:',
            ])
            ->add('descripcion', TextareaType::class,[
                'label' => 'Descripción:',
                'required' => false,
            ])
            /*->add('save', SubmitType::class, [
                'label' => 'Guardar',
                'attr' => ['class' => 'btn btn-primary'],
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UndMedida::class,
        ]);
    }
}
