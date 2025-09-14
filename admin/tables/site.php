<?php
defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;

class ArticlepushTableSite extends Table
{
    public function __construct(&$db)
    {
        parent::__construct('#__articlepush_sites', 'id', $db);
    }
}
