<?php

namespace CheminDuSon\SiteBundle\Controller;

use CheminDuSon\SiteBundle\Entity\Group as GroupEntity;
use CheminDuSon\SiteBundle\Form\Model\Group;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GroupController extends Controller
{
    public function createAction(Request $request)
    {

        $group = new Group();
        $form = $this->createForm('group', $group);
        $form->handleRequest($request);

        if($form->isValid()) {
            $data = $form->getData();

            $groupEntity = new GroupEntity();
            $groupEntity->setName($data->getName());

            $em = $this->getDoctrine()->getManager();

            $em->persist($groupEntity);
            $em->flush();

            return $this->redirect($this->generateUrl('chemin_du_son.group.show', [
                    'slug' => $groupEntity->getSlug()

            ]));
        }
        return $this->render('CheminDuSonSiteBundle:Group:create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function showAction(Request $request, GroupEntity $group)
    {
        return $this->render('CheminDuSonSiteBundle:Group:show.html.twig', [
            'group' => $group
        ]);
    }

    public function findAction(Request $request)
    {
        $query = $request->get('query');

         /** var FOS\ElasticaBundle\Manager\RepositoryManager */
        $repositoryManager = $this->get('fos_elastica.manager.orm');

        /** var FOS\ElasticaBundle\Repository */
        $repository = $repositoryManager->getRepository('CheminDuSonSiteBundle:Group');

        $groups = $repository->findByName($query);
        $data = [];

        foreach($groups as $group) {
            $data[] = [
                'id' => $group->getId(),
                'name' => $group->getName()
            ];
        }

        $response = new JsonResponse();
        $response->setData([
            'data' => $data
        ]);

        return $response;
    }
}