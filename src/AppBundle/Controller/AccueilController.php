<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getrepository("AppBundle:Movie");
        $data=$repo->findby(array(),array("note"=>"DESC"),54);
       // print_r($data);
        return $this->render('default/index.html.twig',array('liste'=>$data));
    }
    /**
     * @Route("/detail/{id}", name="detail")
     */
    public function detailAction($id)
    {
        if (isset($id))
        {
            $em=$this->getDoctrine()->getManager();
        $repo=$em->getrepository("AppBundle:Movie");
        $data=$repo->find($id);
        }
         return $this->render('default/detail.html.twig',array("detail"=>$data));
    }
            
}
