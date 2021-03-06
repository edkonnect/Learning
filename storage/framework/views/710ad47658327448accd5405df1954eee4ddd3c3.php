<?php $__env->startSection('title','Navbar'); ?>


<?php $__env->startSection('page-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/pages/component-navbar.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="section section-navbar">
  <div class="card">
    <div class="card-content">
      <p class="caption mb-0">The navbar is fully contained by an HTML5 Nav tag. Inside a recommended container div,
        there are 2 main parts of the navbar. A logo or brand link, and the navigations links. You can align these
        links to the left or right.</p>
    </div>
  </div>

  <!-- Right Aligned Links -->
  <div class="row">
    <div class="col s12">
      <div id="right-aligned" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Right Aligned Links</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-right-aligned">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-right-aligned">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-right-aligned">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">To right align your navbar links, just add a <code class="language-markup">right</code>
                  class to your <code class="language-markup">&lt;ul></code> that contains them.</p>
                <nav>
                  <div class="nav-wrapper">
                    <div class="col s12">
                      <a href="#!" class="brand-logo">Logo</a>
                      <ul class="right hide-on-med-and-down">
                        <li><a href="#">Sass</a></li>
                        <li><a href="#">Components</a></li>
                        <li><a href="#">JavaScript</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div id="html-right-aligned">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#" class="brand-logo">Logo&lt;/a>
      &lt;ul id="nav-mobile" class="right hide-on-med-and-down">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">JavaScript&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Left Aligned Links -->
  <div class="row">
    <div class="col s12">
      <div id="left-aligned" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Left Aligned Links</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-left-aligned">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-left-aligned">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-left-aligned">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">To left align your navbar links, just add a <code class="language-markup">left</code>
                  class to your <code class="language-markup">&lt;ul></code> that contains them.</p>
                <nav>
                  <div class="nav-wrapper">
                    <div class="col s12">
                      <a href="#!" class="brand-logo right">Logo</a>
                      <ul class="left hide-on-med-and-down">
                        <li><a href="#">Sass</a></li>
                        <li><a href="#">Components</a></li>
                        <li><a href="#">JavaScript</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div id="html-left-aligned">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#" class="brand-logo right">Logo&lt;/a>
      &lt;ul id="nav-mobile" class="left hide-on-med-and-down">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">JavaScript&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Centering the logo -->
  <div class="row">
    <div class="col s12">
      <div id="gradient" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Centering the logo</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-centering-logo">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-centering-logo">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-centering-logo">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">The logo will center itself on medium and down screens, but if you want the logo to
                  always be centered, add the <code class="language-markup">center</code> class to your <code
                    class="language-markup">&lt;a
                    class="brand-logo"></code>. You will have to make sure yourself that links do not overlap if you
                  use this.</p>

                <nav>
                  <div class="nav-wrapper">
                    <a href="#" class="brand-logo center">Logo</a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                      <li><a href="#">Sass</a></li>
                      <li><a href="#">Components</a></li>
                      <li><a href="#">JavaScript</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div id="html-centering-logo">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#" class="brand-logo center">Logo&lt;/a>
      &lt;ul id="nav-mobile" class="left hide-on-med-and-down">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">JavaScript&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar Gradient color with shadow -->
  <div class="row">
    <div class="col s12">
      <div id="gradient-shadow" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Navbar Gradient color with shadow</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-gradient-shadow">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-gradient-shadow">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-gradient-shadow">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">Apart from the material solid colors you can also use the gradient color feature with
                  Navbar. Just add <code class="language-markup">gradient-45deg-purple-deep-orange
                    gradient-shadow</code>
                  class to your <code class="language-markup">&lt;nav></code> tag.</p>
                <nav class="gradient-45deg-purple-deep-orange gradient-shadow">
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo center">Logo</a>
                    <ul class="left hide-on-med-and-down">
                      <li><a href="#">Sass</a></li>
                      <li><a href="#">Components</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div id="html-gradient-shadow">
            <pre><code class="language-markup">
  &lt;nav class="gradient-45deg-purple-deep-orange gradient-shadow">
    &lt;div class="nav-wrapper">
    &lt;a href="#" class="brand-logo center">Logo&lt;/a>
      &lt;ul id="nav-mobile" class="left hide-on-med-and-down">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">JavaScript&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Active Items -->
  <div class="row">
    <div class="col s12">
      <div id="active-items" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Active Items</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-active-items">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-active-items">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-active-items">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">
                  Add active class to your li tags to denote the current page.
                </p>
                <nav>
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo center">Logo</a>
                    <ul class="left hide-on-med-and-down">
                      <li><a href="#">Sass</a></li>
                      <li><a href="#">Components</a></li>
                      <li class="active"><a href="#">JavaScript</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div id="html-active-items">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#!" class="brand-logo center">Logo&lt;/a>
      &lt;ul class="left hide-on-med-and-down">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;li class="active">&lt;a href="#">JavaScript&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Extended Navbar with Tabs -->
  <div class="row">
    <div class="col s12">
      <div id="extended-navbar" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Extended Navbar with Tabs</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-extended-navbar">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-extended-navbar">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-extended-navbar">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">
                  To add extended components to the navbar, add the class <code
                    class="language-markup">nav-extended</code>
                  to the outer
                  <span class="language-markup">nav</span> tag. This will allow your navbar height to be variable. Then
                  you can just include a tabs component inside the
                  <span class="language-markup">nav-wrapper</span>.
                </p>
                <nav class="nav-extended">
                  <div class="nav-wrapper">
                    <a href="#" class="brand-logo">Logo</a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger hide-on-med-and-up ml-1 mr-1"><i
                        class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                      <li><a href="#">Sass</a></li>
                      <li><a href="#">Components</a></li>
                      <li><a href="#">JavaScript</a></li>
                    </ul>
                  </div>
                  <div class="nav-content">
                    <ul class="tabs tabs-transparent">
                      <li class="tab"><a href="#test1">Test 1</a></li>
                      <li class="tab"><a class="active" href="#test2">Test 2</a></li>
                      <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
                      <li class="tab"><a href="#test4">Test 4</a></li>
                    </ul>
                  </div>
                </nav>

                <ul class="sidenav" id="mobile-demo">
                  <li><a href="#">Sass</a></li>
                  <li><a href="#">Components</a></li>
                  <li><a href="#">JavaScript</a></li>
                </ul>

                <div id="test1" class="col s12">Jelly beans chocolate gummies gummies I love. Cupcake cake bear claw
                  tart wafer tootsie roll. Dessert biscuit gummi bears oat cake apple pie jelly halvah cupcake.

                </div>
                <div id="test2" class="col s12">
                  Liquorice powder tart danish biscuit I love. Cotton candy biscuit carrot cake bear claw jelly-o
                  tiramisu. Tootsie roll fruitcake brownie cotton candy pudding gummi bears. </div>
                <div id="test3" class="col s12">
                  Cupcake ipsum dolor sit. Amet cake apple pie cupcake. Sugar plum icing tootsie roll.</div>
                <div id="test4" class="col s12">Cupcake ipsum dolor sit. Amet jelly-o pie. Cake cake pie lemon drops
                  pie candy canes.

                </div>
              </div>
            </div>
          </div>
          <div id="html-extended-navbar">
            <pre><code class="language-markup">
  &lt;nav class="nav-extended">
    &lt;div class="nav-wrapper">
      &lt;a href="#" class="brand-logo">Logo&lt;/a>
      &lt;a href="#" data-target="mobile-demo" class="button-collapse  hide-on-med-and-up">&lt;i class="material-icons">menu&lt;/i>&lt;/a>
      &lt;ul id="nav-mobile" class="right hide-on-med-and-down">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">JavaScript&lt;/a>&lt;/li>
      &lt;/ul>
      &lt;ul class="sidenav" id="mobile-demo">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">JavaScript&lt;/a>&lt;/li>
      &lt;/ul>
      &lt;/div>
      &lt;div class="nav-content">
        &lt;ul class="tabs tabs-transparent">
          &lt;li class="tab">&lt;a href="#test1">Test 1&lt;/a>&lt;/li>
          &lt;li class="tab">&lt;a class="active" href="#test2">Test 2&lt;/a>&lt;/li>
          &lt;li class="tab disabled">&lt;a href="#test3">Disabled Tab&lt;/a>&lt;/li>
          &lt;li class="tab">&lt;a href="#test4">Test 4&lt;/a>&lt;/li>
        &lt;/ul>
      &lt;/div>
    &lt;/nav>
  &lt;div id="test1" class="col s12">Test 1&lt;/div>
  &lt;div id="test2" class="col s12">Test 2&lt;/div>
  &lt;div id="test3" class="col s12">Test 3&lt;/div>
  &lt;div id="test4" class="col s12">Test 4&lt;/div>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Fixed Navbar -->
  <div class="row">
    <div class="col s12">
      <div id="navbar-fixed" class="card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Fixed Navbar</h4>
          <p class="mb-2">
            To make the navbar fixed, you have to add an outer wrapping div with the class <code
              class="language-markup">navbar-fixed</code>.
            This will offset your other content while making your nav fixed. You can adjust the height of this outer
            div to change how much offset is on your content.
          </p>
          <pre><code class="language-markup">
  &lt;div class="navbar-fixed">
  &lt;nav>
  &lt;div class="nav-wrapper">
  &lt;a href="#!" class="brand-logo">Logo&lt;/a>
  &lt;ul class="right hide-on-med-and-down">
  &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
  &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
  &lt;/ul>
  &lt;/div>
  &lt;/nav>
  &lt;/div>
  </code></pre>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar Dropdown Menu -->
  <div class="row">
    <div class="col s12">
      <div id="navbar-dropdown" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l6">
                <h4 class="card-title">Navbar Dropdown Menu</h4>
              </div>
              <div class="col s12 m6 l6">
                <ul class="tabs">
                  <li class="tab col s4 p-0"><a class="active p-0" href="#view-dropdown-menu">View</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#html-dropdown-menu">Html</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#js-dropdown-menu">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-dropdown-menu">
            <div class="row">
              <div class="col s12">
                <p>
                  To add a navbar dropdown menu, add the <code class="language-markup">ul</code> dropdown structure
                  into the page. Then, add an element to trigger the dropdown menu. Make sure to supply the id of the
                  dropdown structure to the
                  <code class="language-markup">data-target</code> attribute of the dropdown trigger.
                </p>
                <!-- Dropdown Structure -->
                <ul id="dropdown123" class="dropdown-content">
                  <li><a href="#!">one</a></li>
                  <li><a href="#!">two</a></li>
                  <li class="divider"></li>
                  <li><a href="#!">three</a></li>
                </ul>
                <nav>
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo ml-2">Logo</a>
                    <ul class="right hide-on-med-and-down">
                      <li><a href="#">Sass</a></li>
                      <li><a href="#">Components</a></li>
                      <!-- Dropdown Trigger -->
                      <li><a class="dropdown-trigger" href="#!" data-target="dropdown123">Dropdown<i
                            class="material-icons right">arrow_drop_down</i></a></li>
                    </ul>
                  </div>
                </nav>
                <br>
                <h5>Trigger dropdown menu on click</h5>
                <p>
                  By default, the dropdown menu is activated by hovering over the dropdown trigger. To activate the
                  dropdown menu on click, pass <code class="language-javascript">{ hover: false }</code> into the above
                  <code class="language-javascript">dropdown()</code> function
                </p>
              </div>
            </div>
          </div>
          <div id="html-dropdown-menu">
            <pre><code class="language-markup">
  &lt;!-- Dropdown Structure -->
  &lt;ul id="dropdown123" class="dropdown-content">
    &lt;li>&lt;a href="#!">one&lt;/a>&lt;/li>
    &lt;li>&lt;a href="#!">two&lt;/a>&lt;/li>
    &lt;li class="divider">&lt;/li>
    &lt;li>&lt;a href="#!">three&lt;/a>&lt;/li>
  &lt;/ul>
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#!" class="brand-logo">Logo&lt;/a>
      &lt;ul class="right hide-on-med-and-down">
        &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
        &lt;!-- Dropdown Trigger -->
        &lt;li>&lt;a class="dropdown-trigger" href="#!" data-target="dropdown123">Dropdown&lt;i class="material-icons right">arrow_drop_down&lt;/i>&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav>
  </code></pre>
          </div>
          <div id="js-dropdown-menu">
            <pre><code class="language-javascript">
    $(".dropdown-trigger").dropdown();
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Icon Links -->
  <div class="row">
    <div class="col s12">
      <div id="icon-links" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Icon Links</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-icon-links">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-icon-links">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-icon-links">
            <div class="row">
              <div class="col s12">
                <nav>
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo ml-2">
                      <i class="material-icons mr-1">cloud</i>Logo</a>
                    <ul class="right hide-on-med-and-down">
                      <li>
                        <a href="#">
                          <i class="material-icons">search</i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="material-icons">view_module</i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="material-icons">refresh</i>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="material-icons">more_vert</i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </nav>
                <br>
                <p>You can add icons into links. For icon only links you don't need any additional class. Just pop the
                  <code class="language-markup">i</code> tag in and it will work.</p>
              </div>
            </div>
          </div>
          <div id="html-icon-links">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#!" class="brand-logo">&lt;i class="material-icons">cloud&lt;/i>Logo&lt;/a>
      &lt;ul class="right hide-on-med-and-down">
        &lt;li>&lt;a href="#">&lt;i class="material-icons">search&lt;/i>&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">&lt;i class="material-icons">view_module&lt;/i>&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">&lt;i class="material-icons">refresh&lt;/i>&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">&lt;i class="material-icons">more_vert&lt;/i>&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav></code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Icon left or right -->
  <div class="row">
    <div class="col s12">
      <div id="icon-left-to-right" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Icon left or right</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-left-to-right">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-left-to-right">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-left-to-right">
            <div class="row">
              <div class="col s12">
                <nav>
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo ml-2">Logo</a>
                    <ul class="right hide-on-med-and-down">
                      <li>
                        <a href="#">
                          <i class="material-icons left">search</i>Link with Left Icon</a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="material-icons right">view_module</i>
                          Link with Right Icon</a>
                      </li>
                    </ul>
                  </div>
                </nav>
                <br>
                <p>For adding an icon to a text link you need to add either a <code class="language-markup">left</code>
                  or <code class="language-markup">right</code> class to the icon depending on where you want the icon
                  to be.</p>
              </div>
            </div>
          </div>
          <div id="html-left-to-right">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#!" class="brand-logo">Logo&lt;/a>
      &lt;ul class="right hide-on-med-and-down">
        &lt;li>&lt;a href="#">&lt;i class="material-icons left">search&lt;/i>Link with Left Icon&lt;/a>&lt;/li>
        &lt;li>&lt;a href="#">&lt;i class="material-icons right">view_module&lt;/i>Link with Right Icon&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav></code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Buttons -->
  <div class="row">
    <div class="col s12">
      <div id="nav-buttons" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Buttons</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-nav-buttons">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-nav-buttons">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-nav-buttons">
            <div class="row">
              <div class="col s12">
                <nav>
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">Logo</a>
                    <ul class="right hide-on-med-and-down">
                      <li><a class="waves-effect waves-light btn">Button</a></li>
                      <li><a class="waves-effect waves-light btn">Button <i class="material-icons right">cloud</i></a>
                      </li>
                      <li><a class="waves-effect waves-light btn-large">Large Button</a></li>
                    </ul>
                  </div>
                </nav>
                <br>
                <p>You can add buttons into links. For buttons you don't need any additional class. Just pop the <code
                    class="language-markup">.btn</code> class on the <code class="language-markup">a</code> tag.</p>
              </div>
            </div>
          </div>
          <div id="html-nav-buttons">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;a href="#!" class="brand-logo">Logo&lt;/a>
      &lt;ul class="right hide-on-med-and-down">
        &lt;li>&lt;a class="waves-effect waves-light btn">Button&lt;/a>&lt;/li>
        &lt;li>&lt;a class="waves-effect waves-light btn">Button &lt;i class="material-icons right">cloud&lt;/i>&lt;/a>&lt;/li>
        &lt;li>&lt;a class="waves-effect waves-light btn-large">Large Button&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
  &lt;/nav></code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Halfway FAB in Extended Navbar -->
  <div class="row">
    <div class="col s12">
      <div id="halfway-fab" class="card card-tabs">
        <div class="card-content pb-3">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Halfway FAB in Extended Navbar</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-halfway-fab">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-halfway-fab">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-halfway-fab">
            <div class="row">
              <div class="col s12">
                <p class="mb-2">Add a halfway FAB to your extended navbar.</p>
                <nav class="nav-extended">
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo ml-2">Logo</a>
                    <ul class="right hide-on-med-and-down">
                      <li><a>A link</a></li>
                      <li><a>A second link</a></li>
                      <li><a>A third link</a></li>
                    </ul>
                  </div>
                  <div class="nav-content">
                    <span class="nav-title ml-2">Title</span>
                    <a class="btn-floating btn-large halfway-fab waves-effect waves-light cyan">
                      <i class="material-icons">add</i>
                    </a>
                  </div>
                </nav>
              </div>
            </div>
          </div>
          <div id="html-halfway-fab">
            <pre><code class="language-markup">
  &lt;nav class="nav-extended">
    &lt;div class="nav-wrapper">
      &lt;a href="#!" class="brand-logo">Logo&lt;/a>
      &lt;ul class="right hide-on-med-and-down">
        &lt;li>&lt;a>A link&lt;/a>&lt;/li>
        &lt;li>&lt;a>A second link&lt;/a>&lt;/li>
        &lt;li>&lt;a>A third link&lt;/a>&lt;/li>
      &lt;/ul>
    &lt;/div>
    &lt;div class="nav-content">
      &lt;span class="nav-title">Title&lt;/span>
      &lt;a class="btn-floating btn-large halfway-fab waves-effect waves-light teal">
      &lt;i class="material-icons">add&lt;/i>
      &lt;/a>
    &lt;/div>
  &lt;/nav></code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Search Bar -->
  <div class="row">
    <div class="col s12">
      <div id="search-bar" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Search Bar</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-search-bar">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-search-bar">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-search-bar">
            <div class="row">
              <div class="col s12">
                <nav>
                  <div class="nav-wrapper">
                    <form>
                      <div class="input-field">
                        <input id="search-example" type="search" required>
                        <label class="label-icon" for="search-example">
                          <i class="material-icons">search</i>
                        </label>
                        <i class="material-icons">close</i>
                      </div>
                    </form>
                  </div>
                </nav>
                <br>
                <p>You can add a search form in the navbar.</p>
              </div>
            </div>
          </div>
          <div id="html-search-bar">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
      &lt;form>
        &lt;div class="input-field">
          &lt;input id="search" type="search" required>
          &lt;label class="label-icon" for="search">&lt;i class="material-icons">search&lt;/i>&lt;/label>
          &lt;i class="material-icons">close&lt;/i>
        &lt;/div>
      &lt;/form>
    &lt;/div>
  &lt;/nav></code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile Collapse Button -->
  <div class="row">
    <div class="col s12">
      <div id="mobile-collapse" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Mobile Collapse Button</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-mobile-collapse">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-mobile-collapse">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-mobile-collapse">
            <div class="row">
              <div class="col s12">
                <nav>
                  <div class="nav-wrapper">
                    <a href="#!" class="brand-logo ml-2">Logo</a>
                    <a href="#" data-target="mobile-demo2" class="button-collapse sidenav-trigger hide-on-med-and-up">
                      <i class="material-icons">menu</i>
                    </a>
                    <ul class="right hide-on-med-and-down">
                      <li><a href="#">Sass</a></li>
                      <li><a href="#">Components</a></li>
                      <li><a href="#">Javascript</a></li>
                      <li><a href="#">Mobile</a></li>
                      <li><a class="btn waves-effect waves-light" href="#">Buttons</a></li>
                    </ul>
                    <ul class="sidenav" id="mobile-demo2">
                      <li><a href="#">Sass</a></li>
                      <li><a href="#">Components</a></li>
                      <li><a href="#">Javascript</a></li>
                      <li><a href="#">Mobile</a></li>
                      <li><a class="btn waves-effect waves-light" href="#">Buttons</a></li>
                    </ul>
                  </div>
                </nav>
                <br>
                <p>When your nav bar is resized, you will see that the links on the right turn into a hamburger icon
                  <i class="material-icons">menu</i>. Take a look at the example below to get this functionality. Add
                  the entire <code class="language-markup">button-collapse</code> line to your <code
                    class="language-markup">nav</code>.</p>
              </div>
            </div>
          </div>
          <div id="html-mobile-collapse">
            <pre><code class="language-markup">
  &lt;nav>
    &lt;div class="nav-wrapper">
    &lt;a href="#!" class="brand-logo">Logo&lt;/a>
    &lt;a href="#" data-target="mobile-demo2" class="button-collapse hide-on-med-and-up sidenav-trigger">&lt;i class="material-icons">menu&lt;/i>&lt;/a>
    &lt;ul class="right hide-on-med-and-down">
      &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
      &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
      &lt;li>&lt;a href="#">Javascript&lt;/a>&lt;/li>
      &lt;li>&lt;a href="#">Mobile&lt;/a>&lt;/li>
    &lt;/ul>
    &lt;ul class="sidenav" id="mobile-demo2">
      &lt;li>&lt;a href="#">Sass&lt;/a>&lt;/li>
      &lt;li>&lt;a href="#">Components&lt;/a>&lt;/li>
      &lt;li>&lt;a href="#">Javascript&lt;/a>&lt;/li>
      &lt;li>&lt;a href="#">Mobile&lt;/a>&lt;/li>
    &lt;/ul>
    &lt;/div>
  &lt;/nav>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Initialization -->
  <div class="row">
    <div class="col s12">
      <div id="sidenav-init" class="card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Initialization</h4>
          <p>After including the sidenav-triggerline into your navbar, all you have to do now is place this code in
            your page's <code class="language-javascript">$( document ).ready(function(){})</code> code. This example
            below assumes you have not modified the classes in the above example. In the case that you have, just
            change the jQuery selector in the line below to match it.</p>
          <pre><code class="language-javascript">
$(".sidenav").sideNav();
</code></pre>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\ui-navbar.blade.php ENDPATH**/ ?>