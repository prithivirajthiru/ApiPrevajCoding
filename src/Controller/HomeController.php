<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpClient\HttpClient;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
class HomeController extends AbstractController
{
    // #[Route('/home', name: 'app_home')]
    // public function index(): Response
    // {
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }
    #[Route('/', name: 'login')]
    public function login(): Response
    {
        return $this->render('home\login.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    // #[Route('/login/data', name: 'logindata')]
    // public function logindata(Request $request, SessionInterface $session): Response
    // {
    //         // Get the raw JSON data from the request body
    //         $jsonData = $request->getContent();

    //         // Decode the JSON data into an associative array
    //         $data = json_decode($jsonData, true);

    //         if ($data === null) {
    //             // Return a response indicating a bad request due to invalid JSON
    //             return new JsonResponse(['error' => 'Invalid JSON data'], 400);
    //         }

    //         $httpClientlogin = HttpClient::create();
    //         $loginurl = 'http://127.0.0.1:8000/api/auth/user';
    //         // $requestData = [
    //         //     'username' => '794',
    //         //     'password' => 123,
    //         // ];
    //         $loginresponse = $httpClientlogin->request('POST', $loginurl, [
    //             'headers' => [
    //                 'Accept' => 'application/json',
    //             ],
    //             'json' => $data,
    //         ]);

    //         $content = $loginresponse->getContent();
    //         // Decode the JSON response content
    //         $responseDatafinale = json_decode($content, true);
    //         $statusCode = $loginresponse->getStatusCode();
    //             if($statusCode == 200)
    //             {
    //                 $idalone = $responseDatafinale['data']['id'];
    //                 $rolename = $responseDatafinale['data']['roles'];
    //                 $uname = $responseDatafinale['data']['email'];
    //                 if($responseDatafinale['data']['roles'] == 'user')
    //                 {
    //                     $session->set('userrole', 'Customer');
    //                 }
    //                 elseif($responseDatafinale['data']['roles'] == 'admin')
    //                 {
    //                     $session->set('userrole', 'Administrator');
    //                 }
    //                 $session->set('usersid', $idalone);
    //                 $session->set('roleid', $rolename);
    //                 $session->set('email', $uname);
    //                 return new JsonResponse([
    //                     'status_code' => $statusCode,
    //                     'msg' => "success",
    //                     'data' => $responseDatafinale,
    //                 ]);
    //             }

    //             else if($statusCode == 400)
    //             {
    //                 return new JsonResponse([
    //                     'status_code' => $statusCode,
    //                     'msg' => "Invalid Password",
    //                     'data' => $responseDatafinale,
    //                 ]);
    //             }



    //         }

    #[Route('/login/data', name: 'login_data', methods: ['POST'])]
    public function login_data(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if (!isset($data['username']) || !isset($data['password'])) {
            return new JsonResponse(['error' => 'Invalid credentials'], 400);
        }
        // Authentication logic here
        return new JsonResponse(['status_code' => 200, 'data' => ['role' => 'admin']]);
    }
    
    #[Route('/table', name: 'dashboardNew')]
    public function dashboardnew(): Response
    {

                return $this->render('home/basetable.html.twig', [
                    'controller_name' => 'HomeController'
                ]);
            }

        
           
        }
       
        
    
    
 
