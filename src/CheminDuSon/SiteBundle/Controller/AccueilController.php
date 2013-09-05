<?php
namespace CheminDuSon\SiteBundle\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;

class AccueilController extends ContainerAware{

	
	function accueilAction(){
		$response = $this->container->get('templating')->renderResponse('CheminDuSonSiteBundle:Accueil:accueil.html.haml',array('rand' => rand()));
	
		// Définir le nombre de secondes après lesquelles la réponse
		// ne devrait plus être considérée comme valide
		$response->setMaxAge(60);
		
		return $response;
	}

}
