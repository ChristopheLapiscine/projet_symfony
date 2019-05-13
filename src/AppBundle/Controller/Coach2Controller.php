<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Coach;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Coach2Controller extends Controller
{
    /**
     * @Route("/listeCoach", name="listeCoach")
     */
    public function listeCoachBddAction()
    {
        $coach = $this->getDoctrine()
            ->getRepository(Coach::class)
            ->findAll();
        return $this->render('default/listeCoach.html.twig',
            [
                'coach' => $coach
            ]);
    }

    /**
     * @Route("/detailCoach/{id}", name="detailCoach")
     **/
    public function coachDetailBddAction($id){
        $singleCoach= $this->getDoctrine()
            ->getRepository(Coach::class)
            ->find($id);
        return $this->render('default/detailCoach.html.twig',
            [
                'singleCoach' => $singleCoach,
                'id' => $id
            ]);
    }
}