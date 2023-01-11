<?php

namespace App\Controller;

use App\Entity\ClientUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientUserCreateController extends AbstractController
{
    public function __invoke(SerializerInterface $serializer, Request $request, EntityManagerInterface $managerInterface, ValidatorInterface $validator): JsonResponse
    {
        $adminUser = $this->getUser();
        $entityClientUser = $serializer->deserialize($request->getContent(), ClientUser::class, 'json');

        $entityClientUser->setUser($adminUser);
        $entityClientUser->setUpdatedAt(new \DateTime);
        $entityClientUser->setCreatedAt(new \DateTime);

        $errors = $validator->validate($entityClientUser);
        if ($errors->count() > 0) {
            return new JsonResponse($serializer->serialize($errors, 'json'), JsonResponse::HTTP_BAD_REQUEST, [], true);
        }

        $managerInterface->persist($entityClientUser);
        $managerInterface->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
