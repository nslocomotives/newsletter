<?php

namespace AppBundle\Controller;

use Ibrows\Bundle\NewsletterBundle\Model\User\MandantUserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



//class DefaultController extends Controller
//{
//    /**
//     * @Route("/homepage", name="homepage")
//     */
//    public function indexAction()
//    {
//        return $this->render('default/index.html.twig');
//    }
//}

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $user = $this->getUser();
        if($user){
            if(!$user instanceof MandantUserInterface){
                throw new \InvalidArgumentException("The authenticated user has to implement the MandantInterface");
            }
            if(!$user->getMandant()){
                throw new \InvalidArgumentException("The authenticated user has no mandant set");
            }
            return new RedirectResponse($this->generateUrl('ibrows_newsletter_index'));
        }
         return new RedirectResponse($this->generateUrl('fos_user_security_login'));
    }
}
