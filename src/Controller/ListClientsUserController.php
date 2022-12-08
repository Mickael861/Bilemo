<?php

namespace App\Controller;

use App\Entity\ClientUser;
use JMS\Serializer\SerializerInterface;
use App\Repository\ClientUserRepository;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListClientsUserController extends AbstractController
{
    public function __invoke(SerializerInterface $serializer, ClientUserRepository $clientUserRepository): JsonResponse
    {
        /**
         * @var Users $user
         */
        $adminUser = $this->getUser();

        $clients = $clientUserRepository->findBy(["user" => $adminUser]);

        $context = SerializationContext::create()->setGroups(["read:client"]);

        $jsonBook = $serializer->serialize($clients, 'json', $context);

        return new JsonResponse(
            $jsonBook, Response::HTTP_OK, [], true
        );
    }
}
