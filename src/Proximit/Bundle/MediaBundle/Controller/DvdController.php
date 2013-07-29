<?php

namespace Proximit\Bundle\MediaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Proximit\Bundle\MediaBundle\Entity\Dvd;
use Proximit\Bundle\MediaBundle\Form\DvdType;

/**
 * Dvd controller.
 *
 * @Route("/dvd")
 */
class DvdController extends Controller
{

    /**
     * Lists all Dvd entities.
     *
     * @Route("/", name="dvd")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProximitMediaBundle:Dvd')->findAll();

        return array(
            'entities' => $entities,
            'test'     => $this->get('proximit.media_service')->test() 
        );
    }
    /**
     * Creates a new Dvd entity.
     *
     * @Route("/", name="dvd_create")
     * @Method("POST")
     * @Template("ProximitMediaBundle:Dvd:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Dvd();
        $form = $this->createForm(new DvdType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dvd_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Dvd entity.
     *
     * @Route("/new", name="dvd_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Dvd();
        $form   = $this->createForm(new DvdType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Dvd entity.
     *
     * @Route("/{id}", name="dvd_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProximitMediaBundle:Dvd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException($this->get('translator')->trans('unable.dvd.entity'));
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Dvd entity.
     *
     * @Route("/{id}/edit", name="dvd_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProximitMediaBundle:Dvd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException($this->get('translator')->trans('unable.dvd.entity'));
        }

        $editForm = $this->createForm(new DvdType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Dvd entity.
     *
     * @Route("/{id}", name="dvd_update")
     * @Method("PUT")
     * @Template("ProximitMediaBundle:Dvd:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProximitMediaBundle:Dvd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException($this->get('translator')->trans('unable.dvd.entity'));
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DvdType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dvd_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Dvd entity.
     *
     * @Route("/{id}", name="dvd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProximitMediaBundle:Dvd')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException($this->get('translator')->trans('unable.dvd.entity'));
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dvd'));
    }

    /**
     * Creates a form to delete a Dvd entity by id.
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
}
