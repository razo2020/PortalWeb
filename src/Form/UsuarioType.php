<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\IsTrue;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni', NumberType::class, [
                'label' => 'DNI:',
            ])
            ->add('username', TextType::class, [
                'label' => 'Usuario:',
            ])
            ->add('email', EmailType::class,[
                'label' => 'email:',
                'required' => false,
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Contraseña:'],
                'second_options' => ['label' => 'Repetir contraseña:'],
            ])
            ->add('apodo', TextType::class, [
                'label' => 'Apodo:',
                'required' => false,
            ])
            ->add('nombres', TextType::class,[
                'label' => 'Nombres:'
            ])
            ->add('apellidos', TextType::class, [
                'label' => 'Apellidos:'
            ])
            ->add('telefono', NumberType::class, [
                'label' => 'Telefono:',
                'required' => false,
            ])
            ->add('termsAccepted', CheckboxType::class, array(
                'label' => 'Aceptar terminos',
                'mapped' => false,
                'constraints' => new IsTrue(),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
