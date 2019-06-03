<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Sport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{

    /**
     * @Route("/", name="home")
     *
     */
    public function coachAction(Request $request)
    {
        $sports = $this->getDoctrine()->getRepository(Sport::class)->findAll();

        return $this->render('default/home.html.twig', array(
            'sports' => $sports
        ));
    }
}