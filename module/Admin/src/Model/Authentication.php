<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of Authentication
 *
 * @author Quan
 * 
 */
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
class Authentication extends AuthenticationService{
    private $identity;
    public function __construct(CredentialTreatmentAdapter $identity) {
        $this->identity = $identity;
        $this->authenticate($identity);
    }

	/**
	 * @param $username
	 * @param $password
	 */
    public function setIdentity($username,$password)
    {
        $this->identity->setIdentity($username)
                ->setCredential($password);
        $this->authenticate($this->identity);
    }
    public function getIdentityAdapter()
    {
        return $this->identity;
    }
}
