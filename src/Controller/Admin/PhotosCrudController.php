<?php

namespace App\Controller\Admin;

use App\Entity\Photos;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class PhotosCrudController extends AbstractCrudController
{
    private $params;

    public function __construct(ParameterBagInterface $params) 
    {
    
        $this->params = $params;
    }
    
    public static function getEntityFqcn(): string
    {
        return Photos::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
            ->setFormTypeOption('disabled', true),
            TextField::new('title','Titre'),
            TextEditorField::new('description','Description'),
            ImageField::new('picture','Photo')
            ->setUploadDir('public/images')
            ->setBasePath($this->params->get('app.path.images'))
            ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
            ->setRequired(false),
        ];
    }

}
