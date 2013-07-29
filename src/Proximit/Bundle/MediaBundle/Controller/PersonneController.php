<?php

namespace Proximit\Bundle\MediaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proximit\Bundle\MediaBundle\Entity\Personne;
use Proximit\Bundle\MediaBundle\Form\PersonneType;

/**
 * Personne controller.
 *
 * @Route("/admin/personne")
 */
class PersonneController extends Controller
{

    /**
     * Lists all Personne entities.
     *
     * @Route("/", name="personne")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProximitMediaBundle:Personne')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Personne entity.
     *
     * @Route("/", name="personne_create")
     * @Method("POST")
     * @Template("ProximitMediaBundle:Personne:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Personne();
        $form = $this->createForm(new PersonneType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personne_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Personne entity.
     *
     * @Route("/new", name="personne_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Personne();
        $form   = $this->createForm(new PersonneType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Personne entity.
     *
     * @Route("/{id}", name="personne_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProximitMediaBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException($this->get('translator')->trans('unable.personne.entity'));
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Personne entity.
     *
     * @Route("/{id}/edit", name="personne_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProximitMediaBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException($this->get('translator')->trans('unable.personne.entity'));
        }

        $editForm = $this->createForm(new PersonneType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Personne entity.
     *
     * @Route("/{id}", name="personne_update")
     * @Method("PUT")
     * @Template("ProximitMediaBundle:Personne:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProximitMediaBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException($this->get('translator')->trans('unable.personne.entity'));
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PersonneType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personne_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Personne entity.
     *
     * @Route("/{id}", name="personne_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProximitMediaBundle:Personne')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException($this->get('translator')->trans('unable.personne.entity'));
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personne'));
    }

    /**
     * Creates a form to delete a Personne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     * Display a list of dvd by person.
     *
     * @Route("/{id}/list/dvd", name="personne_list_dvd")
     * @Method("GET")
     * @Template()
     */
    public function listdvdAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        return array(
            'entities' => $this->get('proximit.media_service')->listeDvd($id),
            'realisateur' => $em->getRepository('ProximitMediaBundle:Personne')->find($id)
        );
    }
}
