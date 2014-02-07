<script type="text/javascript" src="<?php echo theme_url('js/ckeditor/ckeditor.js') ?>"></script>
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
            <legend><?php echo $title ?> English</legend>
            <label class="mandatory"><?php echo l('Contact') ?></label>
            <div>
                <textarea class="ckeditor" name="contact" placeholder="Contact" /><?php echo set_value('contact') ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend><?php echo $title ?> Chinese</legend>
            <label class="mandatory"><?php echo l('Contact (Chinese)') ?></label>
            <div>
                <textarea class="ckeditor" name="contact_cn" placeholder="Contact" /><?php echo set_value('contact_cn') ?></textarea>
            </div>
        </fieldset>

        <div class="action-buttons btn-group">
            <input type="submit" />
            <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
        </div>
    </form>




















