<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends Controller
{
    /**
     * @Route("/{page}", name="homepage",
     * requirements={"page"="\d+"},
     * defaults ={"page"=1})
     */
    public function indexAction($page,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getrepository("AppBundle:Movie");
         $numParPage=54;
          $min= $request->request->get('min');
         $max= $request->request->get('max');
         $datemin=$repo->FiltreDate();  // remplir combo select date
            if(isset($min))
            {
                $data=$repo->resultatFitre($max,$min);
                $nbr=$repo->countFiltre($max,$min);
//                $nbrePage= $nbr/54;
                $nbrePage=1;
            }
            else
            {
               $nbr=$repo->countAll();
                $nbrePage=  \ceil($nbr/54);
               $offset=($page-1)*$numParPage;
               $data=$repo->findby(array(),array("note"=>"DESC"),54,$offset);
            }

        
        
     
        
       // print_r($data);
        return $this->render('default/index.html.twig',array('liste'=>$data,'page'=>$page,'nbrePg'=>$nbrePage,'datefiltre'=>(int)$datemin));
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
    
    /**
     * @Route("/parDate", name="parDate")
     */
//    public function  parDateAction(Request $request)
//    {
//       $min= $request->request->get('min');
//       $max= $request->request->get('max');
//       $em=$this->getDoctrine()->getManager();
//        $repo=$em->getrepository("AppBundle:Movie");
//        $data=$repo->resultatFitre($max,$min);
//       $count=$repo->countFiltre($max,$min);
//       dump($count);
//       die();
//        return $this->render('default/date.html.twig',array('data'=>$data));
//    }

   
   
       
}
