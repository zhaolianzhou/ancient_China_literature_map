<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<style>
  /* Prevent the text contents of draggable elements from being selectable. */
  [draggable] {
    -moz-user-select: none;
    -khtml-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    /* Required to make elements draggable in old WebKit */
    -khtml-user-drag: element;
    -webkit-user-drag: element;
  }
  .column {
    height: 150px;
    width: 150px;
    float: left;
    border: 2px solid #666666;
    background-color: #ccc;
    margin-right: 5px;
    -webkit-border-radius: 10px;
    -ms-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 3px #000;
    -ms-box-shadow: inset 0 0 3px #000;
    box-shadow: inset 0 0 3px #000;
    text-align: center;
    cursor: move;
  }
  .column.over {
    border: 2px dashed #000;
  }
  .column header {
    color: #fff;
    text-shadow: #000 0 1px;
    box-shadow: 5px;
    padding: 5px;
    background: -moz-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
    background: -webkit-gradient(linear, left top, right top,
    color-stop(0, rgb(0,0,0)),
    color-stop(0.50, rgb(79,79,79)),
    color-stop(1, rgb(21,21,21)));
    background: -webkit-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
    background: -ms-linear-gradient(left center, rgb(0,0,0), rgb(79,79,79), rgb(21,21,21));
    border-bottom: 1px solid #ddd;
    -webkit-border-top-left-radius: 10px;
    -moz-border-radius-topleft: 10px;
    -ms-border-radius-topleft: 10px;
    border-top-left-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -ms-border-top-right-radius: 10px;
    -moz-border-radius-topright: 10px;
    border-top-right-radius: 10px;
  }

  .tabs {
    width: 100%;
    display: inline-block;
  }

  /*------Tab Links --------*/
  .tab-links:after{
    display:block;
    clear: both;
    content: '';
  }

  .tab-links li {
    margin: 0px 5px;
    float: left;
    list-style: none;
  }

  .tab-links a {
    padding: 9px 15px;
    display: inline-block;
    border-radius: 3px 3px 0px 0px;
    background: #7FB5DA;
    font-size: 16px;
    font-weight: 600;
    color: #4c4c4c;
    transition: all linear 0.15s;
  }

  .tab-links a:hover {
    background: #a7cce5;
    text-decoration: none;
  }

  li.active a, li.active a:hover {
    background: #fff;
    color: #4c4c4c;
  }

  /*--------- Content of Tabs ----------*/
  .tab-content {
    padding: 15px;
    border-radius:3px;
    box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
    background:#fff;
  }

  .tab {
    display:none;
  }

  .tab.active {
    display:block;
  }
</style>
<div class="tabs">
  <ul class="tab-links">
    <li class="active"><a href="#tab1">Drag&Drop</a></li>
    <li><a href="#tab2">Multiple Drags</a></li>
    <li><a href="#tab3">Drag Image</a></li>
    <li><a href="#tab4">Dargging Files</a></li>
  </ul>

  <div class="tab-content">
    <div id="tab1" class="tab active">
      <p>Drag and Drop Test</p>
      <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"
           style="width: 350px; height: 70px; padding: 10px; border: 1px solid #aaaaaa;">
      </div>
      <br>
      <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"
           style="width: 350px; height: 70px; padding: 10px; border: 1px solid #aaaaaa;">
        <p id="drag1" draggable="true" ondragstart="drag(event)" width="336" height="69">
          This is used for text drag and drop.
        </p>
      </div>
    </div>

    <div id="tab2" class="tab active">
      <div id="columns">
        <div class="column" draggable="true"><header>A</header></div>
        <div class="column" draggable="true"><header>B</header></div>
        <div class="column" draggable="true"><header>C</header></div>
        <div class="column" draggable="true"><header>+</header></div>
      </div>
    </div>

    <div id="tab3" class="tab active">
      <?php echo Chtml::image(Yii::app()->request->baseUrl. '/images/bunny.jpg', 'alt 1'); ?>
    </div>

    <div id="tab4" class="tab active">

    </div>
  </div>
</div>


<script>
  function allowDrop(ev) {
    ev.preventDefault();
  }
  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }
  function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
  }


  var dragSrcEl = null;

  function handleDragStart(e) {
    this.style.opacity = '0.4';

    dragSrcEl = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);

  }
  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault();               //Allows us to drop
    }

    e.dataTransfer.dropEffect = 'move';   //See the section on the DataTransfer object

    return false;
  }

  function handleDragEnter(e) {
    this.classList.add('over');
  }
  function handleDragLeave(e) {
    this.classList.remove('over');
  }
  function handleDrop(e) {
    if (e.stopPropagation) {
      e.stopPropagation();   //stop the browser from redirecting
    }

    if (dragSrcEl != this ) {
      dragSrcEl.innerHTML = this.innerHTML;
      this.innerHTML = e.dataTransfer.getData('text/html');
    }
    return false;
  }

  function handleDragEnd(e) {
    [].forEach.call(cols, function (col) {
      col.classList.remove('over');
    })
  }


  var cols = document.querySelectorAll('#columns .column');
  [].forEach.call(cols, function(col) {
    col.addEventListener('dragstart', handleDragStart, false);
    col.addEventListener('dragenter', handleDragEnter, false);
    col.addEventListener('dragover', handleDragOver, false);
    col.addEventListener('dragleave', handleDragLeave, false);
    col.addEventListener('drop', handleDrop, false);
    col.addEventListener('dragend', handleDragEnd, false);
  })

  jQuery(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
      var currentAttrValue = jQuery(this).attr('href');

      // Show/Hide Tabs
      jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

      // Change/remove current tab to active
      jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

      e.preventDefault();
    });
  });
</script>