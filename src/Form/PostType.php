<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => 'Titre de l\'article',
                    'class' => 'form-control form-control-lg mb-3'
                ]
            ])
            ->add('content', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mb-3'
                ]
            ])

            // ******************  EN AJOUTANT QUILL

            // ->add('content', TextareaType::class, [
            //     'attr' => [
            //         'class' => 'form-control mb-3 editor'
            //     ]
            // ])
            
            ->add('obsoleted_date', DateType::class, [
                'attr' => [
                    'class' => 'd-none'
                ]
            ])
            ->add('keyword', TextType::class, [
                'attr' => [
                    'placeholder' => 'Mots clés',
                    'class' => 'form-control mb-3'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}