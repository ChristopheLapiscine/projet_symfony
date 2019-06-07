<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Coach;
use AppBundle\Entity\Sport;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Coach controller.
 *
 * @Route("admin/coach")
 */
class AdminCoachController extends Controller
{
    /**
     * Lists all coach entities.
     *
     * @Route("/", name="admin_coach_index")
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

        return $this->render('admin/coach/index.html.twig', array(
            'coaches' => $coaches,
            'sports' => $sports,
    ));
    }

    /**
     * Creates a new coach entity.
     *
     * @Route("/new", name="admin_coach_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sports = $this->getDoctrine()->getRepository(Sport::class)->findAll();
        $coach = new Coach();
        $form = $this->createForm('AppBundle\Form\CoachType', $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coach);
            $em->flush();
            $this->addFlash('success', 'Coach crée avec succès');

            return $this->redirectToRoute('admin_coach_index');
        }

        return $this->render('admin/coach/new.html.twig', array(
            'coach' => $coach,
            'sports' => $sports,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a coach entity.
     *
     * @Route("/{id}", name="admin_coach_show")
     * @Method("GET")
     */
    public function showAction(Coach $coach)
    {
        return $this->render('admin/coach/show.html.twig', array(
            'coach' => $coach,
        ));
    }

    /**
     * Displays a form to edit an existing coach entity.
     *
     * @Route("/{id}/edit", name="admin_coach_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $coach = $this->getDoctrine()->getRepository(Coach::class)->find($id);

        $editForm = $this->createForm('AppBundle\Form\CoachType', $coach);

        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Coach modifié avec succès');

            return $this->redirectToRoute('admin_coach_index');
        }

        return $this->render('admin/coach/edit.html.twig', array(
            'coach' => $coach,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a coach entity.
     *
     * @Route("/delete/{id}", name="admin_coach_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $coach = $this->getDoctrine()->getRepository(Coach::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($coach);
        $entityManager->flush();
        $this->addFlash('success', 'Coach supprimé avec succès');

        return $this->redirectToRoute('admin_coach_index');
    }
}
