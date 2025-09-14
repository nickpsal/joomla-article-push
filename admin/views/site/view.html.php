<?php
defined('_JEXEC') or die;

class ArticlepushViewSite extends JViewLegacy
{
    protected $item;
    protected $form;

    public function display($tpl = null)
    {
        $this->item = $this->get('Item');
        $this->form = $this->get('Form');

        // Joomla behaviors για validation & keepalive
        JHtml::_('behavior.formvalidator');
        JHtml::_('behavior.keepalive');

        $this->addToolbar();

        parent::display($tpl);
    }

    protected function addToolbar()
    {
        $isNew = empty($this->item) || empty($this->item->id);

        JToolbarHelper::title($isNew ? 'New Remote Site' : 'Edit Remote Site', 'pencil');
        JToolbarHelper::apply('site.apply');
        JToolbarHelper::save('site.save');
        JToolbarHelper::cancel('site.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
}
