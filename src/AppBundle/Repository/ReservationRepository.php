<?php

namespace AppBundle\Repository;

/**
 * ReservationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReservationRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @param $client
     * @return array
     */
    public function getReservationByClient($client){

        //var_dump('hello genre'); die;
        $queryBuilder = $this->createQueryBuilder('r');

        $query = $queryBuilder
            ->select('r')
            ->where('r.client =:client')
            ->setParameter('client', $client)
            ->orderBy('r.dateReservation', 'DESC')
            ->getQuery();
        $results = $query->getResult();
        return $results;
    }

    //recherche par nom client approximatif dans Client pour Administrateur !!!!!!!!!!!!!!
    /**
     * @param $name
     * @return array
     */
    public function getClientReservation($name){
        //crée objet constructeur de requete sur table r
        $queryBuilder = $this->createQueryBuilder('r');
        // utilisation du LIKE avec contrôle entrée setParameter;
        $query = $queryBuilder
            ->select('r')
           /* jointure table client*/
            ->leftJoin('r.client', 'c')
            /* requete ciblée sur nom client, avec Like qui permet de donner un nom qui inclut quelques lettres*/
            ->where('c.nomClient LIKE :nomClient')
            ->setParameter('nomClient', '%'.$name.'%') // sécurité injection !!!
            ->orderBy('r.dateReservation', 'DESC')
            ->getQuery(); /// important ! à ajouter setParameter
        $results = $query->getResult();
        return $results;
    }

    /**
     * @return array
     */
    public function findAll(){
    //requête en commençant par la dernière date de réservation
        return $this->findBy(array(), array('dateReservation' => 'DESC'));
    }

    /**
     * @param $client
     * @return array
     */
    public function getReservationBySpectacle($spectacle){
        //requête par spectacle , ordre par la dernière date de réservation
        $queryBuilder = $this->createQueryBuilder('r');

        $query = $queryBuilder
            ->select('r')
            ->where('r.spectacle =:spectacle')
            ->setParameter('spectacle', $spectacle)
            ->orderBy('r.dateReservation', 'DESC')
            ->getQuery();
        $results = $query->getResult();
        return $results;
    }
}
