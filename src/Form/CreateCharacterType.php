<?php

namespace App\Form;

use App\Entity\Personnage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Contracts\Translation\TranslatorInterface;

class CreateCharacterType extends AbstractType
{
    public function __construct(private TranslatorInterface $translator)
    {

    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('race', HiddenType::class, [
                "label" => false,
                "mapped" => false,
                "constraints" => [
                    new NotBlank([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new NotNull([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),

                ]
            ])
            ->add("gender", HiddenType::class, [
                "label" => false,
                "mapped" => false,
                "constraints" => [
                    new NotBlank([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new NotNull([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                ]
            ])
            ->add('physical_atk', HiddenType::class, [
                "label" => false,
                "attr" => [
                    "data-stat" => "physical-atk",
                    "class" => "create-stat-input",
                ],
            ])
            ->add('magical_atk', HiddenType::class, [
                "label" => false,
                "attr" => [
                    "data-stat" => "magical-atk",
                    "class" => "create-stat-input"
                ],
            ])
            ->add('physical_def', HiddenType::class, [
                "label" => false,
                "attr" => [
                    "data-stat" => "physical-def",
                    "class" => "create-stat-input"
                ],
            ])
            ->add('magical_def', HiddenType::class, [
                "label" => false,
                "attr" => [
                    "data-stat" => "magical-def",
                    "class" => "create-stat-input"
                ],
            ])
            ->add('agility', HiddenType::class, [
                "label" => false,
                "attr" => [
                    "data-stat" => "agility",
                    "class" => "create-stat-input"
                ],
            ])
            ->add('vitality', HiddenType::class, [
                "label" => false,
                "attr" => [
                    "data-stat" => "vitality",
                    "class" => "create-stat-input"
                ],
            ])
            ->add('name', TextType::class, [
                "label" => false,
                "trim" => true,
                "constraints" => [
                    new NotBlank([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new NotNull([
                        "message" => $this->translator->trans("Ce champ ne peut pas être vide.")
                    ]),
                    new Length([
                        "min" => 4,
                        "max" => 16,
                        "minMessage" => $this->translator->trans("Le nom doit contenir au moins") . " {{ limit }} " . $this->translator->trans("caractères."),
                        "maxMessage" => $this->translator->trans("Le nom doit contenir moins de") . " {{ limit }} " . $this->translator->trans("caractères."),
                    ])
                ]
            ])




            // ->add('total_LP')
            // ->add('total_PM')
            
            ->add("submit", SubmitType::class, [
                "label" => $this->translator->trans("Valider"),
                'attr' => [
                    'id' => 'task-form',
                    "class" => "hiddenValidate",
                ]
            ])

            //->add('current_PM')
            //->add('current_LP')
            // ->add('level')
            // ->add('current_xp')
            // ->add('total_xp')
            //->add('serveur')
            // ->add('stat_point')
            // ->add('user_personnage')
            // ->add('Wallet')
            // ->add('Talent')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personnage::class,
        ]);
    }
}
