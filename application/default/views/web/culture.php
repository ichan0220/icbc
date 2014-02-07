        <div class="sidebar padder">
            <div class="sidebar-category">
                <ul class="menu nav flat">
                    <li class="has-children dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" role="menu" href="#">
                            <?php if(empty($this->uri->rsegments[3])) : ?>
                                <?php echo l('ALL') ?>
                            <?php else :?>
                                <?php echo l(rawurldecode(strtoupper($this->uri->rsegments[3]))); ?>
                            <?php endif ?>
                         </a>
                         <ul class="menu dropdown-menu side-down">
                            <li><a href="<?php echo site_url() .'/web/culture/'?>" style="color: white"><?php echo l('ALL') ?></a></li>
                            <?php if($lang == 'en_us'): ?>
                                <?php foreach ($culture_cat as $key => $cat) :?>
                                    <li><a href="<?php echo site_url() .'/web/culture/' . rawurlencode(strtolower($cat['name'])) ?>" style="color: white"><?php echo l(rawurldecode($cat['name'])) ?></a></li>
                                <?php endforeach ?>
                            <?php else: ?>
                                <?php foreach ($culture_cat as $key => $cat) :?>
                                    <li><a href="<?php echo site_url() .'/web/culture/' . rawurlencode(strtolower($cat['name'])) ?>" style="color: white"><?php echo l(rawurldecode($cat['name_cn'])) ?></a></li>
                                <?php endforeach ?>
                            <?php endif ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="scroll" class="antiscroll-wrap" style="width: 100%;">
                <div class="inner-wrap">
                    <div class="list-culture cul-thumb antiscroll-inner detail-cul">
                        <ul class="thumbnail-culture">
                            <?php foreach ($culture as $key => $cul) :?>
                            <li>
                                <a href="<?php echo site_url('culture/view') . '/' . rawurlencode($cul['cat_name']) . '/' . $cul['id'] ?>" style="color: red">
                                    <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url() . 'data/culture/image/original/' . $cul['file_name']?>&w=230&h=100&q=100"/>
                                    <div class="key">
                                        <!-- <p><?php echo $key+1 ?>.</p> -->
                                        <?php if($lang == 'en_us'): ?>
                                            <p><?php echo humanize($cul['title']) ?></p>
                                        <?php else :?>
                                            <p><?php echo humanize($cul['title_cn']) ?></p>
                                        <?php endif ?>
                                    </div>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="background background-mobile" data-small-src="<?php echo base_url() ?>themes/icbc/img/culture_small.jpeg" data-large-src="<?php echo base_url() ?>themes/icbc/img/culture_large.jpeg" /></div>