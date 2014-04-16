<?php

namespace Ali\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('name')
          ->add('description')
          ->add('price')
          ->add('submit_button', "submit")
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Ali\ProductBundle\Entity\Product',
                'attr' => array(
                    'novalidate' => 'novalidate',
                )
            )
        );
    }

    public function getName()
    {
        return 'product';
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
       $view['name']->vars['attr'] = array('class' => 'test');
       $view['name']->vars['help'] = 'Your name..';
    }

}