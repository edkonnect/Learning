<?php $__env->startSection('title','Charts Chartjs'); ?>


<?php $__env->startSection('content'); ?>
<div class="seaction">
   <!--Line Chart-->
   <div id="chartjs-line-chart" class="card">
      <div class="card-content">
         <h4 class="card-title">Line Chart</h4>
         <p class="caption">
            <a href="http://www.chartjs.org/docs/#getting-started" target="_blank">Chart.js</a> provides simple,
            responsive,
            clean and engaging charts for designers and developers.
         </p>
         <div class="row">
            <div class="col s12">
               <p class="mb-2">
                  A line chart is a way of plotting data points on a line. Often, it is used to show trend data, and
                  the
                  comparison of two data sets.
               </p>
               <div class="sample-chart-wrapper"><canvas id="line-chart" height="400"></canvas></div>
            </div>
         </div>
      </div>
   </div>

   <!--Bar Chart-->
   <div id="chartjs-bar-chart" class="card">
      <div class="card-content">
         <h4 class="card-title">Bar Chart</h4>
         <div class="row">
            <div class="col s12">
               <p class="mb-2">
                  A bar chart is a way of showing data as bars. It is sometimes used to show trend data, and the
                  comparison
                  of multiple data sets side by side.
               </p>
               <div class="sample-chart-wrapper"><canvas id="bar-chart" height="400"></canvas></div>
            </div>
         </div>
      </div>
   </div>

   <!--Radar Chart-->
   <div id="chartjs-radar-chart" class="card">
      <div class="card-content">
         <h4 class="card-title">Radar Chart</h4>
         <div class="row">
            <div class="col s12">
               <p class="mb-2">
                  A radar chart is a way of showing multiple data points and the variation between them.They are often
                  useful
                  for comparing the points of two or more different data sets.
               </p>
               <div class="sample-chart-wrapper"><canvas id="radar-chart" height="400"></canvas></div>
            </div>
         </div>
      </div>
   </div>

   <!--Polar Chart-->
   <div id="chartjs-polar-chart" class="card">
      <div class="card-content">
         <h4 class="card-title">Polar Chart</h4>
         <div class="row">
            <div class="col s12">
               <p class="mb-2">
                  Polar area charts are similar to pie charts, but each segment has the same angle - the radius of the
                  segment differs depending on the value.
               </p>
               <div class="sample-chart-wrapper"><canvas id="polar-chart" height="400"></canvas></div>
            </div>
         </div>
      </div>
   </div>

   <!--Pie & Doughnut Charts-->
   <div id="chartjs-pie-chart" class="card">
      <div class="card-content">
         <h4 class="card-title">Pie & Doughnut Charts</h4>
         <div class="row">
            <div class="col s12">
               <p class="mb-2">
                  Pie and doughnut charts are probably the most commonly used chart there are. They are divided into
                  segments, the arc of each segment shows the proportional value of each piece of data.
               </p>
               <div class="row">
                  <div class="col s12 m6 l6">
                     <div class="sample-chart-wrapper"><canvas id="pie-chart" height="400"></canvas></div>
                     <p class="header center">Pie Charts</p>
                  </div>
                  <div class="col s12 m6 l6">
                     <div class="sample-chart-wrapper"><canvas id="doughnut-chart" height="400"></canvas></div>
                     <p class="header center">Doughnut Charts</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/chartjs/chart.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/charts-chartjs.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\charts-chartjs.blade.php ENDPATH**/ ?>