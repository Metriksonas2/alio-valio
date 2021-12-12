<?php

namespace App\Form;

use App\Enumerable\PartTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartType extends \Symfony\Component\Form\AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'label' => false,
            'attr' => [
                'class' => 'block appearance-none w-56 border py-2 px-2 rounded',
                'id' => 'grid-state'
            ],
            'choices' => [
                '-------------' => null,
                'Variklis' => PartTypeInterface::TYPE_ENGINE,
                'Važiuoklė' => PartTypeInterface::TYPE_CARRIER,
                'Stabdžiai' => PartTypeInterface::TYPE_BREAKS,
                'Korpusas' => PartTypeInterface::TYPE_BODY,
                'Apšvietimas' => PartTypeInterface::TYPE_LIGHT,
                'Baterija' => PartTypeInterface::TYPE_BATTERY,
                'Kita elektronika' => PartTypeInterface::TYPE_OTHER,
            ],
        ]);
    }

    public function getParent()
    {
        return 'Symfony\Component\Form\Extension\Core\Type\ChoiceType';
    }
}