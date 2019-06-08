<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Sport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{

    /**
     * @Route("/", name="home")
     *
     */
    public function coachAction()
    {
        $sports = $this->getDoctrine()->getRepository(Sport::class)->findAll();

        return $this->render('client/home.html.twig', array(
            'sports' => $sports
        ));
    }
}