<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Factory;

/**
 * Description of AuthenticationFactory
 *
 * @author Quan
 */
use Zend\ServiceManager\Factory\FactoryInterface;
use Admin\Model\Authentication as shopAuthentication;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
class AuthenticationFactory implements FactoryInterface{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        if(!isset($_SESSION['username']) || !isset($_SESSION['password']))
        {
            $username = 'dhsajkdh1Asakjdhsajkdhsajkdh*()s!@ajkhdsa';
            $password = 'akshdkajs1Bdkj2Dsab4SdI%$#$#@ajkbdsabdkjsadbsakjbdsak';
        }
        else
        {
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
        }
        $identity = new CredentialTreatmentAdapter($container->get(AdapterInterface::class),'nguoidung','taikhoan','matkhau');
        $identity->setIdentity($username)
                ->setCredential($password);
        return new shopAuthentication($identity);
    }
//put your code here
}
