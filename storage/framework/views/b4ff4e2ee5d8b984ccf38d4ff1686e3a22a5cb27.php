<?php $__env->startSection('title','Collections'); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption mb-0">Collections allow you to group list objects together.</p>
    </div>
  </div>
  <!--Basic Collections-->
  <div class="row">
    <div class="col s12">
      <div id="basic" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Basic</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-basic">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-basic">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-basic">
            <div class="row">
              <div class="col s12">
                <ul class="collection">
                  <li class="collection-item">Alvin</li>
                  <li class="collection-item">Alvin</li>
                  <li class="collection-item">Alvin</li>
                  <li class="collection-item">Alvin</li>
                </ul>
              </div>
            </div>
          </div>
          <div id="html-basic">
            <pre><code class="language-markup">
  &lt;ul class="collection">
    &lt;li class="collection-item">Alvin&lt;/li>
    &lt;li class="collection-item">Alvin&lt;/li>
    &lt;li class="collection-item">Alvin&lt;/li>
    &lt;li class="collection-item">Alvin&lt;/li>
  &lt;/ul>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Links-->
  <div class="row">
    <div class="col s12">
      <div id="links" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Links</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-links">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-links">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-links">
            <div class="row">
              <div class="col s12">
                <div class="collection">
                  <a href="#!" class="collection-item">Alvin</a>
                  <a href="#!" class="collection-item active">Alvin</a>
                  <a href="#!" class="collection-item">Alvin</a>
                  <a href="#!" class="collection-item">Alvin</a>
                </div>
              </div>
            </div>
          </div>
          <div id="html-links">
            <pre><code class="language-markup">
  &lt;div class="collection">
    &lt;a href="#!" class="collection-item">Alvin&lt;/a>
    &lt;a href="#!" class="collection-item active">Alvin&lt;/a>
    &lt;a href="#!" class="collection-item">Alvin&lt;/a>
    &lt;a href="#!" class="collection-item">Alvin&lt;/a>
  &lt;/div>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Headers-->
  <div class="row">
    <div class="col s12">
      <div id="headers" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Headers</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-headers">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-headers">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-headers">
            <div class="row">
              <div class="col s12">
                <ul class="collection with-header">
                  <li class="collection-header">
                    <h4>First Names</h4>
                  </li>
                  <li class="collection-item">Alvin</li>
                  <li class="collection-item">Alvin</li>
                  <li class="collection-item">Alvin</li>
                  <li class="collection-item">Alvin</li>
                </ul>
              </div>
            </div>
          </div>
          <div id="html-headers">
            <pre><code class="language-markup">
  &lt;ul class="collection with-header">
    &lt;li class="collection-header">&lt;h4>First Names&lt;/h4>&lt;/li>
    &lt;li class="collection-item">Alvin&lt;/li>
    &lt;li class="collection-item">Alvin&lt;/li>
    &lt;li class="collection-item">Alvin&lt;/li>
    &lt;li class="collection-item">Alvin&lt;/li>
  &lt;/ul>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Secondary content-->
  <div class="row">
    <div class="col s12">
      <div id="secondary-content" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Secondary content</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-content">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-content">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-content">
            <div class="row">
              <div class="col s12">
                <ul class="collection with-header">
                  <li class="collection-header">
                    <h4>First Names</h4>
                  </li>
                  <li class="collection-item">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                  <li class="collection-item">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                  <li class="collection-item">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                  <li class="collection-item">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="html-content">
            <pre><code class="language-markup">
  &lt;ul class="collection with-header">
    &lt;li class="collection-header">&lt;h4>First Names&lt;/h4>&lt;/li>
    &lt;li class="collection-item">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
    &lt;li class="collection-item">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
    &lt;li class="collection-item">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
    &lt;li class="collection-item">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
  &lt;/ul>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Avatar Content-->
  <div class="row">
    <div class="col s12">
      <div id="avatar-content" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Avatar Content</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-avatar">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-avatar">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-avatar">
            <div class="row">
              <div class="col s12">
                <ul class="collection">
                  <li class="collection-item avatar">
                    <img src="<?php echo e(asset('images/avatar/avatar-7.png')); ?>" alt="" class="circle">
                    <span class="title">Title</span>
                    <p>First Line
                      <br> Second Line
                    </p>
                    <a href="#!" class="secondary-content">
                      <i class="material-icons">grade</i>
                    </a>
                  </li>
                  <li class="collection-item avatar">
                    <i class="material-icons circle">folder</i>
                    <span class="title">Title</span>
                    <p>First Line
                      <br> Second Line
                    </p>
                    <a href="#!" class="secondary-content">
                      <i class="material-icons">grade</i>
                    </a>
                  </li>
                  <li class="collection-item avatar">
                    <i class="material-icons circle green">insert_chart</i>
                    <span class="title">Title</span>
                    <p>First Line
                      <br> Second Line
                    </p>
                    <a href="#!" class="secondary-content">
                      <i class="material-icons">grade</i>
                    </a>
                  </li>
                  <li class="collection-item avatar">
                    <i class="material-icons circle red">play_arrow</i>
                    <span class="title">Title</span>
                    <p>First Line
                      <br> Second Line
                    </p>
                    <a href="#!" class="secondary-content">
                      <i class="material-icons">grade</i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="html-avatar">
            <pre><code class="language-markup">
  &lt;ul class="collection">
    &lt;li class="collection-item avatar">
      &lt;img src="../../../images/avatar/avatar-7.png" alt="" class="circle">
      &lt;span class="title">Title&lt;/span>
      &lt;p>First Line &lt;br>
      Second Line
      &lt;/p>
      &lt;a href="#!" class="secondary-content">&lt;i class="material-icons">grade&lt;/i>&lt;/a>
    &lt;/li>
    &lt;li class="collection-item avatar">
      &lt;i class="material-icons circle">folder&lt;/i>
      &lt;span class="title">Title&lt;/span>
      &lt;p>First Line &lt;br>
      Second Line
      &lt;/p>
      &lt;a href="#!" class="secondary-content">&lt;i class="material-icons">grade&lt;/i>&lt;/a>
    &lt;/li>
    &lt;li class="collection-item avatar">
      &lt;i class="material-icons circle green">insert_chart&lt;/i>
      &lt;span class="title">Title&lt;/span>
      &lt;p>First Line &lt;br>
      Second Line
      &lt;/p>
      &lt;a href="#!" class="secondary-content">&lt;i class="material-icons">grade&lt;/i>&lt;/a>
    &lt;/li>
    &lt;li class="collection-item avatar">
      &lt;i class="material-icons circle red">play_arrow&lt;/i>
      &lt;span class="title">Title&lt;/span>
      &lt;p>First Line &lt;br>
      Second Line
      &lt;/p>
      &lt;a href="#!" class="secondary-content">&lt;i class="material-icons">grade&lt;/i>&lt;/a>
    &lt;/li>
  &lt;/ul>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--Dismissable Content -->
  <div class="row">
    <div class="col s12">
      <div id="dismissable" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Dismissable Content</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s6 p-0"><a class="active p-0" href="#view-dismissable">View</a></li>
                  <li class="tab col s6 p-0"><a class="p-0" href="#html-dismissable">Html</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-dismissable">
            <div class="row">
              <div class="col s12">
                <p>You can just add the class <code class="language-markup">dismissable</code> to enable each
                  collection item to be swiped away. This is only for touch enabled devices.</p>
              </div>
              <div class="col s12">
                <ul class="collection">
                  <li class="collection-item dismissable">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                  <li class="collection-item dismissable">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                  <li class="collection-item dismissable">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                  <li class="collection-item dismissable">
                    <div>Alvin
                      <a href="#!" class="secondary-content">
                        <i class="material-icons">send</i>
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="html-dismissable">
            <pre><code class="language-markup">
  &lt;ul class="collection">
    &lt;li class="collection-item dismissable">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
    &lt;li class="collection-item dismissable">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
    &lt;li class="collection-item dismissable">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
    &lt;li class="collection-item dismissable">&lt;div>Alvin&lt;a href="#!" class="secondary-content">&lt;i class="material-icons">send&lt;/i>&lt;/a>&lt;/div>&lt;/li>
  &lt;/ul>
  </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\ui-collections.blade.php ENDPATH**/ ?>