<?php
namespace CheminDuSon\SiteBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{


	function accueilAction(){
		$em = $this->getDoctrine()->getManager();

		$concertRepo = $em->getRepository('CheminDuSonSiteBundle:Concert');
		$groupRepo = $em->getRepository('CheminDuSonSiteBundle:Group');

		$concerts = $concertRepo->findAll();
		$groups = $groupRepo->findAll();

		$response =
			$this
				->render(
					'CheminDuSonSiteBundle:Accueil:accueil.html.haml',
					[
						'concerts' => $concerts,
						'groups' => $groups,
						'rand' => rand(),
					]
				)
			;

		// Définir le nombre de secondes après lesquelles la réponse
		// ne devrait plus être considérée comme valide
		$response->setMaxAge(60);

		return $response;
	}

}
