<?php


namespace AppBundle\Controller\Client;


use AppBundle\Entity\Coach;
use AppBundle\Entity\Sport;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Coach controller.
 *
 * @Route("client/coach")
 */
class ClientController extends Controller
{

    /**
     * Lists all coach entities.
     *
     * @Route("/", name="client_coach_index")
     */
    public function coachAction(Request $request)
    {
        $sports = $this->getDoctrine()->getRepository(Sport::class)->findAll();

        if ($request->query->get('submit') == 1)
        {
            $searchPrice = $request->query->get('price');
            $searchSport = $request->query->get('sport');

            $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')
                ->findByFilters($searchPrice, $searchSport);

        } else {

            $coaches = $this->getDoctrine()->getRepository('AppBundle:Coach')->findAll();
        }

        return $this->render('client/index.html.twig', array(
            'coaches' => $coaches,
            'sports' => $sports,
        ));
    }

    /**
     * Finds and displays a coach entity.
     *
     * @Route("/{id}", name="client_coach_show")
     * @Method("GET")
     */
    public function showAction(Coach $coach)
    {
        $sports = $this->getDoctrine()->getRepository(Sport::class)->findAll();
        return $this->render('client/show.html.twig', array(
            'coach' => $coach,
            'sports' => $sports

        ));
    }

}