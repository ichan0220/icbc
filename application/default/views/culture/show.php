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
            <legend><?php echo l('Category') ?></legend>
            <div>
                <label class="mandatory"><?php echo l('Category') ?></label>
                <?php echo form_dropdown('category_id', $category_options) ?>
            </div>
        </fieldset>
        <fieldset>
            <legend><?php echo $title ?> English</legend>
            <div>
                <label class="mandatory"><?php echo l('Title') ?></label>
                <input type="text" value="<?php echo set_value('title') ?>" name="title" placeholder="Title" />
            </div>
            <label class="mandatory"><?php echo l('Description') ?></label>
            <div>
                <textarea class="ckeditor" name="description" placeholder="Description" /><?php echo set_value('description') ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend><?php echo $title ?> Chinese</legend>
            <!-- <div>
                <label class="mandatory"><?php echo l('Category') ?></label>
                <?php echo form_dropdown('category_id', $category_options) ?>
            </div> -->
            <div>
                <label class="mandatory"><?php echo l('Title') ?></label>
                <input type="text" value="<?php echo set_value('title_cn') ?>" name="title_cn" placeholder="Title" />
            </div>
            <label class="mandatory"><?php echo l('Description') ?></label>
            <div>
                <textarea class="ckeditor" name="description_cn" placeholder="Description" /><?php echo set_value('description_cn') ?></textarea>
            </div>
        </fieldset>
        <fieldset>
           <legend>Image News</legend>
           <div>
               <label>Add Image</label>
               <input type="file" multiple="multiple" value="<?php echo set_value('image') ?>" name="image[]"/>
               <br /><span>Press Ctrl for select multiple file</span>
           </div>
           <?php if(isset($id)): ?>
           <div>
                <?php foreach ($images as $key => $img) :?>
                    <div class="thumbs thumbnail">
                        <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/culture/image/original') . '/' . $img['file_name'] ?>&w=100&h=100" alt=""/>
                        <a class="btn" href="<?php echo site_url($CI->_get_uri('delete_image') . '/' . $id ) .'/'. $img['id'] ?>" >
                            <?php echo l('Delete') ?>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        </fieldset>
        <div class="action-buttons btn-group">
            <input type="submit" />
            <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
        </div>
    </form>




















