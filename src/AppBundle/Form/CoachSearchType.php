<?php


namespace AppBundle\Form;


use AppBundle\Entity\Sport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoachSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('price', IntegerType::class, [
            'required' => false,
            'label' => false,
            'attr' => [
                'placeholder' => 'Prix de l\'heure'
            ]
        ])
            ->add('sport', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Sport::class,
                'placeholder' => 'Choisis un sport',
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CoachSearch',
            'method' =>'get',
            'csrf_protection' => false
        ));
    }

    public function getBlockPrefix()
    {
        return'';
    }
}