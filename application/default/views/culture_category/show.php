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
        <div>
            <label class="mandatory"><?php echo l('Name') ?></label>
            <input type="text" value="<?php echo set_value('name') ?>" name="name" placeholder="Name" />
        </div>
        <label class="mandatory"><?php echo l('Description') ?></label>
        <div>
            <textarea class="ckeditor" name="description" placeholder="Description" /><?php echo set_value('description') ?></textarea>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo $title ?> Chinese</legend>
        <div>
            <label class="mandatory"><?php echo l('Name') ?></label>
            <input type="text" value="<?php echo set_value('name_cn') ?>" name="name_cn" placeholder="<?php echo l('Name') ?>" />
        </div>
        <label class="mandatory"><?php echo l('Description') ?></label>
        <div>
            <textarea class="ckeditor" name="description_cn" placeholder="<?php echo l('Description') ?>" /><?php echo set_value('description_cn') ?></textarea>
        </div>
    </fieldset>
    <!-- <fieldset>
           <legend>Image Background</legend>
           <div>
               <label>Add Image</label>
               <input type="file" value="<?php echo set_value('image') ?>" name="image"/>
               <br /><span>Press Ctrl for select multiple file</span>
           </div>
           <?php if(isset($id) && $image['file_name']): ?>
           <div>
              <div class="thumbs thumbnail">
                  <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/culture_category/image/original') . '/' . $image['file_name'] ?>&w=100&h=100" alt=""/>
                  <a class="btn" href="<?php echo site_url($CI->_get_uri('delete_image') . '/' . $id ) .'/'. $image['id'] ?>" >
                      <?php echo l('Delete') ?>
                  </a>
              </div>
            </div>
        <?php endif ?>
        </fieldset> -->
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>