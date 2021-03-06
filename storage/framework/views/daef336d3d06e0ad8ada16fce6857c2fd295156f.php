<?php $__env->startSection('title','Highlight'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendors/flag-icon/css/flag-icon.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/app-invoice.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption mb-0"><a href="http://prismjs.com/" target="_blank">Prism</a> is a lightweight, extensible
        syntax highlighter, built with modern web standards in mind. It’s a spin-off from Dabblet and is tested there
        daily by thousands.</p>
    </div>
  </div>
  <!-- Prism -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="prism" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Prism</h4>
          <div class="row">
            <div class="col s12">
              <p>Prism is a simple, lightweight, and easy to use syntax highlighter. It is easily customizable and has
                support for some plugins to extend its functionality.</p>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <td>Language</td>
                    <td>Class</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>HTML</td>
                    <td>language-markup</td>
                  </tr>
                  <tr>
                    <td>CSS</td>
                    <td>language-css</td>
                  </tr>
                  <tr>
                    <td>JavaScript</td>
                    <td>language-javascript</td>
                  </tr>
                  <tr>
                    <td>CoffeeScript</td>
                    <td>language-coffeescript</td>
                  </tr>
                  <tr>
                    <td>PHP</td>
                    <td>language-php</td>
                  </tr>
                  <tr>
                    <td>Ruby</td>
                    <td>language-ruby</td>
                  </tr>
                  <tr>
                    <td>Go</td>
                    <td>language-go</td>
                  </tr>
                </tbody>
              </table>
              <p>Here’s a quick example:</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- HTML, XML -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="html-xml" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">HTML, XML</h4>
          <div class="row">
            <div class="col s12">
              <pre class="line-numbers"><code class="language-markup" data-language="markup">
  &lt;?xml version="1.0"?>
  &lt;response value="ok" xml:lang="en">
    &lt;text>Ok&lt;/text>
    &lt;comment html_allowed="true"/>
    &lt;ns1:description>&lt;![CDATA[
    CDATA is &lt;not> magical.
    ]]>&lt;/ns1:description>
    &lt;a>&lt;/a> &lt;a/>
  &lt;/response>
  &lt;!DOCTYPE html>
  &lt;title>Title&lt;/title>
  &lt;style>body {width: 500px;}&lt;/style>
  &lt;script type="application/javascript">
    function $init() {return true;}
  &lt;/script>
  &lt;body>
    &lt;p checked class="title" id='title'>Title&lt;/p>
    &lt;!-- here goes the rest of the page -->
  &lt;/body>
</code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CSS -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="css" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">CSS</h4>
          <div class="row">
            <div class="col s12">
              <pre><code class="language-css" data-language="css">
  @media  screen and (-webkit-min-device-pixel-ratio: 0) {
    body:first-of-type pre::after {
    content: 'highlight: ' attr(class);
    }
    body {
      background: linear-gradient(45deg, blue, red);
    }
  }
  @import  url('print.css');
  @page:right {
    margin: 1cm 2cm 1.3cm 4cm;
  }
  @font-face {
    font-family: Chunkfive; src: url('Chunkfive.otf');
  }
  div.text,
  #content,
  li[lang=ru] {
    font: Tahoma, Chunkfive, sans-serif;
    background: url('hatch.png') /* wtf? */;  color: #F0F0F0 !important;
    width: 100%;
  }
</code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- LESS -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="less" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">LESS</h4>
          <div class="row">
            <div class="col s12">
              <pre><code class="language-css" data-language="css">
  /*
  Using the most minimal language subset to ensure we
  have enough relevance hints for proper Less detection
  */
  @import  "fruits";
  @rhythm: 1.5em;
  @media  screen and (min-resolution: 2dppx) {
      body {font-size: 125%}
  }
  section > .foo + #bar:hover [href*="less"] {
      margin:     @rhythm  0 0 @rhythm;
      padding:    calc(5% + 20px);
      background: #f00ba7 url(http://placehold.alpha-centauri/42.png) no-repeat;
      background-image: linear-gradient(-135deg, wheat, fuchsia) !important ;
      background-blend-mode: multiply;
  }
  @font-face {
      font-family: /* ? */ 'Omega';
      src: url('../fonts/omega-webfont.woff?v=2.0.2');
  }
  .icon-baz::before {
      display:     inline-block;
      font-family: "Omega", Alpha, sans-serif;
      content:     "\f085";
      color:       rgba(98, 76 /* or 54 */, 231, .75);
  }
</code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SCSS -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="scss" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">SCSS</h4>
          <div class="row">
            <div class="col s12">
              <pre><code class="language-css" data-language="css">
  @import "compass/reset";
  // variables
  $colorGreen: #008000;
  $colorGreenDark: darken($colorGreen, 10);
  @mixin container {
      max-width: 980px;
  }
  // mixins with parameters
  @mixin button($color:green) {
      @if($color == green) {
          background-color: #008000;
      }
     @else if ($color == red) {
          background-color: #B22222;
      }
  }
  button {
      @include button(red);
  }
  // nested definitions
  ul {
      width: 100%;
      padding: {
          left: 5px; right: 5px;
      }
    li {
        float: left; margin-right: 10px;
        .home {
            background: url('http://placehold.it/20') scroll no-repeat 0 0;
      }
    }
  }
  .banner {
      @extend .container;
  }
  a {
    color: $colorGreen;
    &:hover { color: $colorGreenDark; }
    &:visited { color: #c458cb; }
  }
  @for $i from 1 through 5 {
      .span#{$i} {
          width: 20px*$i;
      }
  }
  @mixin mobile {
    @media screen and (max-width : 600px) {
      @content;
    }
  }
</code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="javascript" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">JavaScript</h4>
          <div class="row">
            <div class="col s12">
              <pre class="language-javascript"><code class="language-javascript" data-language="javascript">
  import {x, y} as p from 'point';
  const ANSWER = 42;
  class Car extends Vehicle {
    constructor(speed, cost) {
      super(speed);
      var c = Symbol('cost');
      this[c] = cost;
      this.intro = `This is a car runs at
        ${speed}.`;
    }
  }
  for (let num of [1, 2, 3]) {
    console.log(num + 0b111110111);
  }
  function $initHighlight(block, flags) {
    try {
      if (block.className.search(/\bno\-highlight\b/) != -1)
        return processBlock(block.function, true, 0x0F) + ' class=""';
    } catch (e) {
      /* handle exception */
      var e4x =
      &lt;div&gt;Example
      &lt;p&gt;1234&lt;/p&gt;&lt;/div&gt;;
    }
    for (var i = 0 / 2; i &lt; classes.length; i++) { // "0 / 2" should not be parsed as regexp
      if (checkCondition(classes[i]) === undefined)
        return /\d+[\s/]/g;
    }
    console.log(Array.every(classes, Boolean));
  }
  export  $initHighlight;
</code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\extra-components-highlight.blade.php ENDPATH**/ ?>