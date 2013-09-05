<?php
namespace CheminDuSon\SiteBundle\Tests\Menu;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class MenuTest extends WebTestCase {
	public function testMenu()
	{
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/');
	
		$this->assertCount(
				1,
				$crawler->filter('ul.nav')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Accueil")')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Inscription")')
		);
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Connexion")')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Groupes")')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Festivals")')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Concerts")')
		);
		
		
		
	}
	
	public function testUserMenu(){
		$client = static::createClient(array(), array(
				'PHP_AUTH_USER' => 'clamz',
				'PHP_AUTH_PW'   => 'clamz',
		));
		$crawler = $client->request('GET', '/');
		$this->assertCount(
				1,
				$crawler->filter('ul.nav')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Accueil")')
		);
		
		$this->assertCount(
				0,
				$crawler->filter('ul.nav:contains("Inscription")')
		);
		$this->assertCount(
				0,
				$crawler->filter('ul.nav:contains("Connexion")')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Groupes")')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Festivals")')
		);
		
		$this->assertCount(
				1,
				$crawler->filter('ul.nav:contains("Concerts")')
		);
		
		
	}
}
