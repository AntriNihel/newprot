<?php

namespace App\Controller;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Repository\MatieresRepository;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Entity\Niveau;
#[AsController]
class MatieresController extends AbstractController
{
#[Route(
        path: '/matieres/{nomMatiere}',
        name: 'nom_get_Matiere',
        methods: ['Get'],
        /*defaults: [
            '_api_item_operation_name' => 'get_nomMatiere',
            '_api_resource_class'=> Matieres::class,
            
        ],*/
    )]
    //#[Route('/matieres')]
   public function __invoke(MatieresRepository $repo , $nomMatiere, NormalizerInterface $Normalizer)
    {   //$nomMatiere = "Physique";
        $Matieres = $repo->findByNomMatiere($nomMatiere);

      //  dd($Matieres);
      /* $jsonContent=$Normalizer->normalize($Matieres,'json',['groups'=>'post:read']);
      return new Response(json_encode( $jsonContent));*/
      return $this->json(['Matieres' => $Matieres]);
    //  return $jsonContent;
        //dd("5");

        /*return $this->json(['Matieres' => $Matieres[0],
        'Test' -> $Matieres[0]->getNomMatiere()
    ]);*/
    }

}
