<?php $__env->startSection('title','Tooltip'); ?>


<?php $__env->startSection('content'); ?>
<div class="section">
  <div class="card">
    <div class="card-content">
      <p class="caption">Tooltips are small, interactive, textual hints for mainly graphical elements. When using icons
        for actions you can use a tooltip to give people clarification on its function.</p>
    </div>
  </div>
  <!--Tooltips-->
  <div class="row">
    <div class="col s12">
      <div id="tooltips" class="card card-tabs">
        <div class="card-content">
          <div class="card-title">
            <div class="row">
              <div class="col s12 m6 l10">
                <h4 class="card-title">Tooltips</h4>
              </div>
              <div class="col s12 m6 l2">
                <ul class="tabs">
                  <li class="tab col s4 p-0"><a class="active p-0" href="#view-tooltip">View</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#html-tooltip">Html</a></li>
                  <li class="tab col s4 p-0"><a class="p-0" href="#js-tooltip">JS</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div id="view-tooltip">
            <div class="row">
              <div class="col s12">
                <p>Add the Tooltipped class to your element and add either top, bottom, left, right on data-tooltip to
                  control the position.</p>
              </div>
              <div class="col s12">
                <a class="btn tooltipped col s6 m2 mr-1 mt-2" data-position="bottom" data-tooltip="I am tooltip">
                  Bottom</a>
                <a class="btn tooltipped col s6 m2 mr-1 mt-2" data-position="top" data-tooltip="I am tooltip">
                  Top</a>
                <a class="btn tooltipped col s6 m2 mr-1 mt-2" data-position="left" data-tooltip="I am tooltip">
                  Left</a>
                <a class="btn tooltipped col s6 m2 mt-2" data-position="right" data-tooltip="I am tooltip">
                  Right</a>
              </div>
              <div class="col s12 mt-2">
                <p class="header">Words Tooltips</p>
              </div>
              <div class="col s12 mt-2">
                <p>Add the Tooltipped class to your element and add either <a class="tooltipped" data-position="top"
                    data-delay="50" data-tooltip="I am top tooltip">top</a>, <a class="tooltipped"
                    data-position="bottom" data-delay="50" data-tooltip="I am bottom tooltip">bottom</a>, <a
                    class="tooltipped" data-position="left" data-delay="50" data-tooltip="I am left tooltip">left</a>,
                  <a class="tooltipped" data-position="right" data-delay="50"
                    data-tooltip="I am right tooltip">right</a> on data-tooltip to control the
                  position.</p>
              </div>
            </div>
          </div>
          <div id="html-tooltip">
            <pre><code class="language-markup">
  &lt;!-- data-position can be : bottom, top, left, or right -->
  &lt;a class="btn tooltipped" data-position="bottom" data-tooltip="I am a tooltip">Hover me!&lt;/a>
  </code></pre>
          </div>
          <div id="js-tooltip">
            <p>Tooltips are initialized automatically, but if you have dynamically added tooltips, you will need to
              initialize them.</p>
            <pre><code class="language-javascript">
            $(document).ready(function(){
            $('.tooltipped').tooltip();
            });
            </code></pre>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- jQuery Plugin Options -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="jquery-plugin" class="card card-default">
        <div class="card-content">
          <h4 class="card-title">jQuery Plugin Options</h4>
          <div class="row">
            <table class="highlight">
              <thead>
                <tr>
                  <th>Option Name</th>
                  <th>Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>delay</td>
                  <td>Delay time before tooltip appears. (Default: 350)</td>
                </tr>
                <tr>
                  <td>tooltip</td>
                  <td>Tooltip text. Can use custom HTML if you set the html option.</td>
                </tr>
                <tr>
                  <td>position</td>
                  <td>Set the direction of the tooltip. 'top', 'right', 'bottom', 'left'. (Default: 'bottom')</td>
                </tr>
                <tr>
                  <td>html</td>
                  <td>Allow custom html inside the tooltip. (Default: false)</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Removal -->
  <div class="row">
    <div class="col s12 m12 l12">
      <div id="removal" class="card card-default">
        <div class="card-content">
          <h4 class="card-title">Removal</h4>
          <div class="row">
            <div class="col s12">
              <p>To close the tooltip from the button, pass in <code class="language-javascript">'close'</code> as
                instance</p>
              <pre><code class="language-javascript">
    // This will close the tooltip functionality for the buttons on this page
        instance.close();
    </code></pre>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\advance-ui-tooltip.blade.php ENDPATH**/ ?>