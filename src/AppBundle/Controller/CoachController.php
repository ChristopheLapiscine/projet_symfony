<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Coach;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Coach controller.
 *
 * @Route("admin/coach")
 */
class CoachController extends Controller
{
    /**
     * Lists all coach entities.
     *
     * @Route("/", name="admin_coach_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $coaches = $em->getRepository('AppBundle:Coach')->findAll();

        return $this->render('admin/coach/index.html.twig', array(
            'coaches' => $coaches,
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
        $coach = new Coach();
        $form = $this->createForm('AppBundle\Form\CoachType', $coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($coach);
            $em->flush();

            return $this->redirectToRoute('admin_coach_show', array('id' => $coach->getId()));
        }

        return $this->render('admin/coach/new.html.twig', array(
            'coach' => $coach,
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
        $deleteForm = $this->createDeleteForm($coach);

        return $this->render('admin/coach/show.html.twig', array(
            'coach' => $coach,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing coach entity.
     *
     * @Route("/{id}/edit", name="admin_coach_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Coach $coach)
    {
        $deleteForm = $this->createDeleteForm($coach);
        $editForm = $this->createForm('AppBundle\Form\CoachType', $coach);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_coach_edit', array('id' => $coach->getId()));
        }

        return $this->render('admin/coach/edit.html.twig', array(
            'coach' => $coach,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a coach entity.
     *
     * @Route("/{id}", name="admin_coach_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Coach $coach)
    {
        $form = $this->createDeleteForm($coach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($coach);
            $em->flush();
        }

        return $this->redirectToRoute('admin_coach_index');
    }

    /**
     * Creates a form to delete a coach entity.
     *
     * @param Coach $coach The coach entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Coach $coach)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_coach_delete', array('id' => $coach->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
