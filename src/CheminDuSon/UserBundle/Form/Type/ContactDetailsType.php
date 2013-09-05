<?php

namespace CheminDuSon\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address1', null,
						array("label" => "form.user.contact-details.adress1.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
            ->add('adress2', null,
						array("label" => "form.user.contact-details.adress2.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
            ->add('phone', null,
						array("label" => "form.user.contact-details.phone.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
            ->add('city', null,
						array("label" => "form.user.contact-details.city.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
            ->add('zipcode', null,
						array("label" => "form.user.contact-details.zipcode.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
            ->add('region', null,
						array("label" => "form.user.contact-details.region.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
            ->add('country', null,
						array("label" => "form.user.contact-details.country.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
            ->add('isPrivate','checkbox',
						array("label" => "form.user.contact-details.isPrivate.label",
								'translation_domain' => 'CheminDuSonUserBundle'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CheminDuSon\UserBundle\Entity\ContactDetails'
        ));
    }

    public function getName()
    {
        return 'cheminduson_userbundle_contactdetailstype';
    }
}
