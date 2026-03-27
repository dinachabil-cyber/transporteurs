<?php

namespace App\Controller\Front;

use App\Entity\QuoteRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class QuoteController extends AbstractController
{
    #[Route('/devis/create', name: 'quote_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $firstname = $request->request->get('firstname');
        $lastname = $request->request->get('lastname');
        $company = $request->request->get('company');
        $startActivity = $request->request->get('start_activity');
        $insuredCurrently = $request->request->get('insured_currently');
        $previousResiliation = $request->request->get('previous_resiliation');
        $resiliationMotif = $request->request->get('resiliation_motif');
        $postcode = $request->request->get('postcode');
        $email = $request->request->get('email');
        $phone = $request->request->get('phone');

        $errors = [];

        if (empty($firstname)) {
            $errors[] = 'Le prénom est obligatoire.';
        }
        if (empty($lastname)) {
            $errors[] = 'Le nom est obligatoire.';
        }
        if (empty($startActivity)) {
            $errors[] = 'Le démarrage d\'activité est obligatoire.';
        }
        if (empty($insuredCurrently)) {
            $errors[] = 'La question sur le véhicule assurée actuellement est obligatoire.';
        }
        if (empty($previousResiliation)) {
            $errors[] = 'La question sur l\'ancienne assurance résiliée est obligatoire.';
        }
        if (empty($email)) {
            $errors[] = 'L\'email est obligatoire.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'L\'email n\'est pas valide.';
        }
        if (empty($phone)) {
            $errors[] = 'Le téléphone est obligatoire.';
        }
        if (empty($postcode)) {
            $errors[] = 'Le code postal est obligatoire.';
        } elseif (!preg_match('/^\d{5}$/', $postcode)) {
            $errors[] = 'Le code postal doit contenir 5 chiffres.';
        }

        $showMotif = !empty($previousResiliation) && $previousResiliation !== 'non';
        if ($showMotif && empty($resiliationMotif)) {
            $errors[] = 'Le motif de résiliation est obligatoire.';
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                $this->addFlash('error', $error);
            }

            return $this->redirectToRoute('homepage');
        }

        $quoteRequest = new QuoteRequest();
        $quoteRequest->setFirstname($firstname);
        $quoteRequest->setLastname($lastname);
        $quoteRequest->setCompany($company ?: null);
        $quoteRequest->setStartActivity($startActivity === '1');
        $quoteRequest->setInsuredCurrently($insuredCurrently === '1');
        $quoteRequest->setPreviousResiliation($previousResiliation ?: null);
        $quoteRequest->setResiliationMotif($showMotif ? $resiliationMotif : null);
        $quoteRequest->setPostcode($postcode);
        $quoteRequest->setEmail($email);
        $quoteRequest->setPhone($phone);

        $em->persist($quoteRequest);
        $em->flush();

        $this->addFlash('success', 'Votre demande de devis a été enregistrée. Nous vous contacterons sous 24h.');

        return $this->redirectToRoute('homepage');
    }
}