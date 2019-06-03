<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sport;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sport controller.
 *
 * @Route("admin/sport")
 */
class AdminSportController extends Controller
{
    /**
     * Lists all sport entities.
     *
     * @Route("/", name="admin_sport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sports = $em->getRepository('AppBundle:Sport')->findAll();

        return $this->render('admin/sport/index.html.twig', array(
            'sports' => $sports,
        ));
    }

    /**
     * Creates a new sport entity.
     *
     * @Route("/new", name="admin_sport_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sport = new Sport();
        $form = $this->createForm('AppBundle\Form\SportType', $sport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sport);
            $em->flush();
            $this->addFlash('success', 'Sport crée avec succès');

            return $this->redirectToRoute('admin_sport_index');
        }

        return $this->render('admin/sport/new.html.twig', array(
            'sport' => $sport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sport entity.
     *
     * @Route("/{id}", name="admin_sport_show")
     * @Method("GET")
     */
    public function showAction(Sport $sport)
    {
        return $this->render('admin/sport/show.html.twig', array(
            'sport' => $sport,
        ));
    }

    /**
     * Displays a form to edit an existing sport entity.
     *
     * @Route("/{id}/edit", name="admin_sport_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sport $sport)
    {
        $editForm = $this->createForm('AppBundle\Form\SportType', $sport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Sport modifié avec succès');

            return $this->redirectToRoute('admin_sport_index');
        }

        return $this->render('admin/sport/edit.html.twig', array(
            'sport' => $sport,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a sport entity.
     *
     * @Route("/delete/{id}", name="admin_sport_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $sport = $this->getDoctrine()->getRepository(Sport::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($sport);
        $entityManager->flush();
        $this->addFlash('success', 'Sport supprimé avec succès');

        return $this->redirectToRoute('admin_sport_index');
    }
}
