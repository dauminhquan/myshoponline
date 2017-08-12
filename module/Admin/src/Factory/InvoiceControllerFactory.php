<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Factory;

/**
 * Description of InvoiceControllerFactory
 *
 * @author Quan
 */
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Admin\Controller\InvoiceController;
use Admin\Model\BangDonhang;
class InvoiceControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        return new InvoiceController($container->get(BangDonhang::class));
    }

//put your code here
}
