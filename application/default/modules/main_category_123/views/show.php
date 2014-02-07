<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/bootstrap-wysihtml5.css') ?>"></link>
<?php $title = l((empty($id) ? 'Add %s' : 'Update %s'), array(l(humanize(get_class($CI))))) ?>


<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->_get_uri('listing'), 'title' => l(humanize(get_class($CI)))),
    array('uri' => $CI->uri->uri_string, 'title' => $title),
))
?>

<div class="clearfix"></div>

<form action="<?php echo current_url() ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><?php echo $title ?></legend>
        <div>
            <label class="mandatory">Category Name English</label>
            <input type="text" value="<?php echo set_value('name') ?>" name="name" />
        </div>
        <div>
            <label class="mandatory">Category Name Chinese</label>
            <input type="text" value="<?php echo set_value('name_cn') ?>" name="name_cn" />
        </div>
        <!-- <div>
            <label>Uri</label>
            <input type="text" value="<?php echo set_value('uri') ?>" name="uri" />
        </div> -->
        <div>
            <label>Parent</label>
            <?php echo form_dropdown('parent_id', $cat_options) ?>
        </div>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>