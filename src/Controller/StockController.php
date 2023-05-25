<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/stock', name: 'app_stock')]
class StockController extends AbstractController
{
    #[Route('/', name: 'app_stock_index')]
    public function index(): Response
    {
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'StockController',
        ]);
    }

    #[Route('/manager', name: 'app_stock_manager')]
    public function stockManager(){
        
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'MANAGER',
        ]);
    }
}
