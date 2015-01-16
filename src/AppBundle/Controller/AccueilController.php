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
     *  defaults ={"page"=1}
     *  )
     */
    public function indexAction($page,Request $request)
    {
        
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getrepository("AppBundle:Movie");
         $numParPage=54;
          $min= $request->query->get('min');  // si methode post $min=$request->request->get('min'); 
         $max= $request->query->get('max');
          $ok=  $request->query->get('ok');     
           $offset=($page-1)*$numParPage;
         $datemin=$repo->FiltreDate();  // remplir combo select date
         
            if(isset($min)&& $min!=0)
            {
                $data=$repo->resultatFitre($max,$min,$offset);
                $nbr=$repo->countFiltre($max,$min,$offset);
                $nbrePage=  \ceil($nbr/54);
               
            }
            else
            {
               $min=1916;
               $max=2015;
               $nbr=$repo->countAll();
                $nbrePage=  \ceil($nbr/54);
                $data=$repo->findby(array(),array("note"=>"DESC"),54,$offset);
            }

        $data=array('liste'=>$data,
            'page'=>$page,
            'nbrePg'=>$nbrePage,
            'datefiltre'=>(int)$datemin,
            'min'=>$min,
             'max'=>$max,
               'offset'=>$offset,
              'numParPage'=>$numParPage
                );
        

        return $this->render('default/index.html.twig',$data);
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
             $user=$this->getuser();
              $Dejalister=false;
             if ($user!=null)
             {
                $Dejalister= $this->getUser()->TrouverUnFilm($id);
             }
                     
        }
         return $this->render('default/detail.html.twig',array("detail"=>$data,"mess"=>null,'dejalister'=>$Dejalister));
    }
    
    /**
     * @Route("listeAjout/{id}", name="listeAjout",requirements={"'id":"\d+"})
     */
    public function listeAjoutAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository("AppBundle:Movie");
       $movieFind=$repo->find($id);
              
       $user= $this->getuser();  // l'user qui est deja connecter
       $user->addMovie($movieFind);
       $em->persist($user);
       $em->flush();
       
       
        return $this->render('default/detail.html.twig',array("detail"=>$movieFind,"mess"=>"Le film vient d'être ajouter à votre liste",'dejalister'=>false));
    }
   
    /**
     * @Route("liste", name="liste")
     */
    public function listeAction()
    {
        $user= $this->getuser();
          $data = $user->getMovies();
        
          return $this->render('default/liste.html.twig',array("detail"=>$data));
          
    }
    
    /**
     * @Route("listeRetire/{id}",name="listeRetire")
     */
    public function listeRetireAction($id)
    {
        $user= $this->getuser();
         
          $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository("AppBundle:Movie");
       $movieFind=$repo->find($id);
       $user->removeMovie($movieFind);
        $em->persist($user);
        $em->flush();
       
           return $this->render('default/detail.html.twig',array("detail"=>$movieFind,"mess"=>null, 'dejalister'=>false));
    }
    
       
}
