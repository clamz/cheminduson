<?php
namespace CheminDuSon\SiteBundle\Services;
use Symfony\Component\HttpFoundation\Session\Session;

class NotificationService {
	private $session;
	
	public function __construct(Session $session){
		$this->session = $session;
	}
	
	public function addNotification($msg, $type){
		$this->session->getFlashBag()->add($type.'Notifications',$msg);
	}
}
