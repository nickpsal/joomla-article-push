<?php defined('_JEXEC') or die; ?>
<form action="<?php echo JRoute::_('index.php?option=com_articlepush&layout=edit&id=' . (int) ($this->item->id ?? 0)); ?>"
      method="post"
      name="adminForm"
      id="adminForm"
      class="form-validate">
    <?php foreach ($this->form->getFieldset() as $field) : ?>
        <div class="control-group">
            <div class="control-label"><?php echo $field->label; ?></div>
            <div class="controls"><?php echo $field->input; ?></div>
        </div>
    <?php endforeach; ?>
    <input type="hidden" name="jform[id]" value="<?php echo (int) $this->item->id; ?>">
    <input type="hidden" name="task" value="">
    <?php echo JHtml::_('form.token'); ?>
</form>

