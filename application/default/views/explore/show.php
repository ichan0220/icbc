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
                <label class="mandatory"><?php echo l('Explorer Category') ?></label>
                <?php echo form_dropdown('explorer_category_id', $explorer_options) ?>
            </div>
            <div>
                <label class="mandatory"><?php echo l('Legend Category') ?></label>
                <input type="text" value="<?php echo set_value('legend_category') ?>" name="legend_category"  style="margin: 0 auto;" data-provide="typeahead" data-source='<?php echo $category ?>' autocomplete="off" placeholder="Legend Category">
            </div>
            <div>
                <label class="mandatory"><?php echo l('Legend Name') ?></label>
                <input type="text" value="<?php echo set_value('legend_name') ?>" name="legend_name" placeholder="Legend Name" />
            </div>
            <div>
                <label class="mandatory"><?php echo l('Position') ?></label>
                <input id="position" type="text" value="<?php echo set_value('position') ?>" name="position" placeholder="Position" />
            </div>
            <div>
                <?php echo $map['js']; ?>
                <?php echo $map['html']; ?>
            </div>
        </fieldset>
        <div class="action-buttons btn-group">
            <input type="submit" />
            <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
        </div>
    </form>