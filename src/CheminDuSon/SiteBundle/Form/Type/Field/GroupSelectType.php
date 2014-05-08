<?php

namespace CheminDuSon\SiteBundle\Form\Type\Field;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupSelectType extends AbstractType
{
    public function getParent()
    {
        return 'text';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => ['multiple' => 'true'],
        ));
    }

    public function getName()
    {
        return 'group_select';
    }
}
