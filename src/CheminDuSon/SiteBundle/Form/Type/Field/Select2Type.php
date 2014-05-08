<?php

namespace CheminDuSon\SiteBundle\Form\Type\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Select2Type extends AbstractType
{

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => ['class' => 'select2'],
        ));
    }
    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'select2';
    }
}