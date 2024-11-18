<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\ApiPrevajCodingTaskService;
use Symfony\Component\HttpFoundation\Request;
use App\Utils\ApiResponse;
use Symfony\Component\HttpFoundation\Response;


class ApiPrevajCodingTaskController extends AbstractController
{
    #[Route('/api/prevaj/coding/task', name: 'app_api_prevaj_coding_task')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiPrevajCodingTaskController.php',
        ]);
    }
   





    #[Route('api/add/user', name: 'addUser' , methods:'POST' )]
    public function addUser(Request $request, ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    {
        $response = $ApiPrevajCodingTaskService->_addUser($request);
        return new ApiResponse($response, 200, ["Content-Type" => "application/json"], 'json', "Success");
    
    }
    #[Route('api/update/user/{id}', name: 'updateUser' , methods:'PUT' )]
    public function updateUser(Request $request,$id, ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    {
        $response = $ApiPrevajCodingTaskService->_updateUser($request,$id);
        if ($response == "error") {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $response[1], ['timezone']);
        }
        return new ApiResponse($response[1], 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "__initializer__", "__cloner__", "__isInitialized__"]);
    
    }
    #[Route('api/getsingle/user/{id}', name: 'getOneByUser' , methods:'GET' )]
    public function getOneByUser($id, ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    {
        $response = $ApiPrevajCodingTaskService->_getOneByUser($id);
        if ($response == "error") {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $response[1], ['timezone']);
        }
        return new ApiResponse($response[1], 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "__initializer__", "__cloner__", "__isInitialized__"]);
    
    }
    #[Route('api/getall/user', name: 'getAllUser' , methods:'GET' )]
    public function getAllUser(ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    { 
        $response = $ApiPrevajCodingTaskService->_getAllUser();
        return new ApiResponse($response, 200, ["Content-Type" => "application/json"], 'json', "Success");
    }
    #[Route("api/user/delete/{id}", name: "deleteOfUser", methods: "PUT")]
    public function deleteOfUser($id, ApiFinancialService $ApiFinancialService)
    {
        $response = $ApiFinancialService->_deleteOfUser($id);
        if ($response == "error") {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $response[1], ['timezone']);
        }
        return new ApiResponse($response[1], 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "__initializer__", "__cloner__", "__isInitialized__"]);
    }
    #[Route('api/add/contact', name: 'addContact' , methods:'POST' )]
    public function addContact(Request $request, ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    {
        $response = $ApiPrevajCodingTaskService->_addContact($request);
        return new ApiResponse($response, 200, ["Content-Type" => "application/json"], 'json', "Success");
    
    }
    #[Route('api/update/contact/{id}', name: 'updateContact' , methods:'PUT' )]
    public function updateContact(Request $request,$id, ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    {
        $response = $ApiPrevajCodingTaskService->_updateContact($request,$id);
        if ($response == "error") {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $response[1], ['timezone']);
        }
        return new ApiResponse($response[1], 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "__initializer__", "__cloner__", "__isInitialized__"]);
    
    }
    #[Route('api/getsingle/contact/{id}', name: 'getOneByContact' , methods:'GET' )]
    public function getOneByContact($id, ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    {
        $response = $ApiPrevajCodingTaskService->_getOneByContact($id);
        if ($response == "error") {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $response[1], ['timezone']);
        }
        return new ApiResponse($response[1], 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "__initializer__", "__cloner__", "__isInitialized__"]);
    
    }
    #[Route('api/getall/contact', name: 'getAllContact' , methods:'GET' )]
    public function getAllContact(ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    { 
        $response = $ApiPrevajCodingTaskService->_getAllContact();
        return new ApiResponse($response, 200, ["Content-Type" => "application/json"], 'json', "Success");
    }
    #[Route("api/contact/delete/{id}", name: "deleteOfContact", methods: "PUT")]
    public function deleteOfContact($id, ApiFinancialService $ApiFinancialService)
    {
        $response = $ApiFinancialService->_deleteOfContact($id);
        if ($response == "error") {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $response[1], ['timezone']);
        }
        return new ApiResponse($response[1], 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "__initializer__", "__cloner__", "__isInitialized__"]);
    }
    #[Route('api/auth/user', name: 'userAuthentication' , methods:'POST' )]
    public function userAuthentication(Request $request, ApiPrevajCodingTaskService $ApiPrevajCodingTaskService)
    {
        $response = $ApiPrevajCodingTaskService->_userAuthentication($request);
        if ($response == "error") {
            return new ApiResponse([], 400, ["Content-Type" => "application/json"], 'json', $response[1], ['timezone']);
        }
        return new ApiResponse($response[1], 200, ["Content-Type" => "application/json"], 'json', "Success", ['timezone', "__initializer__", "__cloner__", "__isInitialized__"]);
    
    }
}

