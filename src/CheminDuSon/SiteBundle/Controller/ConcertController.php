<?php

namespace CheminDuSon\SiteBundle\Controller;

use CheminDuSon\SiteBundle\Form\Model\ConcertModel;
use CheminDuSon\SiteBundle\Entity\Concert;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConcertController extends Controller
{
    public function createAction(Request $request)
    {
        $concertModel = new ConcertModel();
        $form = $this->createForm('concert', $concertModel);
        $form->handleRequest($request);

        if($form->isValid()) {
            $data = $form->getData();

            $concert = new Concert();
            $concert->setName($data->getName());

            $em = $this->getDoctrine()->getManager();

            $em->persist($concert);
            $em->flush();

            return $this->redirect($this->generateUrl('chemin_du_son.concert.show', [
                    'slug' => $concert->getSlug()

            ]));
        }
        return $this->render('CheminDuSonSiteBundle:Concert:create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function showAction(Request $request, Concert $concert)
    {
        return $this->render('CheminDuSonSiteBundle:Concert:show.html.twig', [
            'concert' => $concert
        ]);
    }
}