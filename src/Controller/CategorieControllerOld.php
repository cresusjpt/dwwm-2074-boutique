<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    //CRUD
    #[Route('/create', name: 'app_categorie_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categorie = new Categorie(); //creer une instance de catégorie( un objet categorie)
        $form = $this->createForm(CategorieFormType::class,$categorie);// créer un formulaire basé sur le validateur de formulaire de type categorie
        $form->handleRequest($request); //écouter l'évenement submit de l'objet request envoyé par l'utilisateur

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($categorie);
            $entityManager->flush();
        }

        return $this->renderForm('categorie/create.html.twig', [
            'categorieForm' => $form,
        ]);
    }

    /*
    #[Route('/read', name: 'app_categorie_read')]
    public function read(){

    }

    #[Route('/update', name: 'app_categorie_update')]
    public function update(){

    }

    #[Route('/delete', name: 'app_categorie_delete')]
    public function delete(){

    }
    */
}
