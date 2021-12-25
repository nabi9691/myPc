<?php

namespace App\Form;

use App\Entity\Utilisateur;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
//use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Validator\Constraints\DateTime;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, 
            ['label'=> 'Noms :'])
            ->add('prenom', TextType::class, 
                ['label'=> 'Prenom : '])
                ->add('civilite',             TextType::class, ['label' => 'Civilite'])
            ->add('datedenaissance')
            ->add('adresse', TextType::class, ['label'=> 'Adresse : '])
            ->add('email', EmailType::class, ['label'=> 'Email :'])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
