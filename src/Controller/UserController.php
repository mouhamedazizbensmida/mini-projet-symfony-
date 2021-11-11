<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {$repo = $this->getDoctrine()->getRepository(User::class);
        $products= $repo->findAll();
    #$products=["article1","article2","article2"];
    return $this->render('user/index.html.twig', ['products' => $products]);
    }
    /**
     * @Route("/user/detail/{id}", name="detail1")
     */
    public function detail1($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $products= $repo->find($id);
        return $this->render('user/detail.html.twig', ['products' => $products]);
    }
    /**
     * @Route("/user/delete/{id}", name="delete1")
     */
    public function delete($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(User::class);
        $products= $repo->find($id);
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($products);
        $manager->flush();
        #return $this->render('prodact/index.html.twig', ['products' => $products]);
        
        return $this->redirectToRoute('user');
    }
     /**
 * @Route("/user/update/{id}", name="update")
 */
public function modifyProduct(Request $request, int $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();

    $product = $entityManager->getRepository(User::class)->find($id);
    $form = $this->createForm(RegistrationFormType::class, $product);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $entityManager->flush();
        return $this->redirectToRoute('user');
    }

    return $this->render('user\new.html.twig', [
        "form_title" => "Modifier un produit",
        'registrationForm' => $form->createView(),
    ]);
}
}
