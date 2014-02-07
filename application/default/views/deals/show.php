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
          <legend><?php echo l('Area') ?></legend>
          <div>
              <label class="mandatory"><?php echo l('Deals Area') ?></label>
              <?php echo form_dropdown('deals_area', $area_options) ?>
          </div>
          <div>
              <label class="mandatory"><?php echo l('Deals Category') ?></label>
              <?php echo form_dropdown('deals_category', $deals_categorys) ?>
              <!-- <input type="text" value="<?php echo set_value('deals_category') ?>" name="deals_category" placeholder="Deals Category" /> -->
          </div>
          <div>
              <label class="mandatory"><?php echo l('Map Position') ?></label>
              <input type="text" value="<?php echo set_value('map_position') ?>" name="map_position" placeholder="Map Position" />
          </div>
      <fieldset>
          <legend><?php echo $title ?> English</legend>
          <div>
              <label class="mandatory"><?php echo l('Deals Name') ?></label>
              <input type="text" value="<?php echo set_value('deals_name') ?>" name="deals_name" placeholder="Deals Name" />
          </div>
          <div>
              <label class="mandatory"><?php echo l('Deals Place') ?></label>
              <input type="text" value="<?php echo set_value('deals_place') ?>" name="deals_place" placeholder="Deals Place" />
          </div>
          <div>
              <label class="mandatory"><?php echo l('Deals Item') ?></label>
              <input type="text" value="<?php echo set_value('deals_item') ?>" name="deals_item" placeholder="Deals Item" />
          </div>
          <div>
              <label class="mandatory"><?php echo l('Deals Comment') ?></label>
              <input type="text" value="<?php echo set_value('deals_comment') ?>" name="deals_comment" placeholder="Deals Comment" />
          </div>
          <label class="mandatory"><?php echo l('Address') ?></label>
          <div>
              <textarea class="ckeditor" name="address" placeholder="Address" /><?php echo set_value('address') ?></textarea>
          </div>
          <label class="mandatory"><?php echo l('Deals Description') ?></label>
          <div>
              <textarea class="ckeditor" name="deals_description" placeholder="Deals Description" /><?php echo set_value('deals_description') ?></textarea>
          </div>
      </fieldset>
      <fieldset>
          <legend><?php echo $title ?> Chinese</legend>
          <div>
              <label class="mandatory"><?php echo l('Deals Name') ?></label>
              <input type="text" value="<?php echo set_value('deals_name_cn') ?>" name="deals_name_cn" placeholder="Deals Name" />
          </div>
          <div>
              <label class="mandatory"><?php echo l('Deals Place') ?></label>
              <input type="text" value="<?php echo set_value('deals_place_cn') ?>" name="deals_place_cn" placeholder="Deals Place" />
          </div>
          <div>
              <label class="mandatory"><?php echo l('Deals Item') ?></label>
              <input type="text" value="<?php echo set_value('deals_item_cn') ?>" name="deals_item_cn" placeholder="Deals Item" />
          </div>
          <div>
              <label class="mandatory"><?php echo l('Deals Comment') ?></label>
              <input type="text" value="<?php echo set_value('deals_comment_cn') ?>" name="deals_comment_cn" placeholder="Deals Comment" />
          </div>
          <label class="mandatory"><?php echo l('Address') ?></label>
          <div>
              <textarea class="ckeditor" name="address_cn" placeholder="Address" /><?php echo set_value('address_cn') ?></textarea>
          </div>
          <label class="mandatory"><?php echo l('Deals Description') ?></label>
          <div>
              <textarea class="ckeditor" name="deals_description_cn" placeholder="Deals Description" /><?php echo set_value('deals_description_cn') ?></textarea>
          </div>
      </fieldset>
    </fieldset>
    <fieldset>
           <legend><?php echo l('Upload Image') ?></legend>
             <!-- <div>
                 <label><?php echo l('Deals Icon') ?></label>x
                  <?php if(empty($images['deals_icon'])): ?>
                    <input type="file" value="<?php echo set_value('deals_icon') ?>" name="deals_image[]"/>
                  <?php endif ?>
             </div>
           <?php if(isset($id)): ?>
           <div>
            <?php if(!empty($images['deals_icon'])): ?>
              <div class="thumbs thumbnail">
                  <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/deals/image/original') . '/' . $images['deals_icon'] ?>&w=100&h=100" alt=""/>
                 <a class="btn" href="<?php echo site_url($CI->_get_uri('delete_deals_icon') . '/' . $id ) ?>" >
                      <?php echo l('Delete') ?>
                  </a>
              </div>
              <?php endif ?>
            </div>
            <?php endif ?>
          <div style="border: 1px solid #fff"></div> -->
           <div>
               <label><?php echo l('Deals Thumbs') ?></label>
                <?php if(empty($images['deals_thumb'])): ?>
                  <input type="file" value="<?php echo set_value('deals_thumb') ?>" name="deals_image[]"/>
                <?php endif ?>
           </div>
           <?php if(isset($id)): ?>
           <div>
            <?php if(!empty($images['deals_thumb'])): ?>
              <div class="thumbs thumbnail">
                  <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/deals/image/original') . '/' . $images['deals_thumb'] ?>&w=100&h=100" alt=""/>
                 <a class="btn" href="<?php echo site_url($CI->_get_uri('delete_deals_thumb') . '/' . $id ) ?>" >
                      <?php echo l('Delete') ?>
                  </a>
              </div>
            <?php endif ?>
            </div>
            <?php endif ?>
    </fieldset>
    <div class="action-buttons btn-group">
        <input type="submit" />
        <a href="<?php echo site_url($CI->_get_uri('listing')) ?>" class="btn cancel"><?php echo l('Cancel') ?></a>
    </div>
</form>