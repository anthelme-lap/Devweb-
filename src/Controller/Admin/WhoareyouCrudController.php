<?php

namespace App\Controller\Admin;

use App\Entity\Whoareyou;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WhoareyouCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Whoareyou::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('description'),
        ];
    }
}
