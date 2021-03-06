<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civiliteClient', ChoiceType::class, [
                    'choices' => [
                        'Mlle'    => 'Mlle',
                        'Mme'    => 'Mme',
                        'M'    => 'M',
                    ]
                ]
            )
            ->add('nomClient',TextType::class )
            ->add('prenomClient')
            ->add('adresseClient')
            ->add('cpClient')
            ->add('villeClient')
            ->add('paysClient', CountryType::class,[
                'preferred_choices' => ['FR', 'France']])
            ->add('telClient', TelType::class)
            ->add('mailClient', EmailType::class)
            ->add('save', SubmitType::class, [
                    'label' => 'Ajouter/Modifier un Client'
                ]
            ); //fin du builder
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_client';
    }


}
