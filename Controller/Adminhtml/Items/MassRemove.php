<?php

namespace Idus\Cron\Controller\Adminhtml\Items;

class MassRemove extends \Idus\Cron\Controller\Adminhtml\Items
{

    public function execute()
    {
        $ids = $this->getRequest()->getParam('schedule_ids');
        $model = $this->_objectManager->create('Magento\Cron\Model\Schedule');
        foreach ($ids as $id){
            $model->load($id);
            if ($model->getId()) {
                $model->delete();
            }
        }
        $this->messageManager->addSuccess(__('Schedules Deleted.'));
        $this->_redirect('cron/*');
    }
}