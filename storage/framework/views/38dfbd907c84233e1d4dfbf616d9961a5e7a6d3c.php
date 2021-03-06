<?php $__env->startSection('title', 'Dropdown'); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption">Add a dropdown list to any button. Make sure that the <code
          class=" language-markup">data-target</code>
        attribute matches the id in the <code class=" language-markup"><span class="token tag"><span
              class="token tag"><span class="token punctuation">&lt;</span>ul</span><span
              class="token punctuation">&gt;</span></span></code>
        tag. You can add a divider with the <code class=" language-markup"><span class="token tag"><span
              class="token tag"><span class="token punctuation">&lt;</span>li</span> <span
              class="token attr-name">class</span><span class="token attr-value"><span
                class="token punctuation">=</span><span class="token punctuation">"</span>divider<span
                class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span
            class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>li</span><span
              class="token punctuation">&gt;</span></span></code> tag. You can also add icons. Just add the icon
        inside
        the <code class=" language-markup">anchor</code> tag.</p>
    </div>
  </div>
</div>

<!-- Drop Me! -->
<div class="row">
  <div class="col s12">
    <div id="drop-me" class="card card-tabs position-none">
      <div class="card-content">
        <div class="card-title">
          <div class="row">
            <div class="col s12 m6 l10">
              <h4 class="card-title">Drop Me!</h4>
            </div>
            <div class="col s12 m6 l2">
              <ul class="tabs">
                <li class="tab col s6 p-0"><a class="active p-0" href="#view-drop-me">View</a></li>
                <li class="tab col s6 p-0"><a class="p-0" href="#html-drop-me">Html</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div id="view-drop-me">
          <div class="row">
            <div class="col s12">
              <!-- Dropdown Structure -->
              <!-- Dropdown Trigger -->
              <a class='dropdown-trigger btn' href='#' data-target='dropdown153'>Drop Me!</a>

              <!-- Dropdown Structure -->
              <ul id='dropdown153' class='dropdown-content'>
                <li><a href="#!">one</a></li>
                <li><a href="#!">two</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><a href="#!">three</a></li>
                <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div id="html-drop-me">
          <pre><code class="language-markup">
  &lt;!-- Dropdown Trigger --&gt;
  &lt;a class='dropdown-trigger btn' href='#' data-target='dropdown1'&gt;Drop Me!&lt;/a&gt;
  &lt;!-- Dropdown Structure --&gt;
  &lt;ul id='dropdown1' class='dropdown-content'&gt;
  &lt;li&gt;&lt;a href="#!"&gt;one&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#!"&gt;two&lt;/a&gt;&lt;/li&gt;
  &lt;li class="divider"&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#!"&gt;three&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#!"&gt;&lt;i class="material-icons"&gt;view_module&lt;/i&gt;four&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#!"&gt;&lt;i class="material-icons"&gt;cloud&lt;/i&gt;five&lt;/a&gt;&lt;/li&gt;
  &lt;/ul&gt;
  </code></pre>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Options -->
<div class="row">
  <div class="col s12 m12 l12">
    <div id="options" class="card card card-default scrollspy">
      <div class="card-content">
        <h4 class="card-title">Options</h4>
        <table class="striped">
          <thead>
            <tr>
              <th>Option Name</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>inDuration</td>
              <td>The duration of the transition enter in milliseconds. Default: 300</td>
            </tr>
            <tr>
              <td>outDuration</td>
              <td>The duration of the transition out in milliseconds. Default: 225</td>
            </tr>
            <tr>
              <td>constrainWidth</td>
              <td>If true, constrainWidth to the size of the dropdown activator. Default: true</td>
            </tr>
            <tr>
              <td>hover</td>
              <td>If true, the dropdown will open on hover. Default: false</td>
            </tr>
            <tr>
              <td>gutter</td>
              <td>This defines the spacing from the aligned edge. Default: 0</td>
            </tr>
            <tr>
              <td>coverTrigger</td>
              <td>If true, the dropdown will show below the activator. Default: false</td>
            </tr>
            <tr>
              <td>alignment</td>
              <td>Defines the edge the menu is aligned to. Default: 'left'</td>
            </tr>
            <tr>
              <td>stopPropagation</td>
              <td>If true, stops the event propagating from the dropdown origin click handler. Default: false</td>
            </tr>
          </tbody>
        </table>
        <p>To use these inline you have to add them as data attributes. If you want more dynamic control, you can
          define them using the jQuery plugin below.</p>
        <pre><code class="language-markup">
  &lt;a class='dropdown-trigger btn' data-coverTrigger="true" href='#' data-target='dropdown1'&gt;Drop Me!&lt;/a&gt;
  </code></pre>
      </div>
    </div>
  </div>
</div>

<!-- jQuery Plugin Initialization -->
<div class="row">
  <div class="col s12 m12 l12">
    <div id="initialization" class="card card card-default scrollspy">
      <div class="card-content">
        <h4 class="card-title">jQuery Plugin Initialization</h4>
        <p>Initialization for dropdowns is only necessary if you create them dynamically.</p>
        <pre><code class="language-js">
  $('.dropdown-trigger').dropdown({
  inDuration: 300,
  outDuration: 225,
  constrainWidth: false, // Does not change width of dropdown to that of the activator
  hover: true, // Activate on hover
  gutter: 0, // Spacing from edge
  coverTrigger: false, // Displays dropdown below the button
  alignment: 'left', // Displays dropdown with edge aligned to the left of button
  stopPropagation: false // Stops event propagation
  }
  );
  </code></pre>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col s12 m12 l12">
    <div id="init" class="card card card-default scrollspy">
      <div class="card-content">
        <p>You can also open dropdowns programatically, the below code will make your modal open on document ready:</p>
        <pre><code class="language-js">
  $('.dropdown-trigger').dropdown('open');
  </code></pre>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col s12 m12 l12">
    <div id="init-programatically" class="card card card-default scrollspy">
      <div class="card-content">
        <p>You can also close dropdowns programatically:</p>
        <pre><code class="language-js">
  $('.dropdown-trigger').dropdown('close');
  </code></pre>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\advance-ui-dropdown.blade.php ENDPATH**/ ?>