<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LegalController extends AbstractController
{
    #[Route('/mentions-legales', name: 'front_mentions_legales')]
    public function mentionsLegales(): Response
    {
        return $this->render('front/legal/mentions_legales.html.twig');
    }
    #[Route('/politique-confidentialite', name: 'front_politique_confidentialite')]
public function politique(): Response
{
    return $this->render('front/legal/politique_confidentialite.html.twig');
}
}