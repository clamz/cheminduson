<?php
namespace CheminDuSon\SiteBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
class MenuBuilder {
	private $factory;
	private $securityContext;
	private $transDomain = 'CheminDuSonSiteBundle';
	
	/**
	 * @param FactoryInterface $factory
	 */
	public function __construct(FactoryInterface $factory, SecurityContext $securityContext)
	{
		$this->factory = $factory;
		$this->securityContext = $securityContext;
	}
	
	public function createMainMenu(Request $request)
	{
		$menu = $this->factory->createItem('root', array('currentClass' => 'active'))->setChildrenAttributes(array('class' => 'nav'));
	
		$menu->addChild('Accueil', array('route' => '_welcome'))->setExtra('translation_domain', $this->transDomain);		
		if(!$this->securityContext->isGranted('ROLE_USER')){
			$menu->addChild('Inscription', array('route' => 'fos_user_registration_register'))->setExtra('translation_domain', $this->transDomain);
			$menu->addChild('Connexion', array('route' => 'fos_user_security_login'))->setExtra('translation_domain', $this->transDomain);
		}
		
		$menu->addChild('Groupes', array('route' => '_welcome'))->setExtra('translation_domain', $this->transDomain);;
		$menu->addChild('Concerts', array('route' => '_welcome'))->setExtra('translation_domain', $this->transDomain);;
		$menu->addChild('Festivals', array('route' => '_welcome'))->setExtra('translation_domain', $this->transDomain);
		return $menu;
	}
}