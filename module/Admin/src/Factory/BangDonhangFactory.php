<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Factory;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Model\BangDonhang;
use Zend\Db\Adapter\AdapterInterface;
/**
 * Description of BangDonhangFactory
 *
 * @author Quan
 */
class BangDonhangFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new BangDonhang($container->get(AdapterInterface::class));
    }

//put your code here
}
