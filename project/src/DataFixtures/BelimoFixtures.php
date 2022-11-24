<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class BelimoFixtures extends Fixture
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <= 25; $i++) {
            $product = new Product();

            $product
                ->setName("Telephone n°$i")
                ->setDescription("Une description n°$i")
                ->setPrice(rand(500, 2000))
                ->setStock(rand(0, 10));
            
            $manager->persist($product);
        }

        $user = new User();
        $user
            ->setEmail("user@email.fr")
            ->setRoles(['ROLE_USER'])
            ->setFirstname("Mickael")
            ->setLastname("Freaks")
            ->setName("Leclerc")
            ->setAddress("45 avenue de la joconde")
            ->setPassword($this->hasher->hashPassword($user, "user@email.fr"));
        $manager->persist($user);

        $user = new User();
        $user
            ->setEmail("admin@email.fr")
            ->setRoles(['ROLE_ADMIN'])
            ->setFirstname("Georges")
            ->setLastname("Franks")
            ->setName("Auchan")
            ->setAddress("45 avenue de la Monay")
            ->setPassword($this->hasher->hashPassword($user, "admin@email.fr"));
        $manager->persist($user);

        $manager->flush();
    }
}
