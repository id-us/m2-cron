<?php


namespace Idus\Cron\Controller\Adminhtml\Items;

class NewAction extends \Idus\Cron\Controller\Adminhtml\Items
{

    public function execute()
    {
        $this->_forward('edit');
    }
}
