<?php

namespace App\Controller\Admin;

use App\Entity\Video;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class VideoCrudController extends AbstractCrudController
{

    private $params;

    public function __construct(ParameterBagInterface $params) 
    {
    
        $this->params = $params;
    }
    public static function getEntityFqcn(): string
    {
        return Video::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            fileField::new('file')
                ->setFormType(FileType::class)
                ->setBasePath($this->params->get('app.path.videos'))
                ->setUploadDir('public/videos')
                ->setUploadedFileNamePattern('[slug]-[contenthash].[extension]')
                ->setRequired(false),
        ];
    }

}
