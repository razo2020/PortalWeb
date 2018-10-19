<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 18/10/2018
 * Time: 05:56 PM
 */

namespace App\CollectionSy\Form;

use App\CollectionSy\Entity\Value;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', TextType::class,
                [
                    'required' => true,
                    'label'    => 'Value',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Value::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'ValueType';
    }

}