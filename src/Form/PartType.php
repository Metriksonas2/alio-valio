<?php

namespace App\Form;

use App\Enumerable\PartEnumTypeEnumerable;
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
                'Variklis' => PartEnumTypeEnumerable::TYPE_ENGINE,
                'Važiuoklė' => PartEnumTypeEnumerable::TYPE_CARRIER,
                'Stabdžiai' => PartEnumTypeEnumerable::TYPE_BREAKS,
                'Korpusas' => PartEnumTypeEnumerable::TYPE_BODY,
                'Apšvietimas' => PartEnumTypeEnumerable::TYPE_LIGHT,
                'Baterija' => PartEnumTypeEnumerable::TYPE_BATTERY,
                'Kita elektronika' => PartEnumTypeEnumerable::TYPE_OTHER,
            ],
        ]);
    }

    public function getParent()
    {
        return 'Symfony\Component\Form\Extension\Core\Type\ChoiceType';
    }
}