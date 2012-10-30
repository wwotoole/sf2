<?php

use Symfony\Component\HttpFoundation\Request;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
umask(0000);

$loader = require_once __DIR__.'/app/bootstrap.php.cache';
require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

// Setup done

// Simple page render test
//$templating = $container->get('templating');
//
//echo $templating->render('EventBundle:Default:index.html.twig', array(
//	'name' => 'Yoda',
//	'count' => 5,
//));

use Yoda\EventBundle\Entity\Event;

$event = new Event();
$event->setName('Darth\'s party');
$event->setLocation('Deathstar');
$event->setTime(new \DateTime('tomorrow midnight'));
$event->setImageName('foo.jpg');
//$event->setDetails('It\s gonna be huge!');

$em = $container->get('doctrine')->getManager();
$em->persist($event);
$em->flush();