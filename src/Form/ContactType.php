<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => ' ',
                'attr' => array(
                    'placeholder' => 'Prénom'
                )
                ])
            ->add('lastname', TextType::class, [
                'label' => ' ',
                'attr' => array(
                    'placeholder' => 'Nom'
                )
            ])
            ->add('mail', EmailType::class, [
                'label' => ' ',
                'attr' => array(
                    'placeholder' => 'Email'
                )
            ])
            ->add('phone', TextType::class, [
                'label' => ' ',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Numéro de téléphone'
                ),
            ])
            ->add('message', TextareaType::class, [
                'label' => ' ',
                'attr' => [
                    'placeholder' => 'Entrer votre message ici',
                    'rows' => 5,
                ],
                'constraints' => [
                new NotBlank([
                    'message' => 'Entrez un message',
                ]),
                ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => ['class' => 'save btn-dark'],
            ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
