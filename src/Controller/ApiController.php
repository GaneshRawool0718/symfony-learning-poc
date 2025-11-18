<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/api/hello', methods: ['GET'])]
    public function hello(): JsonResponse
    {   
        $this->logger->info("Hello API endpoint called.");
        return new JsonResponse(['message' => 'Hello, API!']);
    }

    #[Route('/api/get-username', methods: ['GET'], name: 'api_get_username')]
    public function getUserName (): JsonResponse
    {
        $userName = 'Ganesh Rawool';
        return new JsonResponse(['username' => $userName]);
    }

    #[Route('/api/get-user/{id}', methods: ['GET'], name: 'api_get_user')]
    public function getUser(int $id): JsonResponse
    {
        $this->logger->info("Get user API endpoint called with ID: $id");
        return new JsonResponse([
            
            'id' => $id,
            'message' => 'User details fetched successfully',
        ]);
    }
}