<script type="text/javascript">
    function addMarker(newLat, newLng){
        position = newLat+','+newLng;
        $('#position').val(position);
    }
</script>
<?php $title = l((empty($id) ? 'Add %s' : 'Edit %s'), array(l(humanize(get_class($CI))))) ?>

<?php
echo $this->admin_panel->breadcrumb(array(
    array('uri' => $CI->_get_uri($CI->uri->rsegments[2]), 'title' => l(humanize(get_class($CI)))),
    array('uri' => $CI->uri->uri_string, 'title' => $title),
))
?>

<div class="clearfix"></div>

<form enctype="multipart/form-data" action="<?php echo current_url() ?>" method="post" class="ajaxform">
    <fieldset>
        <legend><?php echo $title ?></legend>
        <div>
            <label class="mandatory"><?php echo l('Main Category') ?></label>
            <?php echo form_dropdown('main_category_id', $main_category_options) ?>
        </div>
        <div>
            <label class="mandatory"><?php echo l('Sub Category') ?></label>
            <input type="text" value="<?php echo set_value('sub_category') ?>" name="sub_category" placeholder="Sub Category" />
        </div>
        <div>
            <label class="mandatory"><?php echo l('Sub Category (Chinese)') ?></label>
            <input type="text" value="<?php echo set_value('sub_category_cn') ?>" name="sub_category_cn" placeholder="Sub Category Chinese" />
        </div>
        <div>
            <label class="mandatory"><?php echo l('Position') ?></label>
            <input id="position" type="text" value="<?php echo set_value('position') ?>" name="position" placeholder="Position" />
        </div>
        <?php echo $map['js']; ?>
        <?php echo $map['html']; ?>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>