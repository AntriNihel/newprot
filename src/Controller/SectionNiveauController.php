<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[AsController]
class SectionNiveauController extends AbstractController
{
    #[Route(
        path: '/all_section_niveau',
        name: 'get_All_sectionniveau',
        methods: ['Get'],
    
    )]
 
   public function getAllSectionNiveau(SectionNiveau $repo , NormalizerInterface $Normalizer)
    {   
        $value= "7ème année "; 
        $SectionNiveau = $repo->findBySectionNiveau($value);
    
  return $this->json(['SectionNiveau' => $SectionNiveau]);  
    }
}
