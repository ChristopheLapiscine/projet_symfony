<?php

namespace AppBundle\Form;

use AppBundle\Entity\Sport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoachType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('price', ChoiceType::class, [
                    'label' => 'Selectionnez un Prix',
                    'choices' =>
                        [10 => 10,15 => 15,20 => 20,25 => 25,30 => 30,40 => 40,50 => 50,60 => 60,70 => 70,80 => 80,100 => 100]
                ])
                ->add('avatarFile', FileType::class, [
                    'required' => false
                ])
                ->add('description')
                ->add('sport', EntityType::class, [
                    'class' => Sport::class,
                    'choice_label' => 'name'
                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Coach'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_coach';
    }

}
