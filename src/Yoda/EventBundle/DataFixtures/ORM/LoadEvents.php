<?php

namespace Yoda\EventBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Yoda\EventBundle\Entity\Event;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
		
		$event1 = new Event();
		$event1->setName('Darth\'s party');
		$event1->setLocation('Deathstar');
		$event1->setTime(new \DateTime('tomorrow midnight'));
		$event1->setImageName('foo.jpg');
		$event1->setDetails('It\s gonna be huge!');
		$manager->persist($event1);
		
		$event2 = new Event();
		$event2->setName('Darth\'s party');
		$event2->setLocation('Deathstar');
		$event2->setTime(new \DateTime('tomorrow midnight'));
		$event2->setImageName('foo.jpg');
		$event2->setDetails('It\s gonna be huge!');
		$manager->persist($event2);
		
		$manager->flush();
	}
}