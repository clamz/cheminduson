<?php
namespace CheminDuSon\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CheminDuSon\UserBundle\Form\Type\ContactDetailsType;
use CheminDuSon\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAware;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

class ContactDetailsController extends Controller {

	/**
	 * @ParamConverter("user", class="CheminDuSonUserBundle:User")
	 * @param User $user
	 */
	public function updateAction(User $user,Request $request){
		$contactDetails = $user->getContactDetailsPrincipal();
		$form = $this->container->get('form.factory')->create(new ContactDetailsType(), $contactDetails);
		
		
		$form->handleRequest($request);
		$notificationMsg = "";
		if ($form->isValid()) {				

			$contactDetailsEntity = $form->getData();
			$em = $this->getDoctrine()->getManager();
		    $em->persist($contactDetailsEntity);
		    $em->flush();			
		
			$notificationMsg = $this->container->get('translator')->trans('form.user.contact-details.update.success', array('%username%' => $user->getUsername()),'CheminDuSonUserBundle');
			return $this->updateConfirmed($user);
		}else{
		
			if($request->get('notification',0)){
				$notificationMsg = $this->container->get('translator')->trans('registration.confirmed', array('%username%' => $user->getUsername()),'FOSUserBundle');
			}
			
			
		}
		
		return $this->container->get('templating')->renderResponse('CheminDuSonUserBundle:ContactDetails:update.html.twig',
				array('form' => $form->createView(), 'user' => $user, 'notificationMsg'=>$notificationMsg)
		);
	}
	
	/**
	 * @ParamConverter("user", class="CheminDuSonUserBundle:User")
	 * @param User $user
	 */
	public function updateConfirmed(User $user){
		$notificationService = $this->get('chemin_du_son_site.notification');
		
		$msg = $this->container->get('translator')->trans('form.user.contact-details.update.success', array(),'CheminDuSonUserBundle');
		$notificationService->addNotification($msg, 'success');
		return $this->redirect($this->generateUrl('chemin_du_son_user_contact_details_show',array('slug' => $user->getSlug())));
	}
	
	/**
	 * @ParamConverter("user", class="CheminDuSonUserBundle:User")
	 * @param User $user
	 */
	public function showAction(User $user, Request $request){
		
		$contactDetails = $user->getContactDetailsPrincipal();
		
		
		
		return $this->container->get('templating')->renderResponse('CheminDuSonUserBundle:ContactDetails:show.html.twig',
				array('contactDetails' => $contactDetails, 'user' => $user)
		);
	}
}
