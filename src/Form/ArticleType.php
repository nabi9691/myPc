<?php

namespace App\Form;


use App\Entity\Article;
use App\Entity\Categorie;
use Faker\Provider\cs_CZ\DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    
class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Entrez le titre',
            ])
            ->add('resume', TextareaType::class, [
                'label' => 'Entrez le résumé',
            ])
            ->add('contenu', TextareaType::class, [
                'label' => 'Entrez le contenu',
            ])
            //->add('date', DateTime::class, [
                //'label' => 'Date',
            //])
            ->add('image')
            ->add('categorie', EntityType::class, [
                'label' => 'Catégorie',
                'class' => Categorie::class,
                'choice_label' => 'titre',
                // 'multiple' => true
                // expanded => true
            ])
            ->add('Envoyer', SubmitType::class, [
                'label' => 'valider',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
