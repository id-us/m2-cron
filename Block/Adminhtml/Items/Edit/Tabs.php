<?php
/**
 * Copyright © 2015 Idus. All rights reserved.
 */
namespace Idus\Cron\Block\Adminhtml\Items\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('idus_cron_items_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Schedule List'));
    }
}
