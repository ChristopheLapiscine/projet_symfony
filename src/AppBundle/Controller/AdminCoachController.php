<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Coach;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdminCoachController extends Controller
{
    /**
     *
     * @Route("/admin/coach_bdd", name="admin_coach_bdd")
     *
     * */
    public function bookBddAction()
    {
        $coach = $this->getDoctrine()
            ->getRepository(Coach::class)
            ->findAll();
        return $this->render('Admin/coach/coachAll.html.twig',
            [
                'coach' => $coach
            ]);
    }
}