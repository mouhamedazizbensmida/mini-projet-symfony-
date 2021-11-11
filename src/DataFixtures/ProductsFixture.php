<?php

namespace App\DataFixtures;
use App\Entity\Prodact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductsFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i <=10 ; $i++) {
            $product = new Prodact();
            $product->setlib("lib $i")
            ->setprix($i*10+5)
            ->setdes("description de l'article n° $i")
            ->setimg("http://placehold.it/350*150");
            $manager->persist($product);
            }
            
            $manager->flush();
    }
}
