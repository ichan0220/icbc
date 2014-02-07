        <div class="detail-article-wrapper">
            <div class="detail-slideshow">
                <div class="divide" style="border-top: 1px solid #C47500;"></div>
                <div class="slideshow">
                     <div id="myCarousel" class="carousel slide">
                      <div class="carousel-inner">
                        <div class="active item"><img class="sliders" src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url() .'data/area/image/original/'. $gallery[0]['file_name'] ?>&w=600&h=320&q=100"></div>
                        <?php for ($i=1;$i<count($gallery);$i++) :?>
                            <div class="item"><img class="sliders" src="<?php echo base_url('timthumb.php?src=')?><?php echo base_url() .'data/area/image/original/'. $gallery[$i]['file_name'] ?>&w=600&h=320&q=100"></div>
                        <?php endfor ?>
                      </div>
                      <a class="carousel-control left " href="#myCarousel" data-slide="prev">
                        <div class="nav-left"></div>
                      </a>
                      <a class="carousel-control right nav-right" href="#myCarousel" data-slide="next">
                        <div class="nav-right"></div>
                      </a>
                    </div>
                </div>
                <div class="divide" style="border-top: 1px solid #C47500;"></div>
            </div>
            <div class="detail-desc">
                <div class="sidebar-detail padder religion-side">
                    <div class="desc areas">
                        <?php if($lang == 'en_us') :?>
                            <h3><?php echo $area_details['title'] ?></h3>
                        <?php else : ?>
                            <h3><?php echo $area_details['title_cn'] ?></h3>
                        <?php endif ?>
                    </div>
                    <div id="scroll" class="antiscroll-wrap">
                        <div class="detail-wrap">
                            <div class="list-culture antiscroll-inner detail-cul">
                                <ul class="thumbnail-culture">
                                    <li>
                                        <p>
                                            <?php
                                            if($lang == 'en_us'){
                                                echo $area_details['description'];
                                            }else{
                                                echo $area_details['description_cn'];
                                            }
                                            ?>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="nav-article">
                    <?php if(!empty($prev_article)) :?>
                    <div class="next-article">
                        <a href="<?php echo site_url('area/view') . '/' . rawurlencode(@$prev_article['cat_name']) . '/' . @$prev_article['id'] ?>" style="color: #C47500"><?php echo "< " . @$prev_article['title'] ?></a>
                    </div>
                    <?php endif ?>
                    <?php if(!empty($next_article)) :?>
                    <div class="prev-article">
                        <a href="<?php echo site_url('area/view') . '/' . rawurlencode(@$next_article['cat_name']) . '/' . @$next_article['id'] ?>" style="color: #C47500"><?php echo "> " . @$next_article['title'] ?></a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="background" data-small-src="<?php echo base_url() ?>themes/icbc/img/bg_white_small.png" data-large-src="<?php echo base_url() ?>themes/icbc/img/bg_white_large.png" /></div>