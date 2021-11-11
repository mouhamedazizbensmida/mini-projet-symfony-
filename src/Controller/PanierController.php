<?php

namespace App\Controller;
use App\Entity\Prodact;
use App\Entity\Panier;
use App\Form\PanierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Panier::class);
        $products= $repo->findAll();
    #$products=["article1","article2","article2"];
    return $this->render('panier/index.html.twig', ['products' => $products]);
    }
    /**
     * @Route("/panier/detail/{id}", name="add_panier")
     */
    public function detail($id): Response
    {

        $repo = $this->getDoctrine()->getRepository(Prodact::class);
        $products= $repo->find($id);


        $manager = $this->getDoctrine()->getManager();
    
        $product = new Panier();
        
        
      
    #    $product->setlib($products->'lib')
     #   ->setprix($products->'img')
      #  ->setdes($products->'des')
       # ->setimg($products->'prix');
        $manager->persist($products);
        $manager->flush();
        return $this->redirectToRoute('panier');

    }
}
