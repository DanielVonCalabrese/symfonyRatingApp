<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\Songs;
use App\Repository\SongsRepository;
use App\Entity\Ratings;
use App\Form\SongsFormType;
use App\Repository\RatingsRepository;
use Symfony\Component\HttpFoundation\Request;

class SongController extends AbstractController
{
    /**
      * @Route("/song/add/", name="/song/add/")
      */
    public function add(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $song = new Songs();

        $form = $this->createForm(SongsFormType::class, $song);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($song);
            $entityManager->flush();
            
            return $this->redirectToRoute('/song/list-all/');
        }

        return $this->render("song/add.html.twig", ['song_form' => $form->createView()]);
    }

    /**
      * @Route("/song/delete/{songId}", name="/song/delete/")
      */
    public function delete(int $songId, SongsRepository $songsRepository): RedirectResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $item = $songsRepository->find($songId);
        $entityManager->remove($item);
        $entityManager->flush();

        return $this->redirectToRoute('/song/list-all/');
    }
    
    /**
      * @Route("/song/view/{songId}", name="/song/view/")
      */
    public function view(int $songId, SongsRepository $songsRepository, RatingsRepository $ratingsRepository): Response
    {
        $hasVoted = $this->hasVoted($songId, $ratingsRepository);

        $entityManager = $this->getDoctrine()->getManager();
        $item = $entityManager->createQueryBuilder()
        //->select('s.name song_name', 's.id song_id', 'avg(r.rating_value) avg_rating_value', 'count(r.song_id) vote_count', 'u.id user_id', 'u.userName')
            ->select('s.name song_name', 's.id song_id', 'r.rating_value', 'u.id user_id', 'u.userName', 'u.email')
            ->from('App\Entity\Songs', 's')          
            ->leftJoin('App\Entity\Ratings', 'r', 'WITH', 's.id = r.song_id')
            ->leftJoin('App\Entity\User', 'u', 'WITH', 'r.user_id = u.id')
            ->where("r.song_id = :identifier")
            //   ->groupBy('song_name', 'song_id', 'user_id')
            ->setParameter('identifier', $songId)
            ->getQuery()
            ->getResult();

        if(!$item === true)
        {            
            $item = $songsRepository->find($songId);
            $result['rating_value_total'] = 0;
            $result['data'] = array();
            $result['song_id'] = $item->getId();
            $result['song_name'] = $item->getName();
            $result['overal_rating'] = 0;
            $result['votes'] = 0;
        }
        else
        {
            $result['rating_value_total'] = 0;
            foreach($item as $row)
            {
                $result['data'][] = $row;
                $result['song_id'] = $row['song_id'];
                $result['song_name'] = $row['song_name'];
                $result['rating_value_total'] += $row['rating_value'];
            }
            
            $result['votes'] = count($result['data']);
            $result['overal_rating'] = $result['rating_value_total'] / $result['votes'];
        }
            
        return $this->render("song/view.html.twig", ['songRatingItem' => $result, 'id' => $songId, 'hasVoted' => $hasVoted]);
    }
    
    /**
      * @Route("/song/{songId}/rate/{rating}", name="/song/rate/")
      */
    public function rate(int $songId, int $rating): RedirectResponse
    {
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();

        $ratingObject = new Ratings();
        $ratingObject->setRatingValue($rating);
        $ratingObject->setSongId($songId);
        $ratingObject->setUserId($user->getId());

        $entityManager->persist($ratingObject);
        $entityManager->flush();

        return $this->redirectToRoute('/song/list-all/');
    }
    
    /**
      * @Route("/")
      * @Route("/song/list-all/", name="/song/list-all/")
      */
    public function listAll(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();        

        $items = $entityManager->createQueryBuilder()
            ->select('s.name song_name', 's.id song_id', 'avg(up.rating_value) avg_rating_value', 'count(up.song_id) vote_count')
            ->from('App\Entity\Songs', 's')
            ->leftJoin('App\Entity\Ratings', 'up', 'WITH', 's.id = up.song_id')
            ->orderBy('song_id', 'ASC')
            ->groupBy('song_name', 'song_id')
            ->orderBy('song_id', 'DESC')
            ->getQuery()
            ->getResult();

        if(!$items === true)
        {
            $this->addFlash('danger', 'No songs found!');
            //throw $this->createNotFoundException('No songs found');
        }

        return $this->render("song/list-all.html.twig", ['songs' => $items]);
    }
    
    /**
     * Checks whether a user has already voted.
     */
    private function hasVoted(int $songId, RatingsRepository $ratingsRepository)
    {
        $user = $this->getUser();

        $ratingItem = $ratingsRepository->findBy(['song_id' => $songId, 'user_id' => $user->getId()]);

        if($ratingItem)
        {
            return true;
        }

        return false;
    }
}