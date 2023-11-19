<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'Doe'
                ],
                'row_attr'=>[
                    'class'=>'form-content'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[^<>]*$/',
                        'message' => 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
                    ]),
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'required' => true,
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'John'
                ],
                'row_attr'=>[
                    'class'=>'form-content'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[^<>]*$/',
                        'message' => 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
                    ]),
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'required' => true,
                'attr' => [
                    'class' => 'form-input',
                    'placeholder' => 'john@doe.fr'
                ],
                'row_attr'=>[
                    'class'=>'form-content'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[^<>]*$/',
                        'message' => 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
                    ]),
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'required' => true,
                'attr' => [
                    'class' => 'form-textarea',
                    'placeholder' => 'saisissez votre message ...'
                ],
                'row_attr'=>[
                    'class'=>'form-content'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[^<>]*$/',
                        'message' => 'Le champ ne doit pas contenir de balises HTML ou de scripts.',
                    ]),
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
