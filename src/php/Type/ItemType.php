<?php
namespace App\Type;

use App\Entity\Item;
use App\Entity\Group;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $today = (new \DateTime())->format('Y-m-d');

        $builder
            ->add('price', NumberType::class, [
                'empty_data' => 0,
                'scale' => 0
            ])
            ->add('group', EntityType::class, [
                'class' => Group::class
            ])
            ->add('description', TextType::class, [
                'empty_data' => ''
            ])
            ->add('date', DateType::class, [
                'empty_data' => $today,
                'widget' => 'single_text'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Item::class,
        ));
    }
}
