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
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $form = new EntryForm();
        $form->setInputFilter(new EntryFilter());

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $hydrator = new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($em);
                $barang   = new \SimpleCrud\Barang\Barang();

                $hydrator->hydrate($form->getData(), $barang);

                $em->persist($barang);
                $em->flush();

                $this->flashMessenger()->addMessage('Barang ' . $barang->getKode()  . ' berhasil disimpan');
                $this->redirect()->toRoute('simple-crud/default', array('controller' => 'barang', 'action' => 'index'));
            } else {
            }
        }

        $viewModel['form'] = $form;

        return $viewModel;
    }
}
