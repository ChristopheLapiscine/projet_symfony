<?php


namespace AppBundle\Controller;


use AppBundle\Entity\CoachSearch;
use AppBundle\Form\CoachSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{

    /**
     * @Route("/", name="home")
     * @Method("GET")
     */
    public function homeBddAction(Request $request)
    {
        $search = new CoachSearch();
        $formulaire = $this->createForm(CoachSearchType::class, $search);
        $formulaire->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        if ($formulaire->isSubmitted() && $formulaire->isValid()) {
            $data = $formulaire->getData();
            return $this->redirectToRoute('admin_coach_index', array($data));
        }
        $coaches = $em->getRepository('AppBundle:Coach')->findAllCoach($search);

        return $this->render('default/home.html.twig', array(
            'coaches' => $coaches,
            'formulaire' => $formulaire->createView()
        ));
    }
}