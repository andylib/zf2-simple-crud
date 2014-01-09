<?php

namespace SimpleCrud\Barang;

use Zend\Mvc\Controller\AbstractActionController;

class BarangController extends AbstractActionController
{
    public function indexAction()
    {
        $currentPageNumber = (int)$this->getRequest()->getQuery('page');
        $viewModel = array();
        $filterForm = new FilterForm();
        $filterData = array();

        if ($this->getRequest()->isPost()) {
            $filterForm->setData($this->getRequest()->getPost());
            if ($filterForm->isValid()) {
                $filterData = $filterForm->getData();
            }
        }

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $qb = $em->createQueryBuilder()
                 ->select('b')
                 ->from('SimpleCrud\Barang\Barang', 'b');

        if (!empty($filterData['kode'])) {
            $qb->andWhere('LOWER(b.kode) LIKE :kode');
            $qb->setParameter('kode', strtolower("%{$filterData['kode']}%"));
        }
        
        $paginator = new \SimpleCrud\Paginator\ORMPaginator($qb->getQuery());
        $paginator->setCurrentPageNumber($currentPageNumber);
        $paginator->setItemCountPerPage(2);
        
        $viewModel['paginator'] = $paginator;
        $viewModel['filterForm'] = $filterForm;

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
    
    public function editAction()
    {
        $id = (int)$this->getRequest()->getQuery('id');
        $barang = null;

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        if ($id > 0) {
            $barang = $em->find('SimpleCrud\Barang\Barang', $id);
        }

        if (null === $barang) {
            throw new \Exception('Barang tidak ditemukan');
        }
        
        $hydrator = new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($em);
        
        $form = new EntryForm();
        $form->setData($hydrator->extract($barang));

        $form->setInputFilter(new EntryFilter());

        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $hydrator->hydrate($form->getData(), $barang);

                $em->persist($barang);
                $em->flush();

                $this->flashMessenger()->addMessage('Barang ' . $barang->getKode()  . ' berhasil disimpan');
                $this->redirect()->toRoute('simple-crud/default', array('controller' => 'barang', 'action' => 'index'));
            } else {
            }
        }

        $viewModel['form'] = $form;

        $viewModel = new \Zend\View\Model\ViewModel($viewModel);
        $viewModel->setTemplate('simple-crud/barang/entry');

        return $viewModel;
    }

    public function deleteAction()
    {
        $id = (int)$this->getRequest()->getQuery('id');
        $barang = null;

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        if ($id > 0) {
            $barang = $em->find('SimpleCrud\Barang\Barang', $id);
        }

        if (null === $barang) {
            throw new \Exception('Barang tidak ditemukan');
        }
        
        $viewModel = array();

        $viewModel['form'] = new DeleteConfirmationForm();
        $viewModel['barang'] = $barang;
        
        if (!$this->getRequest()->isPost()) {

            return $viewModel;
        } else {
            $em->remove($barang);
            $em->flush();

            $this->flashMessenger()->addMessage('Barang ' . $barang->getKode() . ' berhasil dihapus.');
            $this->redirect()->toRoute('simple-crud/default', array('controller' => 'barang', 'action' => 'index'));

            return $viewModel;
        }
        
    }

}
