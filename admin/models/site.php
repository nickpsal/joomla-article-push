<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Factory;
use Joomla\CMS\Crypt\Crypt;
use Joomla\CMS\Crypt\Key;
use Joomla\CMS\Table\Table;

class ArticlepushModelSite extends AdminModel
{
    public function getTable($type = 'Sites', $prefix = 'ArticlepushTable', $config = [])
    {
        return Table::getInstance($type, $prefix, $config);
    }

    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm('com_articlepush.site', 'site', [
            'control'   => 'jform',
            'load_data' => $loadData
        ]);

        return $form;
    }

    protected function loadFormData()
    {
        $data = Factory::getApplication()->getUserState(
            'com_articlepush.edit.site.data',
            []
        );

        if (empty($data)) {
            $data = $this->getItem();

            if (!empty($data->api_password)) {
                try {
                    $crypt = new Crypt;
                    $key   = new Key('simple', Factory::getConfig()->get('secret'), 'encrypt');
                    $data->api_password = $crypt->decrypt($data->api_password, $key);
                } catch (\RuntimeException $e) {
                    // Αν αποτύχει το decrypt, κράτα το όπως είναι για να μην σκάσει το edit view
                    $data->api_password = '';
                }
            }
        }

        return $data;
    }

    // public function save($data)
    // {
    //     if (!empty($data['api_password'])) {
    //         $crypt = new Crypt;
    //         $key   = new Key('simple', Factory::getConfig()->get('secret'), 'encrypt');
    //         $data['api_password'] = $crypt->encrypt($data['api_password'], $key);
    //     }

    //     return parent::save($data);
    // }

    public function save($data)
    {
        \Joomla\CMS\Factory::getApplication()->enqueueMessage('DEBUG: ID = ' . ($data['id'] ?? 'NULL'), 'notice');
        if (empty($data['api_password']) && !empty($data['id'])) {
            $old = $this->getItem($data['id']);
            $data['api_password'] = $old->api_password; // Ήδη κρυπτογραφημένο
        } else {
            // Κρυπτογράφηση νέου password
            if (!empty($data['api_password'])) {
                $crypt = new Crypt;
                $key   = new Key('simple', Factory::getConfig()->get('secret'), 'encrypt');
                $data['api_password'] = $crypt->encrypt($data['api_password'], $key);
            }
        }

        return parent::save($data);
    }
}
