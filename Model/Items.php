<?php


namespace Idus\Cron\Model;

class Items extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Idus\Cron\Model\Resource\Items');
    }
}
