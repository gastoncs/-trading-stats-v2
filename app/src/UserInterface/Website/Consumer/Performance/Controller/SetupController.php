<?php

namespace App\UserInterface\Website\Consumer\Performance\Controller;

use App\Core\Component\Performance\Application\Service\SetupServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SetupController extends AbstractController
{
    private $setupService;

    public function __construct(SetupServiceInterface $setupService)
    {
        $this->setupService = $setupService;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('@performance/index.html.twig', [
            'controller_name' => 'SetupController',
        ]);
    }

    #[Route('/trading-details', name: 'trading-details')]
    public function tradingDetails(): Response
    {
        var_dump($this->setupService->getTickerDetails());

        return $this->render('@performance/index.html.twig', [
            'controller_name' => 'SetupController',
        ]);
    }
}
