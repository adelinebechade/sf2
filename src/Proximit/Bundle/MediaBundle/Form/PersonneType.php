<?php

namespace Proximit\Bundle\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array('label' => 'personne.name'))
            ->add('prenom', null, array('label' => 'personne.first.name'))
            ->add('nationalite', 'country', array('preferred_choices' => array('FR'), 'label' => 'personne.nationality'))
            ->add('dateDeNaissance', null, array('label' => 'personne.date.birth'))
            ->add('lieuDeNaissance', null, array('label' => 'personne.place.birth'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Proximit\Bundle\MediaBundle\Entity\Personne'
        ));
    }

    public function getName()
    {
        return 'proximit_bundle_mediabundle_personnetype';
    }
}
