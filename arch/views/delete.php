<?php echo $this->admin_panel->breadcrumb(array(
array( 'uri' => $CI->_get_uri('listing'), 'title' => humanize(get_class($CI)) ),
array( 'uri' => $CI->uri->uri_string, 'title' => 'Delete record'),
)) ?>
<div class="clearfix"></div>

<fieldset>
    <legend><?php echo l('Confirmation') ?></legend>

    <div>
        <span><?php if (count($ids) > 1): ?>
       <?php echo l('Are you sure want to <strong style="color:#c00">delete</strong> %s records' , array(count($ids))) ?>?
        <?php else: ?>
       <?php echo l('Are you sure want to <strong style="color:#c00">delete</strong> %s' , $row_name) ?>?
        <?php endif ?></span>
    </div>
</fieldset>

<div class="action-buttons btn-group">
    <a href="<?php echo site_url($CI->_get_uri('delete').'/'.$id.'?confirmed=1') ?>" class="btn"><?php echo l('OK') ?></a>
    <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
</div>