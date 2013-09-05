<?php
namespace CheminDuSon\SiteBundle\Tests\Notification;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NotificationTest extends WebTestCase  {
	
	protected $notificationService;
	protected $session;
	/**
	 * PHP UNIT SETUP FOR MEMORY USAGE
	 * @SuppressWarnings(PHPMD.UnusedLocalVariable) crawler set instance for test.
	 */
	public function setUp()
	{
		
	
		static::$kernel = static::createKernel();
		static::$kernel->boot();
		$this->notificationService = static::$kernel->getContainer()->get('chemin_du_son_site.notification');
		$this->session = static::$kernel->getContainer()->get('session');
		
	}
	protected function tearDown()
	{
		unset($this->notificationService,$session);
	}
	
	public function testAddNotification()
	{
		$this->notificationService->addNotification('test message','infos');
		
		$infosNotification = $this->session->getFlashBag()->get('infosNotifications', array());
		
		$this->assertEquals(1, count($infosNotification));
		$this->assertEquals('test message', $infosNotification[0]);
	}
	
	
	public function testAddNotification2()
	{
		$this->notificationService->addNotification('test message','infos');
	
		$infosNotification = $this->session->getFlashBag()->get('infosNotifications', array());
		$infosNotification2 = $this->session->getFlashBag()->get('infosNotifications', array());
		$this->assertEquals(1, count($infosNotification));
		$this->assertEquals(0, count($infosNotification2));
	}
}
