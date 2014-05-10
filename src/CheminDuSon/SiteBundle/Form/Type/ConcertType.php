<?php

namespace CheminDuSon\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConcertType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('date', 'datetime', array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy HH:mm',
                'attr' => array('class' => 'datetimepicker'),
                )
            )
            ->add('groups', 'group_select')
            ->add('address')
            ->add('concertHall', 'text', [
                'required' => false
            ])
            ->add('city')
            ->add('zipcode')
            ->add('country')
            ->add('send', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CheminDuSon\SiteBundle\Form\Model\ConcertModel',
        ));
    }

    public function getName()
    {
        return 'concert';
    }
}