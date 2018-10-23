<?php

namespace App\Form;

use App\Entity\Almacen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlmacenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idalmacen', NumberType::class, [
                'label' => 'Identificador de almacén:'
            ])
            ->add('nombre', TextType::class, [
                'label' => 'Nombre de almacén:',
            ])
            ->add('direccion', TextType::class,[
                'label' => 'Dirección o lugar de almacén:'
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
        return 'AlmacenType';
    }
}
