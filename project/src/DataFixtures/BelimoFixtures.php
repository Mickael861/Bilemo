<?php

namespace App\DataFixtures;

use App\Entity\Product;
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

        $manager->flush();
    }
}
