<?php
/**
 * Created by PhpStorm.
 * User: Zhaolian
 * Date: 22/12/2017
 * Time: 9:27 AM
 */
?>
<style>

  .drop_areas {
    height: inherit;
    min-height: 500px;
    border: 2px solid #666666;
    border-radius: 10px;
  }
  .drag_container {
    background: #7FB5DA;
    padding: 15px;
    border-radius: 10px;
  }
</style>
<div class="container ">
    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-7 drop_container">
        <div class="box drop_areas" id="drop_pad" draggable="true">
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 columns drag_container">
        <div class="tabs">
          <ul class="tab-links">
            <li class="active"><a href="#tabA">Tables</a></li>
            <li><a href="#tabB">Data Points</a></li>
          </ul>
          <div class="tab-content" style="height: inherit;">
            <div id="tabA" class="tab active" draggable="true" style="min-height: 500px;">
                <?php foreach ($tables as $tb){ ?>
                  <div class="column" draggable="true" style="color:red;">
                      <?php echo $tb->name; ?>
                  </div>
                <?php }?>
            </div>
            <div id="tabB" class="tab" >
                <?php
                  foreach ($columns as $dp) {?>
                  <div class="column" draggable="true" >
                      <?php echo  $dp; ?>
                  </div>
                <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
</script>