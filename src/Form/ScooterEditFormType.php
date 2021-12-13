<?php

namespace App\Form;

use App\Entity\Scooter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ScooterEditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('model', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite modelį',
                    ])
                ],
            ])
            ->add('power', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search',
                    'placeholder' => 'W'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite galią',
                    ])
                ],
            ])
//            ->add('dateOfManufacture', DateTimeType::class, [
//                'label' => false,
//                'attr' => [
//                    'class' => 'border rounded w-56 py-2 px-2',
//                    'id' => 'search'
//                ],
//                'constraints' => [
//                    new NotBlank([
//                        'message' => 'Įveskite pagaminimo datą',
//                    ])
//                ],
//            ])
            ->add('batteryCapacity', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search',
                    'placeholder' => 'Ah'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite baterijos talpą',
                    ])
                ],
            ])
            ->add('weight', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search',
                    'placeholder' => 'kg'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite svorį',
                    ])
                ],
            ])
            ->add('maxSpeed', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search',
                    'placeholder' => 'km/h'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite didžiausią greitį',
                    ])
                ],
            ])
            ->add('maxDistance', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search',
                    'placeholder' => 'km'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite nuvažiuojamą atstumą',
                    ])
                ],
            ])
            ->add('batteryChargeTime', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search',
                    'placeholder' => 'min.'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite baterijos krovimo laiką',
                    ])
                ],
            ])
            ->add('maxWeight', NumberType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search',
                    'placeholder' => 'kg'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite didžiausią leistiną svorį',
                    ])
                ],
            ])
            ->add('manufacturer', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'border rounded w-56 py-2 px-2',
                    'id' => 'search'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite gamintoją',
                    ])
                ],
            ])
            ->add('hasScreen', ChoiceType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'block appearance-none w-56 border py-2 px-2 rounded',
                    'id' => 'grid-state'
                ],
                'choices' => [
                    'Yra' => true,
                    'Nėra' => false,
                ]
            ])
            ->add('hasLight', ChoiceType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'block appearance-none w-56 border py-2 px-2 rounded',
                    'id' => 'grid-state'
                ],
                'choices' => [
                    'Yra' => true,
                    'Nėra' => false,
                ]
            ])
            ->add('isPart', ChoiceType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'block appearance-none w-56 border py-2 px-2 rounded',
                    'id' => 'grid-state'
                ],
                'choices' => [
                    'Taip' => true,
                    'Ne' => false,
                ],
                'choice_attr' => [
                    'Ne' => ['selected' => true]
                ]
            ])
            ->add('partType', PartType::class)
            ->add('image', FileType::class, [
                'label' => false,
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Scooter::class,
            'choices_as_values' => true,
            'choice_label' => function ($choice) {
                return $choice;
            }
        ]);
    }
}
