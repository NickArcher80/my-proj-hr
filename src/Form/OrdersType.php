<?php

namespace App\Form;

use App\Entity\Orders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\Entity\Partners;
use App\Entity\Products;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\OrderProductsType;

class OrdersType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
            ->add('clientEmail', EmailType::class, ['required' => true])
            ->add('partner', EntityType::class, array('class' => Partners::class,
                'choice_label' => 'name',
                'label' => 'Partner',
                'required' => true
            ))
            ->add('products.name', CollectionType::class, [
                'label' => false,
                'entry_type' => OrderProductsType::class,
                'by_reference' => false,
                'disabled' => true
            ])
            ->add('status', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'новый' => '0',
                    'подтвержден' => '10',
                    'завершен' => '20',
        ]])
            ->add('sum')
    ;
  }

  public function configureOptions(OptionsResolver $resolver) {
    $resolver->setDefaults([
        'data_class' => Orders::class,
    ]);
  }

}
