<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BelimoFixtures extends Fixture
{
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
            ->setFirstname("Mickael")
            ->setLastname("Freaks")
            ->setName("Leclerc")
            ->setAddress("45 avenue de la joconde")
            ->setPassword('$2y$13$Y6nUOpQpHcUG8m7CFYyXQu456QbN34B.6S0w4XtFkfdxAZXpKc2LW'); //user@email.fr

        $manager->persist($user);

        $manager->flush();
    }
}
