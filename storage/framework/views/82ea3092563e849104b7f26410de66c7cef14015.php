<?php $__env->startSection('title','Cards Basic'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/cards-basic.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!--Basic Card-->
<div class="card">
  <div class="card-content">
    <h4 class="card-title">Basic Cards</h4>
    <p>Basic card good at containing small bits of information.</p>
    <div class="row">
      <div class="row">
        <div class="col s12 m6 l6">
          <div class="card light-blue">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>
                I am a very simple card with solid background & link. I am good at
                containing small bits of
                information. I am convenient because I require little markup to use
                effectively.
              </p>
            </div>
            <div class="card-action">
              <a href="#!" class="lime-text text-accent-1">This is a link</a>
              <a href="#!" class="lime-text text-accent-1">This is a link</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l6">
          <div class="card gradient-45deg-light-blue-cyan gradient-shadow">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>
                I am a very simple card with gradient background & button. I am good at
                containing small bits
                of
                information. I am convenient because I require little markup to use
                effectively.
              </p>
            </div>
            <div class="card-action">
              <a href="#!" class="waves-effect waves-light btn gradient-45deg-red-pink">Button</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="divider mt-2"></div>

<!--Image Card-->
<div id="image-card" class="section">
  <h4 class="header">Image Card</h4>
  <p>Here is the standard card with an image thumbnail.</p>
  <div class="row">
    <div class="col s12 m6 l6">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo e(asset('images/gallery/4.png')); ?>" alt="sample" /> <span class="card-title">Card
            Title</span>
        </div>
        <div class="card-content">
          <p>
            I am a very simple card with link. I am good at containing small bits of
            information. I am convenient
            because I require little markup to use effectively.
          </p>
        </div>
        <div class="card-action"><a href="#">This is a link</a> <a href="#">This is a link</a></div>
      </div>
    </div>
    <div class="col s12 m6 l6">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo e(asset('images/gallery/3.png')); ?>" alt="sample" /> <span class="card-title">Card
            Title</span>
        </div>
        <div class="card-content">
          <p>
            I am a very simple card with button. I am good at containing small bits of
            information. I am
            convenient
            because I require little markup to use effectively.
          </p>
        </div>
        <div class="card-action">
          <a href="#!" class="waves-effect waves-light btn gradient-45deg-red-pink">Button</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="divider mt-2"></div>

<!-- FABs in Cards -->
<div id="fabs-card" class="section">
  <h4 class="header">FABs in Cards</h4>
  <p>Here is an image card with a Floating Action Button.</p>
  <div class="row">
    <div class="col s12 m6 l6">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo e(asset('images/gallery/6.png')); ?>" alt="" /> <span class="card-title">Card
            Title</span>
          <a class="btn-floating halfway-fab waves-effect waves-light red"> <i class="material-icons">add</i>
          </a>
        </div>
        <div class="card-content">
          <p>
            I am a very simple card with small size solid color fab button. I am good at
            containing small bits of
            information. I am convenient because I require little markup to use effectively.
          </p>
        </div>
      </div>
    </div>
    <div class="col s12 m6 l6">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo e(asset('images/gallery/8.png')); ?>" alt="" /> <span class="card-title">Card
            Title</span>
          <a
            class="btn-floating btn-large halfway-fab waves-effect waves-light gradient-45deg-red-pink gradient-shadow">
            <i class="material-icons">add</i>
          </a>
        </div>
        <div class="card-content">
          <p>
            I am a very simple card with large size gradient color fab button. I am good at
            containing small bits
            of
            information. I am convenient because I require little markup to use effectively.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="divider mt-2"></div>

<!-- Horizontal Card -->
<div id="horizontal-card" class="section">
  <h4 class="header">Horizontal Card</h4>
  <p>Here is the standard card with a horizontal image.</p>
  <div class="row">
    <div class="col s12 m6 l6">
      <div class="card horizontal">
        <div class="card-image"><img src="<?php echo e(asset('images/gallery/11.png')); ?>" alt="" /></div>
        <div class="card-stacked">
          <div class="card-content">
            <p>I am a very simple card with link. I am good at containing small bits of
              information.</p>
          </div>
          <div class="card-action"><a href="#">This is a link</a></div>
        </div>
      </div>
    </div>
    <div class="col s12 m6 l6">
      <div class="card horizontal">
        <div class="card-image"><img src="<?php echo e(asset('images/gallery/18.png')); ?>" alt="" /></div>
        <div class="card-stacked">
          <div class="card-content">
            <p>I am a very simple card with button. I am good at containing small bits of.</p>
          </div>
          <div class="card-action">
            <a href="#!" class="waves-effect waves-light btn gradient-45deg-red-pink">Button</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="divider mt-2"></div>

<!--Card Reveal-->
<div id="card-reveal" class="section">
  <h4 class="header">Card Reveal</h4>
  <p>Here you can add a card that reveals more information once clicked.</p>

  <div class="row">
    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="<?php echo e(asset('images/gallery/12.png')); ?>" alt="office" />
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title <i
              class="material-icons right">more_vert</i>
          </span>
          <p><a href="#">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title <i class="material-icons right">close</i>
          </span>
          <p>Here is some more information about this product that is only revealed once clicked
            on.</p>
        </div>
      </div>
      <p>
        Just add the <code class=" language-markup">card-reveal</code> div with a
        <code class=" language-markup">span.card-title</code> inside to make this work. Add the class
        <code class=" language-markup">activator</code> to an element inside the card to allow it to
        open the card
        reveal.
      </p>
    </div>

    <div class="col s12 m6 l4">
      <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="<?php echo e(asset('images/gallery/19.png')); ?>" alt="" />
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title <i
              class="material-icons right">more_vert</i>
          </span>
          <p><a href="#!">This is a link</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title <i class="material-icons right">close</i>
          </span>
          <p>Here is some more information about this product that is only revealed once clicked
            on.</p>
        </div>
        <div class="card-action"><a href="#">This is a link</a> <a href="#">This is a link</a></div>
      </div>
      <p>The default state is having the card-reveal go over the card-action.</p>
    </div>

    <div class="col s12 m6 l4">
      <div class="card sticky-action">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="<?php echo e(asset('images/gallery/21.png')); ?>" alt="" />
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Card Title <i
              class="material-icons right">more_vert</i>
          </span>
          <p><a href="#!">This is a link</a></p>
        </div>
        <div class="card-action"><a href="#">This is a link</a> <a href="#">This is a link</a></div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">Card Title <i class="material-icons right">close</i>
          </span>
          <p>Here is some more information about this product that is only revealed once clicked
            on.</p>
        </div>
      </div>
      <p>
        You can make your card-action always visible by adding the class
        <code class=" language-markup">sticky-action</code> to the overall card.
      </p>
    </div>
  </div>
</div>
<div class="divider mt-2"></div>

<!--Tabs in Cards-->
<div id="tabs-in-card" class="section">
  <h4 class="header">Tabs in Cards</h4>
  <p>For a simpler card with less markup, try using a card panel which just has padding and a shadow effect</p>
  <div class="row">
    <div class="col s12 m6">
      <h6 class="light">White</h6>
      <div class="card">
        <div class="card-content">
          <p>
            I am a very simple card. I am good at containing small bits of information. I am
            convenient because I
            require little markup to use effectively.
          </p>
        </div>
        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width">
            <li class="tab"><a href="#test4">Test 1</a></li>
            <li class="tab"><a class="active" href="#test5">Test 2</a></li>
            <li class="tab"><a href="#test6">Test 3</a></li>
          </ul>
        </div>
        <div class="card-content grey lighten-4">
          <div id="test4">Low-hanging fruit, social innovation do-gooder state of play families
            resist collaborative consumption justice. Strategize NGO effective altruism
            changemaker game-changer, social.
          </div>
          <div id="test5">
            <h6 class="center"> social innovation </h6>
            Empower change-makers; a challenges and opportunities collective impact
            collaborate.
          </div>
          <div id="test6">Revolutionary, expose the truth shine benefit corporation, activate
            incubator revolutionary co-create.</div>
        </div>
      </div>
    </div>
    <div class="col s12 m6">
      <h6 class="light">Colored</h6>
      <div class="card blue">
        <div class="card-content white-text">
          <p>
            I am a very simple card. I am good at containing small bits of information. I am
            convenient because I
            require little markup to use effectively.
          </p>
        </div>
        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width tabs-transparent">
            <li class="tab"><a href="#test1">Test 1</a></li>
            <li class="tab"><a class="active" href="#test2">Test 2</a></li>
            <li class="tab"><a href="#test3">Test 3</a></li>
          </ul>
        </div>
        <div class="card-content blue lighten-5">
          <div id="test1">Low-hanging fruit, social innovation do-gooder state of play families
            resist collaborative consumption justice. Strategize NGO effective altruism
            changemaker game-changer, social.</div>
          <div id="test2">
            <h6 class="center"> social innovation </h6>
            Empower change-makers; a challenges and opportunities collective impact
            collaborate.
          </div>
          <div id="test3">Revolutionary, expose the truth shine benefit corporation, activate
            incubator revolutionary co-create.Revolutionary, expose the truth shine benefit
            corporation</div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="divider mt-2"></div>

<!--Card Size-->
<div id="card-size" class="section">
  <h4 class="header">Card Size</h4>
  <div class="row">
    <div class="col s12">
      <p class="caption">Small</p>
      <p>The Small Card limits the height of the card to 300px.</p>
    </div>
    <div class="col s12 m6 l6">
      <div class="card small">
        <div class="card-image">
          <img src="<?php echo e(asset('images/gallery/23.png')); ?>" alt="sample" />
          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <p>
            I am a very simple card. I am good at containing small bits of information.
          </p>
        </div>
        <div class="card-action"><a href="#">This is a link</a> <a href="#">This is a link</a></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <p class="caption">Medium</p>
      <p>The Medium Card limits the height of the card to 400px.</p>
    </div>
    <div class="col s12 m7 l7">
      <div class="card medium">
        <div class="card-image">
          <img src="<?php echo e(asset('images/gallery/25.png')); ?>" alt="sample" />
          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <p>
            I am a very simple card. I am good at containing small bits of information. I am
            convenient because I
            require little markup to use effectively.
          </p>
        </div>
        <div class="card-action"><a href="#">This is a link</a> <a href="#">This is a link</a></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <p class="caption">Large</p>
      <p>The Large Card limits the height of the card to 500px.</p>
    </div>
    <div class="col s12 m8 l8">
      <div class="card large">
        <div class="card-image">
          <img src="<?php echo e(asset('images/gallery/28.png')); ?>" alt="sample" />
          <span class="card-title">Card Title</span>
        </div>
        <div class="card-content">
          <p>
            I am a very simple card. I am good at containing small bits of information. I am
            convenient because I
            require little markup to use effectively.
            I am a very simple card. I am good at containing small bits of information. I am
            convenient because I
            require little markup to use effectively.
            I am a very simple card. I am good at containing small bits of information. I am
            convenient because I
            require little markup to use effectively.
          </p>
        </div>
        <div class="card-action"><a href="#">This is a link</a> <a href="#">This is a link</a></div>
      </div>
    </div>
  </div>
</div>
<div class="divider mt-2"></div>

<!--Card Panel-->
<div id="card-panel-type" class="section">
  <h4 class="header">Card Panel</h4>
  <p>For a simpler card with less markup, try using a card panel which just has padding and a shadow effect</p>

  <div class="row">
    <div class="col s12 m4 l4">
      <div class="card-panel yellow darken-4">
        <span class="white-text">I am a very simple solid color card. I am good at containing small
          bits of
          information.I am convenient
          because I require little markup to use effectively. I am similar to what is called a
          panel in other
          frameworks.</span>
      </div>
    </div>
    <div class="col s12 m4 l4">
      <div class="card-panel gradient-45deg-light-blue-cyan gradient-shadow">
        <span class="white-text">I am a very simple gradient color card. I am good at containing small
          bits of
          information.I am convenient
          because I require little markup to use effectively. I am similar to what is called a
          panel in other
          frameworks.</span>
      </div>
    </div>
    <div class="col s12 m4 l4">
      <div class="card-panel gradient-45deg-red-pink gradient-shadow">
        <span class="white-text">I am a very simple gradient color card. I am good at containing small
          bits of
          information.I am convenient
          because I require little markup to use effectively. I am similar to what is called a
          panel in other
          frameworks.</span>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\cards-basic.blade.php ENDPATH**/ ?>