<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 30/11/2018
 * Time: 15:48
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Categorie;
use AppBundle\Entity\Client;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Salle;
use AppBundle\Entity\Spectacle;
use AppBundle\Entity\Spectateur;
use AppBundle\Entity\Tarif;
use AppBundle\Form\CategorieType;
use AppBundle\Form\ClientLoginType;
use AppBundle\Form\ClientType;
use AppBundle\Form\ReservationClientType;
use AppBundle\Form\ReservationType;
use AppBundle\Form\SalleType;
use AppBundle\Form\SpectacleType;
use AppBundle\Form\SpectateurType;
use AppBundle\Form\TarifType;
use AppBundle\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;


class FormController extends Controller
{

    /**
     * @Route("/admin/form_tarif", name="admin_form_tarif")
     */
    public function AdminTarifFormAction(Request $request)
    {
        // création Form "Tarif"
        $form= $this->createForm(TarifType::class, new Tarif);

        //saisie des données envoyées (éventuellement) le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité
                $tarif = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($tarif);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_tarifs');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_tarif.html.twig",
            [
                'formtarif' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_categorie", name="admin_form_categorie")
     */
    public function AdminCategieFormAction(Request $request)
    {
       // création Form  "Categorie"
        $form= $this->createForm(CategorieType::class, new Categorie);

        //saisie des données envoyées (éventuellement) le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité
                $categorie = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($categorie);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_categories');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_categorie.html.twig",
                [
                    'formcategorie' => $form->createView(),
                ]
            );
    }

    /**
     * @Route("/admin/form_spectateur", name="admin_form_spectateur")
     */
    public function AdminSpectateurFormAction(Request $request)
    {
        // création Form "Spectateur"
        $form= $this->createForm(SpectateurType::class, new Spectateur);

        //saisie des données envoyées (éventuellement le spectateur via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité
                $spectateur = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($spectateur);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_spectateurs');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_spectateur.html.twig",
            [
                'formspectateur' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_spectacle", name="admin_form_spectacle")
     */
    public function AdminSpectacleFormAction(Request $request)
    {
        // création Form "Spectacle"
        $form= $this->createForm(SpectacleType::class, new Spectacle);


        //saisie des données envoyées (éventuellement le spectacle via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité
                $spectacle = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($spectacle);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_spectacles');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_spectacle.html.twig",
            [
                'formspectacle' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_salle", name="admin_form_salle")
     */
    public function AdminSalleFormAction(Request $request)
    {
        // création Form "Salle"
        $form= $this->createForm(SalleType::class, new Salle);

        //saisie des données envoyées (éventuellement la salle via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité
                $salle = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($salle);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_salles');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_salle.html.twig",
            [
                'formsalle' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/admin/form_reservation", name="admin_form_reservation")
     */
    public function AdminReservationFormAction(Request $request)
    {
        // création Form "Reservation"
        $form= $this->createForm(ReservationType::class, new Reservation);

        //saisie des données envoyées (éventuellement) le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité
                $reservation = $form->getData();
                //dump($reservation);die;
                //calcul de contrôle du montant des réservations
                $spectateurs = $reservation->getSpectateurs();
                $PrixPlaces = 0;
                foreach ($spectateurs as $spectateur){
                    $PrixPlace = $spectateur
                        ->getCategorie()
                        ->getTarif()
                        ->getPrixPlace();
                    $PrixPlaces += $PrixPlace;
                }
                $reservation->setMontantReservation($PrixPlaces);

                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($reservation);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_reservations');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_reservation.html.twig",
            [
                'formreservation' => $form->createView(),
            ]
        );
    }


    /**
     *
     * @Route("/form_reservation", name="form_reservation")
     */
    public function ReservationFormAction(Request $request)
    {
        //Ancienne Route("/form_reservation/{id}", name="form_reservation", defaults={"id"=0}) ; mais pas sécurisé car on peut facilement changer le client

        /* Méthode qui génère le Form de Réservation en fixant le paramètre client afin de sécuriser la requête.
        le champ client du formulaire devient ainsi prérempli et inaccessible au client qui a déjà fourni son identifiant en s'identifiant.
        Pour ce faire on ajoute un attribut au ReservationClientType */

        //Session Management - Symfony HttpFoundation component
        //Récupération de client_id de la session
        $client_id = $this->get('session')->get('client_id');

        // création Form de l'Entité "Reservation" avec id_client comme argument.
        $form = $this->createForm(ReservationClientType::class, new Reservation, ['id_client'=>$client_id]);

        //saisie et traitement des données envoyées/requete (éventuellement par le client via le Formulaire)
        // à notre variable $form. Elle contiendra l'équivalent du $_POST.
        $form->handleRequest($request);

        //contrôle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){
            //controle contenu, sécurité selon nécessités. Définies dans Entity
            if ($form->isValid()){
                // récupère données dans Objet/Entité
                $reservation = $form->getData();

                $spectateurs = $reservation->getSpectateurs();
                $PrixPlaces = 0;

                foreach ($spectateurs as $spectateur){
                    $PrixPlace = $spectateur
                        ->getCategorie()
                        ->getTarif()
                        ->getPrixPlace();
                    $PrixPlaces += $PrixPlace;
                }
                $reservation->setMontantReservation($PrixPlaces);

                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($reservation);
                // premier enregistre en BD créant l'Id nécessaire aux spectateurs
                $entityManager->flush();

                // attribution de la réservation à chaque Entité Spectateur
                foreach ($spectateurs as $spectateur){
                    $spectateur->setReservation($reservation);
                }

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($reservation);
                // enregistre en BD avec prise en compte de l'id Reservation dans la table spectateur
                $entityManager->flush();

                $this->get('session')->set('reservation_id', $reservation->getId());

                return $this->redirectToRoute('reservation');
            }
        }

        // sinon renvoie le formulaire pour le remplir
        return $this->render(
            "@App/Pages/form_reservation.html.twig",
            [
                'formreservation' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/admin/form_client", name="admin_form_client")
     */
    public function AdminClientFormAction(Request $request)
    {
        // création Form "Client"
        $form= $this->createForm(ClientType::class, new Client);

        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);
        //var_dump($form);die;

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){

            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){

                // récupère données dans Objet/Entité
                $client = $form->getData();
                // récupère l'entity manager de Doctrine, qui gère les Entités <=> DB
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($client);
                // enregistre en BD
                $entityManager->flush();

                return $this->redirectToRoute('admin_clients');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_admin_client.html.twig",
            [
                'formclient' => $form->createView()
            ]
        );
    }

    /**
     * @Route("/form_client", name="form_client")
     */
    public function ClientFormAction(Request $request)
    {
        // création Form "Client"
        $form= $this->createForm(ClientType::class, new Client);

        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){

            //controle contenu, sécurité selon nécessités. Définie dans Entity
            if ($form->isValid()){

                // récupère données dans Objet/Entité
                $client = $form->getData();

                // récupère l'entity manager de Doctrine, qui gère les Entités <=> BD
                $entityManager = $this->getDoctrine()->getManager();

                // rend persistant (préparé et stocké dans Unité de Travail, espace tampon)
                $entityManager->persist($client);
                // enregistre en BD
                $entityManager->flush();

                //récupération de l'Id crée au flush()
                $client_id = $client->getId();
                $client_name = $client->getnomClient();

                //enregistrement de l'id client créé en Session
                $this->get('session')->set('client_id', $client_id);
                $this->get('session')->set('client_name', $client_name);


                return $this->redirectToRoute('page_reservation');
            }
        }

        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_client_inscription.html.twig",
                [
                    'formclient' => $form->createView()
                ]
            );
    }

    /**
     * @Route("/form_login_client", name="form_login_client")
     */
    public function ClientLoginFormAction(Request $request)
    {
        //formulaire login Client
        // Session Management - Symfony HttpFoundation component, on débute le formulaire en mettant client à -1;
        //todo vérifier mise à jour
        $this->get('session')->set('client_id', -1);

        // création Entité "Client"
        $form= $this->createForm(ClientLoginType::class, new Client);

        //saisie des données envoyées (éventuellement le client via le Formulaire
        // à notre variable $form. Elle contient le $_POST.
        $form->handleRequest($request);

        //controle si il y a bien un formulaire renvoyé en POST.
        if ($form->isSubmitted()){

            // récupère données dans Objet/Entité
            $client = $form->getData();
            $email = $client->getMailClient();

            /** @var $clientRepository ClientRepository */
            $clientRepository = $this->getDoctrine()->getRepository(Client::class);

            // méthode crée dans repository! recherche par email
            $client = $clientRepository->getClientEmail($email);

            //si le client existe dans la DB, récupération de l'Id.
            if($client){
                $client_id = $client->getId();
                $client_name = $client->getnomClient();

                // Session Management - Symfony HttpFoundation component !!!
                $this->get('session')->set('client_id', $client_id);
                $this->get('session')->set('client_name', $client_name);

                //alors il peut réserver avec son id_client
                return $this->redirectToRoute('form_reservation');
            }
            else {
                // si le client n'existe pas, on renvoie le formulaire pour une nouvelle tentative. avec client_id vide.

                return $this->render(
                    "@App/Pages/form_client_login.html.twig",
                    [
                        'formclient' => $form->createView(),
                        'client_id'=> '',
                    ]
                );
            }
        }

        $client_id = $this->get('session')->get('client_id');
        // replace this example code with whatever you need
        return $this->render(
            "@App/Pages/form_client_login.html.twig",
            [
                'formclient' => $form->createView(),
                'client_id'=> $client_id,
            ]
        );
    }

}