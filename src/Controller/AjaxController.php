<?php

namespace App\Controller;

use App\Utils\Data;
use App\Utils\Utils;

use App\Utils\ApiHelper;
use function GuzzleHttp\json_decode;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AjaxController extends AbstractController
{

    protected $EM;
    public function __construct(EntityManagerInterface $EM)
    {
        $this->EM = $EM;
       
    }
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index()
    {
        return $this->render('ajax/index.html.twig', [
            'controller_name' => 'AjaxController',
        ]);
    }

    #[Route('/ajax/post', name: 'ajaxPOST')]
    public function ajaxPOST(Request $request, ApiHelper $api) : Response
    {   
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers ,$encoders);
        $content = $request->getContent();
        // $entityManager =$this->EM;
        $data = $serializer->deserialize($content, Data::class, 'json');
        
        $options = [
            'json' => $data->getData()         
        ];

        $response = $api->apiPost($data->getUrl(),$options);
        // if($data->getUrl() == 'step1')
        // {
        //     $session = new Session();
        //     $session->set('store_session',json_decode($response->getBody()));
        // }
        return new Response($response->getBody(), 200);      
    }


}