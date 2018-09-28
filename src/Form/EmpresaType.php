<?php

namespace App\Form;

use App\Entity\Empresa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpresaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ruc', TextType::class,[
                'attr' => ['autofocus' => true],
                'label' => 'RUC:',
            ])
            ->add('razonSocial', TextType::class, [
                'label' => 'Razon Social:',
            ])
            ->add('direccion', TextType::class,[
                'label' => 'Dirección:',
                'help' => 'Ubicación de la empresa (declarado en la SUNAT)',
                'required' => false,
            ])
            ->add('telefono1', NumberType::class,[
                'label' => 'Telefono 1:',
                'help' => 'Ingresar telefono sea fijo o movil.',
                'required' => false,
            ])
            ->add('telefono2', NumberType::class,[
                'label' => 'Telefono 2:',
                'help' => 'Ingresar telefono sea fijo o movil.',
                'required' => false,
            ])
            ->add('rubro', TextType::class, [
                'label' => 'Rubro:',
                'help' => 'Ingresar el rubro o tipo de negocio que se dedican.',
                'required' => false,
            ])
            ->add('tipo', ChoiceType::class, [
                'label' => 'Tipo:',
                'choices' => [
                    'Cliente' => '1',
                    'Proveedor' => '2',
                    'Cliente y proveedor' => '3',
                    ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
        ]);
    }
}
