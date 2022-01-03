<?php

namespace App\Form;

use App\Entity\Article;
use Faker\Provider\cs_CZ\DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
//use Symfony\Component\OptionsResolver\OptionsResolver;
//use Symfony\Component\Validator\Constraints\DateTime;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, 
            ['label'=> 'Titre :'])
            ->add('resume', 
                TextType::class, 
                ['label'=> 'Résumé : '])
                ->add('status', TextType::class, ['label' => 'Status'])
                ->add('contenu', TextType::class, ['label' => 'Contenu'])
                
                ->add('date', DateType::class, ['label'=> 'Date :'])
                ->add('image', 
                TextType::class, 
['label'=> 'Image : '])
            
                ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
