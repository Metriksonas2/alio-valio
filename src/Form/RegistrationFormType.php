<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite vardą',
                    ])
                ],
            ])
            ->add('lastName', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite pavardę',
                    ])
                ],
            ])
            ->add('username', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite vartotojo vardą',
                    ])
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite el. paštą',
                    ])
                ],
            ])
            ->add('birthDate', DateType::class, [
                'label' => false,
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                'format' => 'yyyy-MM-dd',
                'attr' => ['class' => 'js-datepicker']
            ])
//            ->add('agreeTerms', CheckboxType::class, [
//                'mapped' => false,
//                'constraints' => [
//                    new IsTrue([
//                        'message' => 'You should agree to our terms.',
//                    ]),
//                ],
//            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'class' => 'shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3',
                    'autocomplete' => 'new-password'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Įveskite slaptažodį',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Slaptažodis turi būti bent 6 simbolių ilgio',
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
