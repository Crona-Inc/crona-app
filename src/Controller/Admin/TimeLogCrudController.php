<?php

namespace App\Controller\Admin;

use App\Entity\TimeLog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TimeLogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TimeLog::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
                 ->onlyOnIndex();
        yield DateTimeField::new('start');
        yield DateTimeField::new('finish');
        yield IntegerField::new('duration');
        yield AssociationField::new('project');
        yield AssociationField::new('task');
    }

}
