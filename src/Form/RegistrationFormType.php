<?php

namespace App\Form;

use App\Entity\User;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationFormType extends AbstractType
{
    public function __construct(private TranslatorInterface $translator)
    {

    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "label" => $this->translator->trans("Mail"),
                "required" => true,
                "trim" => true,
                "attr" => [
                    "placeholder" => "email@email.com",
                    "class" => "registerFormInput modalFormInput form-block"
                ],
                "constraints" => [
                    new Email([
                        "message" => "{{ value }} " . $this->translator->trans("n'est pas une adresse mail valide.")
                    ]),
                    new NotBlank([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new NotNull([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new Length([
                        "min" => 5,
                        "max" => 255,
                        "minMessage" => $this->translator->trans("Une adresse mail doit contenir au moins") . " {{ limit }} " . $this->translator->trans("caractères."),
                        "maxMessage" => $this->translator->trans("Ce adresse mail semble être trop longue.")
                    ])
                ]
            ])
            ->add("username", TextType::class, [
                "label" => $this->translator->trans("Nom d'utilisateur"),
                "required" => true,
                "trim" => true,
                "attr" => [
                    "placeholder" => $this->translator->trans("Nom d'utilisateur"),
                    "class" => "registerFormInput modalFormInput form-block"
                ],
                "constraints" => [
                    new NotBlank([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new NotNull([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new Length([
                        "min" => 6,
                        "max" => 35,
                        "minMessage" => $this->translator->trans("Le nom d'utilisateur doit contenir au moins") . " {{ limit }} " . $this->translator->trans("caractères."),
                        "maxMessage" => $this->translator->trans("Le nom d'utilisateur doit contenir moins de") . " {{ limit }} " . $this->translator->trans("caractères."),
                    ])
                ]
            ])
            ->add('password', RepeatedType::class, [
                "type"=> PasswordType::class,
                "invalid_message" => $this->translator->trans("Les mots de passe doivent être identiques"),
                "required" => true,
                "trim" => true,
                "first_options" => [
                    "label" => $this->translator->trans("Mot de passe"),
                    "attr" => [
                        "class" => "registerFormInput modalFormInput form-block"
                    ],
                ],
                "second_options" => [
                    "label" => $this->translator->trans("Confirmez le mot de passe"),
                    "attr" => [
                        "class" => "registerFormInput modalFormInput form-block"
                    ],
                ],
                "constraints" => [
                    new NotBlank([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new NotNull([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new Length([
                        "min" => 5,
                        "max" => 70,
                        "minMessage" => $this->translator->trans("Le mot de passe doit contenir au moins") . " {{ limit }} " . $this->translator->trans("caractères."),
                        "maxMessage" => $this->translator->trans("Le mot de passe doit contenir moins de") . " {{ limit }} " . $this->translator->trans("caractères."),
                    ])
                ]
            ])
            ->add("is_banned", HiddenType::class, [
                "data" => 0,
                "constraints" => [
                    new EqualTo([
                        "value" => 0
                    ])
                ]
            ])
            ->add("submit", SubmitType::class, [
                "label" => $this->translator->trans("Inscription"),
                "attr" => [
                    "class" => "logBtn logBtn-mt"
                ],
            ])


            // ->add('agreeTerms', CheckboxType::class, [
            //     'mapped' => false,
            //     'constraints' => [
            //         new IsTrue([
            //             'message' => 'You should agree to our terms.',
            //         ]),
            //     ],
            // ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
