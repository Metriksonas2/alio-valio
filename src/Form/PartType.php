<?php

namespace App\Form;

use App\Enumerable\PartEnumType;
use App\Enumerable\PartTypeInterface;
use App\Enumerable\EnumTypeInterface;
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
                'Variklis' => PartEnumType::TYPE_ENGINE,
                'Važiuoklė' => PartEnumType::TYPE_CARRIER,
                'Stabdžiai' => PartEnumType::TYPE_BREAKS,
                'Korpusas' => PartEnumType::TYPE_BODY,
                'Apšvietimas' => PartEnumType::TYPE_LIGHT,
                'Baterija' => PartEnumType::TYPE_BATTERY,
                'Kita elektronika' => PartEnumType::TYPE_OTHER,
            ],
        ]);
    }

    public function getParent()
    {
        return 'Symfony\Component\Form\Extension\Core\Type\ChoiceType';
    }
}