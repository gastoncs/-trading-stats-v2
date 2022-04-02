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

    #[Route('/setup', name: 'app_setup')]
    public function index(): Response
    {
        return $this->render('@performance/setup/index.html.twig', [
            'controller_name' => 'SetupController',
        ]);
    }
}
