<?php


namespace Idus\Cron\Model;

class Cron extends \Magento\Framework\Model\AbstractModel
{

    /*
     * Just return so that is flags the job as successfull
     */

    public function checkCron(){
        return $this;
    }
}