<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Project;

class ProjectController extends Controller
{
    /**
     * @Route("/project", name="project")
     */
    public function index()
    {

    	// you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();

        $project = new Project();
        $project->setName('');
        $project->setContent('');
        $project->setUrl('');
        $project->setImage('');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($project);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();
        return new Response('Welcome to your new controller!');
    }
}
