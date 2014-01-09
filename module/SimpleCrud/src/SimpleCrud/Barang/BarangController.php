<?php

namespace SimpleCrud\Barang;

use Zend\Mvc\Controller\AbstractActionController;

class BarangController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = array();

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $viewModel['barangList'] = $em->getRepository('SimpleCrud\Barang\Barang')->findAll();

        return $viewModel;
    }

    public function entryAction()
    {
        $form = new EntryForm();

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
            }
        }

        $viewModel['form'] = $form;

        return $viewModel;
    }
}
