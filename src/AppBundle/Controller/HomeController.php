<?php


namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{

    /**
     * @Route("/home", name="home")
     */
    public function homeBddAction()
    {
        return $this->render('default/home.html.twig');
    }
}