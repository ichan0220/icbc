        <div class="sidebar padder">
            <div class="sidebar-category">
                <ul class="menu nav flat">
                    <li class="has-children dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" role="menu" href="#">
                            <?php if(empty($this->uri->rsegments[3])) : ?>
                                <?php echo l('AREAS') ?>
                            <?php else :?>
                                <?php echo l(rawurldecode(strtoupper($this->uri->rsegments[3]))); ?>
                            <?php endif ?>
                        </a>
                         <ul class="menu dropdown-menu side-down areas-down">
                            <!-- <li class="area0"><a href="<?php echo site_url() .'/web/areas/'?>" style="color: white">ALL</a></li> -->
                            <?php foreach ($area_cat as $key => $cat) :?>
                            <?php if($lang == 'en_us') :?>
                                <li class="area<?php echo $key+1 ?>  "><a href="<?php echo site_url() .'/web/areas/' . rawurlencode(strtolower($cat['name'])) ?>" style="color: white"><?php echo rawurldecode($cat['name']) ?></a></li>
                            <?php else : ?>
                                <li class="area<?php echo $key+1 ?>  "><a href="<?php echo site_url() .'/web/areas/' . rawurlencode(strtolower($cat['name'])) ?>" style="color: white"><?php echo rawurldecode($cat['name_cn']) ?></a></li>
                            <?php endif ?>
                            <?php endforeach ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="scroll" class="antiscroll-wrap" style="width: 100%;">
                <div class="inner-wrap">
                    <div class="list-culture area-thumb antiscroll-inner detail-cul">
                        <ul class="thumbnail-culture">
                            <?php foreach ($area as $key => $ar) :?>
                                <li>
                                    <a href="<?php echo site_url('area/view') . '/' . rawurlencode($ar['cat_name']) . '/' . $ar['id'] ?>" style="color: red">
                                        <img src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url('data/area/image/original') ?>/<?php echo $ar['file_name'] ?>&w=230&h=100&q=100"/>
                                    <div class="key">
                                        <!-- <p><?php echo $key+1 ?>.</p> -->
                                        <?php if($lang == 'en_us') :?>
                                            <p><?php echo $ar['title'] ?></p>
                                        <?php else : ?>
                                            <p><?php echo $ar['title_cn'] ?></p>
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
        <div class="background background-mobile" data-small-src="<?php echo base_url() ?>themes/icbc/img/area-small.jpg" data-large-src="<?php echo base_url() ?>themes/icbc/img/area-large.jpg" /></div>