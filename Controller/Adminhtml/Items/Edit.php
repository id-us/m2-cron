<?php


namespace Idus\Cron\Controller\Adminhtml\Items;

class Edit extends \Idus\Cron\Controller\Adminhtml\Items
{

    public function execute()
    {

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Idus_Cron::cron');
        $resultPage->getConfig()->getTitle()->prepend(__('Cron Edit - Add'));

        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('Magento\Cron\Model\Schedule');

        if ($id) {
            $resultPage->getConfig()->getTitle()->prepend(__('Cron Edit - Edit'));
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This item no longer exists.'));
                $this->_redirect('cron/*');
                return;
            }
        }
        // set entered data if was error when we do save
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getPageData(true);
        if (!empty($data)) {
            $model->addData($data);
        }
        $this->_coreRegistry->register('current_cron_items', $model);
        $this->_initAction();
        $this->_view->getLayout()->getBlock('items_items_edit');
        $this->_view->renderLayout();
    }
}
