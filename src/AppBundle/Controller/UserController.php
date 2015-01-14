<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;
use AppBundle\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Security\Core\Security;


class UserController extends Controller
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(Request $request)
    {
        $user=new User();
        $regist=new RegistrationType();
        $form=$this->createform($regist,$user);
        $form->handleRequest($request);
       
         if($form->isSubmitted() && $form->isValid() )
        {
             $user->setDateRegist(new \datetime());
             $user->setDateModif(new \datetime());
             $salt=md5(uniqid());
             $token=md5(uniqid());
             $user->setSalt($salt);
             $user->setToken($token);
             $user->setRoles(array('ROLE_USER'));
             $pass=$user->getPassword();
             /***  hachage ****/
             $encoder=$this->get('security.password_encoder');
             $encod=$encoder->encodePassword($user,$pass);
           
             $user->setPassword($encod);
 
             $em=$this->getDoctrine()->getManager();
             $em->persist($user);
             $em->flush();
         }
              
        return $this->render('user/inscription.html.twig',array( 'formulaire'=>$form->createView() ));
    }
    
    
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(Request $request)
{
    $session = $request->getSession();

    // get the login error if there is one
    if ($request->attributes->has(Security::AUTHENTICATION_ERROR)) {
        $error = $request->attributes->get(
            Security::AUTHENTICATION_ERROR
        );
    } elseif (null !== $session && $session->has(Security::AUTHENTICATION_ERROR)) {
        $error = $session->get(Security::AUTHENTICATION_ERROR);
        $session->remove(Security::AUTHENTICATION_ERROR);
    } else {
        $error = '';
    }

    // last username entered by the user
    $lastUsername = (null === $session) ? '' : $session->get(Security::LAST_USERNAME);
       
    return $this->render(
        'user/login.html.twig',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        )
    );
}

 /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
        $ok=0;
        return $this->render('user/login.html.twig',array("ok"=>$ok));
    }
    
    /**
     * 
     * @Route("/logout",name="logout")
     */
    public function logoutAction()
    {}
  /**
   * @Route("/mdpOublie/{ok}",name="mdpOublie")
   */
    public function mdpOublieAction($ok)
    {
         return $this->render('user/login.html.twig',array("ok"=>$ok));
    }
    
    /**
     * @Route ("/emailMDP", name="emailMDP")
     * 
     */
    public function EmailMDP(request $request)
    {
        $adrEmail=$request->request->get('_email');
           $username=$adrEmail;
           $em=$this->getDoctrine()->getManager();
             $repo=$em->getrepository("AppBundle:User");
             $data=$repo->findby(array('email'=>$adrEmail));
    // verifier si user existe
            if(empty($data)) 
            {
                echo "l'email n'existe pas";
                $ok=0;
                return $this->render('user/login.html.twig',array("ok"=>$ok));
              }
            
          $message = \Swift_Message::newInstance()
                  ->setCharset("utf-8")
                 ->setSubject('Film - Changer Mot de passe')
                  ->setFrom(array("lganne3@yahoo.fr"=>"anne"))
                  ->setTo($adrEmail)
                  ->setBody($this->renderview('user/test.html.twig',array('username'=>$username, 'user'=>$data)),"text/html");
    
            $this->get('mailer')->send($message);
   
      return $this->render('user/MessageMail.html.twig');
        
    }     
    
    /**
     * @Route ("/changementMdp/{mail}/{token}", name="changementMdp")
     */
    public function changementMdp($mail,$token,Request $request)
    {
        $em=$this->getDoctrine()->getManager();
         $repo=$em->getrepository("AppBundle:User");
         $data=$repo->findOneby(array('email'=>$mail));
         
          foreach ($data as $unUser)
         {
             if($unUser.token!=$token)
             {
                $error = $request->attributes->get(
                  Security::AUTHENTICATION_ERROR  );
               return $this->render(path('login_check'));
             }
         }
           $regist=new RegistrationType();
       //    $user=new user();
     //  $form=$this->createform($regist,$user);
//        $form->handleRequest($request);               
        return $this->render('user/ModifMdp.html.twig',array('data'=>$data));
    }
         
}
