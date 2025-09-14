<?php defined('_JEXEC') or die; ?>

<form action="<?php echo JRoute::_('index.php?option=com_articlepush&view=sites'); ?>"
      method="post" name="adminForm" id="adminForm">

    <h1>Remote Sites</h1>

    <?php if (!empty($this->items)) : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="1%"><?php echo JText::_('ID'); ?></th>
                    <th><?php echo JText::_('Site Name'); ?></th>
                    <th><?php echo JText::_('API URL'); ?></th>
                    <th><?php echo JText::_('Username'); ?></th>
                    <th><?php echo JText::_('Created'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $item): ?>
                    <tr>
                        <td><?php echo (int)$item->id; ?></td>
                        <td><?php echo $this->escape($item->site_name); ?></td>
                        <td><?php echo $this->escape($item->api_url); ?></td>
                        <td><?php echo $this->escape($item->api_username); ?></td>
                        <td><?php echo $item->created; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo $this->pagination->getListFooter(); ?>
    <?php else : ?>
        <p>No sites found.</p>
    <?php endif; ?>

    <input type="hidden" name="task" value="">
    <?php echo JHtml::_('form.token'); ?>
</form>
