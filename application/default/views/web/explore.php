<!--<script type="text/javascript">
        var windowWidth = $(window).width(); //retrieve current window width
        var windowHeight = $(window).height();

        $(".slider").attr("src","<?php echo base_url('timthumb.php?src=')?><?php echo base_url('themes/icbc/img/bali.png') ?>&w=" + windowWidth  + "&h=" + windowHeight  + "&q=100");
  </script>-->
  <div class="maps">
      <img class="sliders" src="<?php echo base_url('themes/icbc/img/bali.png') ?>">
  </div>
  <div class="sidebar-explore padder">
      <div class="explore">
          <div class="accordion" id="accordion2">
              <div class="accordion-group area0">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-parent="#accordion2" href="<?php echo site_url('explore/bali') ?>">
                      >&nbsp; <?php echo l('ALL BALI') ?>
                    </a>
                  </div>
              </div>
              <div class="accordion-group area1">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                      >&nbsp; <?php echo l('SOUTH BALI') ?>
                    </a>
                  </div>
                  <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <a href="<?php echo site_url('explore/bali/south%20bali') ?>"><h4><?php echo l('SOUTH BALI') ?></h4></a>
                      <?php foreach($south_bali as $value): ?>
                        <a href="<?php echo site_url('explore/detail_bali/'. rawurlencode('south bali') . '/' . rawurlencode(strtolower($value['sub_category']))) ?>">
                          <?php if($lang == 'en_us') :?>
                          <p><h5><?php echo $value['sub_category'] ?></h5></p>
                          <?php else : ?>
                          <p><h5><?php echo $value['sub_category_cn'] ?></h5></p>
                          <?php endif ?>
                        </a>
                      <?php endforeach; ?>
                    </div>
                  </div>
              </div>
              <div class="accordion-group area2">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                      >&nbsp; <?php echo l('SOUTHWEST COAST') ?>
                    </a>
                  </div>
                  <div id="collapseThree" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <a href="<?php echo site_url('explore/bali/south%20west%20coast') ?>"><h4><?php echo l('SOUTHWEST COAST') ?></h4></a>
                      <?php foreach($southwest_coast as $value): ?>
                        <a href="<?php echo site_url('explore/detail_bali/'. rawurlencode('south west coast') . '/' . rawurlencode(strtolower($value['sub_category']))) ?>">
                          <?php if($lang == 'en_us') :?>
                          <p><h5><?php echo $value['sub_category'] ?></h5></p>
                          <?php else : ?>
                          <p><h5><?php echo $value['sub_category_cn'] ?></h5></p>
                          <?php endif ?>
                        </a>
                      <?php endforeach; ?>
                    </div>
                  </div>
              </div>
              <div class="accordion-group area3">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                      >&nbsp; <?php echo l('EAST COAST') ?>
                    </a>
                  </div>
                  <div id="collapseFour" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <a href="<?php echo site_url('explore/bali/east%20cost') ?>"><h4><?php echo l('EAST COAST') ?></h4></a>
                      <?php foreach($east_cost as $value): ?>
                        <a href="<?php echo site_url('explore/detail_bali/'. rawurlencode('east cost') . '/' . rawurlencode(strtolower($value['sub_category']))) ?>">
                          <?php if($lang == 'en_us') :?>
                          <p><h5><?php echo $value['sub_category'] ?></h5></p>
                          <?php else : ?>
                          <p><h5><?php echo $value['sub_category_cn'] ?></h5></p>
                          <?php endif ?>
                        </a>
                      <?php endforeach; ?>
                    </div>
                  </div>
              </div>
              <div class="accordion-group area4">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                      >&nbsp; <?php echo l('CENTRAL BALI') ?>
                    </a>
                  </div>
                  <div id="collapseFive" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <a href="<?php echo site_url('explore/bali/central%20bali') ?>"><h4><?php echo l('CENTRAL BALI') ?></h4></a>
                      <?php foreach($central_bali as $value): ?>
                        <a href="<?php echo site_url('explore/detail_bali/'. rawurlencode('central bali') . '/' . rawurlencode(strtolower($value['sub_category']))) ?>">
                          <?php if($lang == 'en_us') :?>
                          <p><h5><?php echo $value['sub_category'] ?></h5></p>
                          <?php else : ?>
                          <p><h5><?php echo $value['sub_category_cn'] ?></h5></p>
                          <?php endif ?>
                        </a>
                      <?php endforeach; ?>
                    </div>
                  </div>
              </div>
              <div class="accordion-group area5">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                      >&nbsp; <?php echo l('NORTH AND NORTWEST BALI') ?>
                    </a>
                  </div>
                  <div id="collapseSix" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <a href="<?php echo site_url('explore/bali/north%20and%20northwest%20bali') ?>"><h4><?php echo l('NORTH AND NORTWEST BALI') ?></h4></a>
                      <?php foreach($north_bali as $value): ?>
                        <a href="<?php echo site_url('explore/detail_bali/'. rawurlencode('north and northwest bali') . '/' . rawurlencode(strtolower($value['sub_category']))) ?>">
                          <?php if($lang == 'en_us') :?>
                          <p><h5><?php echo $value['sub_category'] ?></h5></p>
                          <?php else : ?>
                          <p><h5><?php echo $value['sub_category_cn'] ?></h5></p>
                          <?php endif ?>
                        </a>
                      <?php endforeach; ?>
                    </div>
                  </div>
              </div>
              <div class="accordion-group area6">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
                      >&nbsp; <?php echo l('THE ISLANDS') ?>
                    </a>
                  </div>
                  <div id="collapseSeven" class="accordion-body collapse">
                    <div class="accordion-inner">
                      <a href="<?php echo site_url('explore/bali/the%20islands') ?>"><h4><?php echo l('THE ISLANDS') ?></h4></a>
                      <?php foreach($the_islands as $value): ?>
                        <a href="<?php echo site_url('explore/detail_bali/'. rawurlencode('the islands') . '/' . rawurlencode(strtolower($value['sub_category']))) ?>">
                          <?php if($lang == 'en_us') :?>
                          <p><h5><?php echo $value['sub_category'] ?></h5></p>
                          <?php else : ?>
                          <p><h5><?php echo $value['sub_category_cn'] ?></h5></p>
                          <?php endif ?>
                        </a>
                      <?php endforeach; ?>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="info-maps" style="color: red; display: none; position: absolute; text-align: center;margin: auto;width: 100%;top: 50%;font-size: 20px;font-weight: bold;">
      <p><?php echo l('Please visit the full site') ?></p>
  </div>

<div id="background-map" class="background background-mobile" data-small-src="<?php echo base_url() ?>themes/icbc/img/explore-small.png" data-large-src="<?php echo base_url() ?>themes/icbc/img/explore-large.png" /></div>

