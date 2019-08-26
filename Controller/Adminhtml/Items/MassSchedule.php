<?php

namespace Idus\Cron\Controller\Adminhtml\Items;

class MassSchedule extends \Idus\Cron\Controller\Adminhtml\Items
{

    public function execute()
    {
        $ids = $this->getRequest()->getParam('schedule_ids');
        $model = $this->_objectManager->create('Magento\Cron\Model\Schedule');
        $tz = $this->_objectManager->create('Magento\Framework\Stdlib\DateTime\TimezoneInterface');
        foreach ($ids as $id){
            $model->load($id);
            $code = $model->getJobCode();
            $newModel = $this->_objectManager->create('Magento\Cron\Model\Schedule');
            $newModel->setJobCode($code);
            $newModel->setCreatedAt(strftime('%Y-%m-%d %H:%M:%S', $tz->scopeTimeStamp()));
            $newModel->setScheduledAt(strftime('%Y-%m-%d %H:%M:00', $tz->scopeTimeStamp()+60));
            $newModel->save();
        }
        $this->messageManager->addSuccess(__('Schedules Added.'));
        $this->_redirect('cron/*');
    }
}