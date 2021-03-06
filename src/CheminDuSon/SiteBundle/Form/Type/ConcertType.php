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
            ->add('date', 'datetime', [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'dd/MM/yyyy HH:mm',
                'attr' => [ 'class' => 'datetimepicker' ],
            ])
            ->add('groups', 'group_select')

            ->add('concertHall', 'text', [
                'required' => false
            ])

            ->add('location', 'places_autocomplete', [
                // Autocomplete language
                'language' => 'fr',
            ])
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