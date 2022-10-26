<?php

namespace App\Controller\Admin;

use App\Entity\DisconnectedPresentation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DisconnectedPresentationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DisconnectedPresentation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', "Titre"),
            TextEditorField::new('descriptionFr', "Présentation (fr)"),
            TextEditorField::new('descriptionEn', "Présentation (en)"),
        ];
    }
}
