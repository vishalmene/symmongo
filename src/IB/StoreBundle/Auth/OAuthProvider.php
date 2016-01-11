<?php
namespace IB\StoreBundle\Auth;
 
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthUserProvider;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;

 
class OAuthProvider extends OAuthUserProvider
{
    protected $session,  $admins;
 
    public function __construct($session, $service_container)
    {
        $this->session = $session;
        $this->container = $service_container;
    }
 
    public function loadUserByUsername($username)
    {
        return "Hello User";

    }
 
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        //Data from Google response
        echo "<pre>";exit(\Doctrine\Common\Util\Debug::dump($response)).'--';
    }
}