<?php

namespace App\Controller;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Gouvernorat;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\JsonResponse;
#[AsController]
class GouvernoratController extends AbstractController
{
    #[Route(
        path: '/gouvernorat',
        name: 'get_gouvernoat',
        methods: ['Get'],
    
    )]


    
    public function getGouvernorat (PersistenceManagerRegistry $doctrine) :Response
    {   
  $ListeGouvernorats = $doctrine
    ->getRepository(Gouvernorat::class)
    ->findAll();
$data=[];
foreach($ListeGouvernorats as $ppp){
  $data[]=[
    'id'=>$ppp->getId(),
    'gouvernorat' =>$ppp->getGouvernorat(),
    
  ];

  } 
   return new JsonResponse($data,200);



}
}
