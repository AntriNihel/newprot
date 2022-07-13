<?php

namespace App\Controller;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LocaliteRepository;
use Symfony\Component\HttpKernel\Attribute\AsController;
//use Doctrine\Persistence\ManagerRegistry;
#[AsController]
class LocaliteController extends AbstractController
{
  //  #[Route(
 //       path: '/localites/governorat',
 //       name: 'get_all_governoat',
 //       methods: ['Get'],
    
  //  )]
 
 //public function getAllGovernorat(LocaliteRepository $repo)
 //   {   
  //      $Localite = $repo->findByGovernorat();
    
  //      return $this->json(['Localite' => $Localite]);  
 // }



 // public function getGovernorat(LocaliteRepository $repo )
 // {   
 //     $Gouvernorats=$repo->getAllGouvernorat();
 //   return $this->json(['Gouvernorats' => $Gouvernorats]);
  }






//public function show(ManagerRegistry $doctrine): Response
//{
  //  $governorat = $doctrine->getRepository(Localite::class)->find();


//}
