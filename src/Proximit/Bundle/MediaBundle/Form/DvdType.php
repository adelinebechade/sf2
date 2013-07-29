<?php

namespace Proximit\Bundle\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DvdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', null, array('label' => 'dvd.title'))
            ->add('annee', null, array('label' => 'dvd.year'))
            ->add('resume', null, array('label' => 'dvd.resume'))
            ->add('realisateur', new PersonneType(), array('label' => 'director'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proximit\Bundle\MediaBundle\Entity\Dvd',
            'cascade_validation' => true,
        ));
    }

    public function getName()
    {
        return 'proximit_bundle_mediabundle_dvdtype';
    }
}
