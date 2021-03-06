<?php $__env->startSection('title','Cards Extended'); ?>


<?php $__env->startSection('vendor-style'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('fonts/fontawesome/css/all.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<!--Gradient Card-->
<div id="cards-extended">
  <div class="card">
    <div class="card-content">
      <h4 class="card-title">Gradient Card & Gradient Card With Analytics</h4>
      <p>
        Here is the gradient card with flat image for all gradient classes please check
        <a href="<?php echo e(asset('css-color')); ?>" target="_blank"> css-color</a>.
      </p>
      <div class="row">
        <div class="col s12 m3">
          <div class="card gradient-shadow gradient-45deg-light-blue-cyan border-radius-3">
            <div class="card-content center">
              <img src="<?php echo e(asset('images/icon/apple-watch.png')); ?>" alt="images" class="width-40" />
              <h5 class="white-text lighten-4">50% Off</h5>
              <p class="white-text lighten-4">On apple watch</p>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card gradient-shadow gradient-45deg-red-pink border-radius-3">
            <div class="card-content center">
              <img src="<?php echo e(asset('images/icon/printer.png')); ?>" alt="images" class="width-40" />
              <h5 class="white-text lighten-4">20% Off</h5>
              <p class="white-text lighten-4">On Canon Printer</p>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card gradient-shadow gradient-45deg-amber-amber border-radius-3">
            <div class="card-content center">
              <img src="<?php echo e(asset('images/icon/laptop.png')); ?>" alt="images" class="width-40" />
              <h5 class="white-text lighten-4">40% Off</h5>
              <p class="white-text lighten-4">On apple macbook</p>
            </div>
          </div>
        </div>
        <div class="col s12 m3">
          <div class="card gradient-shadow gradient-45deg-green-teal border-radius-3">
            <div class="card-content center">
              <img src="<?php echo e(asset('images/icon/bowling.png')); ?>" alt="images" class="width-40" />
              <h5 class="white-text lighten-4">60% Off</h5>
              <p class="white-text lighten-4">On any video game</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="gradient-Analytics">
        <div class="col s12 m6 l3 card-width">
          <div class="card row gradient-45deg-deep-orange-orange gradient-shadow white-text padding-4 mt-5">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5 mb-5">add_shopping_cart</i>
              <p>Orders</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0 white-text">690</h5>
              <p class="no-margin">New</p>
              <p>6,00,00</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3 card-width">
          <div class="card row gradient-45deg-blue-indigo gradient-shadow white-text padding-4 mt-5">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5 mb-5">perm_identity</i>
              <p>Clients</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0 white-text">1885</h5>
              <p class="no-margin">New</p>
              <p>1,12,900</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3 card-width">
          <div class="card row gradient-45deg-purple-deep-orange gradient-shadow white-text padding-4 mt-5">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5 mb-5">timeline</i>
              <p>Sales</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0 white-text">80%</h5>
              <p class="no-margin">Growth</p>
              <p>3,42,230</p>
            </div>
          </div>
        </div>
        <div class="col s12 m6 l3 card-width">
          <div class="card row gradient-45deg-purple-deep-purple gradient-shadow white-text padding-4 mt-5">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5 mb-5">attach_money</i>
              <p>Profit</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0 white-text">$890</h5>
              <p class="no-margin">Today</p>
              <p>$25,000</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider mt-2"></div>

  <!-- Card With Analytics -->
  <div id="card-with-analytics" class="section">
    <h4 class="header">Card With Analytics</h4>
    <div class="row">
      <div class="col s12 m6 l3 card-width">
        <div class="card border-radius-6">
          <div class="card-content center-align">
            <i class="material-icons amber-text small-ico-bg mb-5">check</i>
            <h4 class="m-0"><b>21.5k</b></h4>
            <p>Total Views</p>
            <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
              119.71%</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3 card-width">
        <div class="card border-radius-6">
          <div class="card-content center-align">
            <i class="material-icons amber-text small-ico-bg mb-5">sentiment_satisfied</i>
            <h4 class="m-0"><b>1.6k</b></h4>
            <p>Impressions</p>
            <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
              112.90%</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3 card-width">
        <div class="card border-radius-6">
          <div class="card-content center-align">
            <i class="material-icons amber-text small-ico-bg mb-5">radio_button_unchecked</i>
            <h4 class="m-0"><b>890</b></h4>
            <p>Reach</p>
            <p class="red-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_down</i>
              24.4%</p>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3 card-width">
        <div class="card border-radius-6">
          <div class="card-content center-align">
            <i class="material-icons amber-text small-ico-bg mb-5">favorite_border</i>
            <h4 class="m-0"><b>22.5%</b></h4>
            <p>Engagement Rate</p>
            <p class="green-text  mt-3"><i class="material-icons vertical-align-middle">arrow_drop_up</i>
              112.43%</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider mt-2"></div>

  <!--Gradient Chart Card-->

  <div id="card-gradient-chart" class="section">
    <h4 class="header">Gradient Chart Card</h4>
    <p>Here is the card with gradient line chart of ChartJS</p>

    <div class="row">
      <div class="col s12 m4 l4">
        <div id="chartjs" class="card pt-0 pb-0">
          <div class="padding-2 ml-2">
            <span class="new badge gradient-45deg-blue-indigo gradient-shadow mt-2 mr-2">+
              42.6%</span>
            <p class="mt-2 mb-0 font-weight-600">Members online</p>
            <p class="no-margin grey-text lighten-3">360 avg</p>
            <h5>3,450</h5>
          </div>
          <div class="sample-chart-wrapper card-gradient-chart">
            <canvas id="custom-line-chart-sample-one" class="center"></canvas>
          </div>
        </div>
      </div>
      <div class="col s12 m4 l4">
        <div id="chartjs2" class="card pt-0 pb-0">
          <div class="padding-2 ml-2">
            <span class="new badge gradient-45deg-purple-deep-orange gradient-shadow mt-2 mr-2">+
              12%</span>
            <p class="mt-2 mb-0 font-weight-600">Current server load</p>
            <p class="no-margin grey-text lighten-3">23.1% avg</p>
            <h5>+2500</h5>
          </div>
          <div class="sample-chart-wrapper card-gradient-chart">
            <canvas id="custom-line-chart-sample-two" class="center"></canvas>
          </div>
        </div>
      </div>
      <div class="col s12 m4 l4">
        <div id="chartjs3" class="card pt-0 pb-0">
          <div class="padding-2 ml-2">
            <span class="new badge gradient-45deg-deep-orange-orange gradient-shadow mt-2 mr-2">+
              $900</span>
            <p class="mt-2 mb-0 font-weight-600">Today's revenue</p>
            <p class="no-margin grey-text lighten-3">$40,512 avg</p>
            <h5>$ 22,300</h5>
          </div>
          <div class="sample-chart-wrapper card-gradient-chart">
            <canvas id="custom-line-chart-sample-three" class="center"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider mt-2"></div>

  <!--Blog Card-->
  <div id="card-panel-type" class="section">
    <h4 class="header">Blog Card</h4>
    <div class="row mt-2">
      <div class="col s12 m6 l4 card-width">
        <div class="card-panel border-radius-6 mt-10 card-animation-1">
          <img class="responsive-img border-radius-8 z-depth-4 image-n-margin"
            src="<?php echo e(asset('images/cards/news-fashion.jpg')); ?>" alt="images" />
          <h6><a href="#" class="mt-5">Fashion</a></h6>
          <p>Fashion is a popular style, especially in clothing, footwear, lifestyle, accessories,
            makeup,
            hairstyle and
            body.</p>
          <div class="row mt-4">
            <div class="col s2">
              <a href="#"><img src="<?php echo e(asset('images/user/9.jpg')); ?>" width="40" alt="fashion"
                  class="circle responsive-img mr-3" /></a>
            </div>
            <a href="#">
              <div class="col s3 p-0 mt-1"><span class="pt-2">Taniya</span></div>
            </a>
            <div class="col s7 mt-1 right-align">
              <a href="#"><span class="material-icons">favorite_border</span></a>
              <span class="ml-3 vertical-align-top">340</span>
              <a href="#"><span class="material-icons ml-10">chat_bubble_outline</span></a>
              <span class="ml-3 vertical-align-top">80</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4 card-width">
        <div class="card-panel border-radius-6 mt-10 card-animation-1">
          <img class="responsive-img border-radius-8 z-depth-4 image-n-margin"
            src="<?php echo e(asset('images/cards/news-apple.jpg')); ?>" alt="images" />
          <h6><a href="#" class="mt-5">Apple News</a></h6>
          <p>More than 40% users have reported their new phones won't charge when plugged into
            lightning cables.</p>
          <div class="row mt-4">
            <div class="col s2">
              <a href="#"><img src="<?php echo e(asset('images/user/1.jpg')); ?>" width="40" alt="news"
                  class="circle responsive-img mr-3" /></a>
            </div>
            <a href="#">
              <div class="col s3 p-0 mt-1"><span class="pt-2">Mike</span></div>
            </a>
            <div class="col s7 mt-1 right-align">
              <a href="#"><span class="material-icons">favorite_border</span></a>
              <span class="ml-3 vertical-align-top">434</span>
              <a href="#"><span class="material-icons ml-10">chat_bubble_outline</span></a>
              <span class="ml-3 vertical-align-top">34</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4 card-width">
        <div class="card-panel border-radius-6 mt-10 card-animation-1">
          <img class="responsive-img border-radius-8 z-depth-4 image-n-margin"
            src="<?php echo e(asset('images/cards/news-twitter.jpg')); ?>" alt="" />
          <h6><a href="#" class="mt-5">Twitter Brings Its 'Data Saver'</a></h6>
          <p>Microblogging site Twitter has rolled out its latest update for Android and iOS users
            with the "data
            saver"
            twitter.
          </p>
          <div class="row mt-4">
            <div class="col s2">
              <a href="#"><img src="<?php echo e(asset('images/user/8.jpg')); ?>" width="40" alt="news"
                  class="circle responsive-img mr-3" /></a>
            </div>
            <a href="#">
              <div class="col s3 p-0 mt-1"><span class="pt-2">Emma</span></div>
            </a>
            <div class="col s7 mt-1 right-align">
              <a href="#"><span class="material-icons">favorite_border</span></a>
              <span class="ml-3 vertical-align-top">234</span>
              <a href="#"><span class="material-icons ml-10">chat_bubble_outline</span></a>
              <span class="ml-3 vertical-align-top">45</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider mt-8"></div>

  <!--Social Card-->
  <div id="card-panel-type1" class="section">
    <h4 class="header">Social Card</h4>
    <div class="row">
      <div class="col s12 m6 l4 card-width">
        <div class="card card-border center-align gradient-45deg-indigo-purple">
          <div class="card-content white-text">
            <div class="col s12"><i class="material-icons right">favorite</i></div>
            <img class="responsive-img circle z-depth-4" width="100" src="<?php echo e(asset('images/user/6.jpg')); ?>" alt="" />
            <h5 class="white-text mb-1">Beverly Little</h5>
            <p class="m-0">Senior Product Designer</p>
            <p class="mt-8">
              Creative usable interface & <br />
              designer @Clevision
            </p>
            <a class="waves-effect waves-light btn gradient-45deg-deep-orange-orange border-round mt-7 z-depth-4">Hire
              Me</a>
            <div class="row mt-5">
              <a href="#" class="col s4">
                <h5 class="gradient-45deg-indigo-light-blue icon-background circle white-text z-depth-3 mx-auto">
                  <i class="fab fa-behance"></i>
                </h5>
                <p class="white-text"><b>12.8k</b></p>
                <p class="white-text">Followers</p>
              </a>
              <a href="#" class="col s4">
                <h5 class="icon-background circle gradient-45deg-indigo-blue white-text z-depth-3 mx-auto">
                  <i class="fab fa-linkedin-in"></i>
                </h5>
                <p class="white-text"><b>10.1k</b></p>
                <p class="white-text">Followers</p>
              </a>
              <a href="#" class="col s4">
                <h5 class="icon-background circle gradient-45deg-red-pink white-text z-depth-3 mx-auto">
                  <i class="fab fa-pinterest-p"></i>
                </h5>
                <p class="white-text"><b>8.23k</b></p>
                <p class="white-text">Followers</p>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4 card-width">
        <div class="card card-border center-align gradient-45deg-purple-deep-orange">
          <div class="card-content white-text">
            <div class="col s12"><i class="material-icons right">favorite</i></div>
            <img class="responsive-img circle z-depth-4" width="100" src="<?php echo e(asset('images/user/2.jpg')); ?>"
              alt="images" />
            <h5 class="white-text mb-1">Frank Goodman</h5>
            <p class="m-0">Senior Developer</p>
            <p class="mt-8">
              Creative usable interface & <br />
              developer @Clevision
            </p>
            <a class="waves-effect waves-light btn gradient-45deg-green-teal border-round mt-7 z-depth-4">Hire
              Me</a>
            <div class="row mt-5">
              <a href="#" class="col s4">
                <h5 class="gradient-45deg-indigo-light-blue icon-background circle white-text z-depth-3 mx-auto">
                  <i class="fab fa-behance"></i>
                </h5>
                <p class="white-text">12.8k</p>
                <p class="white-text">Followers</p>
              </a>
              <a href="#" class="col s4">
                <h5 class="icon-background circle gradient-45deg-indigo-blue white-text z-depth-3 mx-auto">
                  <i class="fab fa-linkedin-in"></i>
                </h5>
                <p class="white-text">10.1k</p>
                <p class="white-text">Followers</p>
              </a>
              <a href="#" class="col s4">
                <h5 class="icon-background circle gradient-45deg-red-pink white-text z-depth-3 mx-auto">
                  <i class="fab fa-pinterest-p"></i>
                </h5>
                <p class="white-text">8.23k</p>
                <p class="white-text">Followers</p>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4 card-width">
        <div class="card card-border center-align gradient-45deg-indigo-purple">
          <div class="card-content white-text">
            <div class="col s12"><i class="material-icons right">favorite</i></div>
            <img class="responsive-img circle z-depth-4" width="100" src="<?php echo e(asset('images/user/8.jpg')); ?>"
              alt="images" />
            <h5 class="white-text mb-1">Luiza Ales</h5>
            <p class="m-0">Graphic Designer</p>
            <p class="mt-8">
              Creative usable interface & <br />
              designer @Clevision
            </p>
            <a class="waves-effect waves-light btn gradient-45deg-deep-orange-orange border-round mt-7 z-depth-4">Hire
              Me</a>
            <div class="row mt-5">
              <a href="#" class="col s4">
                <h5 class="gradient-45deg-indigo-light-blue icon-background circle white-text z-depth-3 mx-auto">
                  <i class="fab fa-behance"></i>
                </h5>
                <p class="white-text">12.8k</p>
                <p class="white-text">Followers</p>
              </a>
              <a href="#" class="col s4">
                <h5 class="icon-background circle gradient-45deg-indigo-blue white-text z-depth-3 mx-auto">
                  <i class="fab fa-linkedin-in"></i>
                </h5>
                <p class="white-text">10.1k</p>
                <p class="white-text">Followers</p>
              </a>
              <a href="#" class="col s4">
                <h5 class="icon-background circle gradient-45deg-red-pink white-text z-depth-3 mx-auto">
                  <i class="fab fa-pinterest-p"></i>
                </h5>
                <p class="white-text">8.23k</p>
                <p class="white-text">Followers</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider mt-2"></div>

  <!--Flat Card With Redio & chips-->
  <div id="card-with-radio-chips" class="section">
    <h4 class="header">Card With Radio & Chips</h4>
    <div class="row">
      <div class="col s12 m6 l4">
        <div class="card deep-purple">
          <div class="card-content white-text right-align pr-0">
            <span class="card-title position-absolute">Video</span>
            <img class="responsive-img" src="<?php echo e(asset('images/cards/camara.png')); ?>" alt="images" />
          </div>
          <div class="card-action pt-0">
            <p class="white-text">Default Quality</p>
            <div class="chip">720p <i class="close material-icons">close</i></div>
            <div class="chip">1080p <i class="close material-icons">close</i></div>
          </div>
          <div class="card-action pt-0">
            <p class="white-text">Save Video Quality</p>
            <div class="switch">
              <label> Off <input type="checkbox" /> <span class="lever"></span> On </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card red darken-2">
          <div class="card-content white-text right-align pr-0">
            <span class="card-title position-absolute">Music</span>
            <img class="responsive-img" src="<?php echo e(asset('images/cards/headphones.png')); ?>" alt="images" />
          </div>
          <div class="card-action pt-0">
            <p class="white-text">Default Quality</p>
            <div class="chip">192kb <i class="close material-icons">close</i></div>
            <div class="chip">320kb <i class="close material-icons">close</i></div>
          </div>
          <div class="card-action pt-0">
            <p class="white-text">Save Video Quality</p>
            <div class="switch">
              <label> Off <input type="checkbox" /> <span class="lever"></span> On </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l4">
        <div class="card black">
          <div class="card-content white-text right-align pr-0">
            <span class="card-title position-absolute">iPad</span> <img class="responsive-img"
              src="<?php echo e(asset('images/cards/ipad.png')); ?>" alt="images" />
          </div>
          <div class="card-action pt-0">
            <p class="white-text">Storage</p>
            <div class="chip">64gb <i class="close material-icons">close</i></div>
            <div class="chip">128gb <i class="close material-icons">close</i></div>
          </div>
          <div class="card-action pt-0">
            <p class="white-text">Color</p>
            <div class="switch">
              <label> Glod <input type="checkbox" /> <span class="lever"></span> Black
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider mt-2"></div>

  <!--E-commerce Card-->
  <div id="image-card" class="section">
    <h4 class="header">E-commerce Card</h4>
    <p>Here is the standard card with an image thumbnail.</p>
    <div class="row">
      <div class="col s12 m4">
        <div class="card gradient-45deg-light-blue-cyan">
          <div class="card-content white-text center">
            <h6 class="card-title font-weight-400">Apple Watch</h6>
            <img src="<?php echo e(asset('images/cards/watch.png')); ?>" alt="images" class="responsive-img" />
            <p>
              The Apple Watch, <br />
              all time witch will suit any time
            </p>
          </div>
          <div class="card-action border-non center">
            <a class="waves-effect waves-light btn gradient-45deg-red-pink box-shadow">$
              299/-</a>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card blue-grey darken-4">
          <div class="card-content white-text center">
            <span class="card-title blue-grey-text lighten-4 font-weight-400">The Asics
              Shoes</span>
            <img src="<?php echo e(asset('images/cards/shoes.png')); ?>" alt="images" class="responsive-img" />
            <p class="blue-grey-text lighten-4">
              Buy White Shoes for Men <br />
              online Huge selection of White Men
            </p>
          </div>
          <div class="card-action border-non center">
            <a class="waves-effect waves-light btn gradient-45deg-cyan-light-green black-text">$
              159/-</a>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card gradient-45deg-red-pink">
          <div class="card-content white-text center">
            <h6 class="card-title font-weight-400">iPhone</h6>
            <img src="<?php echo e(asset('images/cards/iphonec.png')); ?>" alt="images" class="responsive-img" />
            <p>
              The Apple iPhone, <br />
              all time witch will suit any time
            </p>
          </div>
          <div class="card-action border-non center">
            <a class="waves-effect waves-light btn gradient-45deg-blue-indigo box-shadow">$
              299/-</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m4">
        <div class="card blue-grey darken-4 bg-image-1">
          <div class="card-content white-text">
            <span class="card-title font-weight-400 mb-10">Macbook Pro</span>
            <p>
              Buy Macbook <br />
              online Huge selection of Apple
            </p>
            <div class="border-non mt-5">
              <a class="waves-effect waves-light btn red border-round box-shadow">$
                1,249/-</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="card blue-grey darken-4 bg-image-2">
          <div class="card-content white-text">
            <span class="card-title font-weight-400 mb-10">iPhone 8</span>
            <p>
              Buy iPhone <br />
              online Huge selection of Apple
            </p>
            <div class="border-non mt-5">
              <a class="waves-effect waves-light btn red border-round box-shadow">$
                769/-</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m4">
        <div class="black-overlay">
          <div class="card bg-image-3">
            <div class="card-content white-text">
              <span class="card-title font-weight-400 mb-10">Apple Watch</span>
              <p>
                Buy Watch <br />
                online Huge selection of Apple
              </p>
              <div class="border-non mt-5">
                <a class="waves-effect waves-light btn red border-round box-shadow">$
                  269/-</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="divider mt-2"></div>

  <!--Food Card-->
  <div id="card-panel-type2" class="section">
    <h4 class="header">Shoes Card</h4>
    <p>For a simpler card with less markup, try using a card panel which just has padding and a shadow effect
    </p>
    <div class="row">
      <div class="col s12 m6">
        <div class="card">
          <div class="card-content center yellow">
            <h6 class="card-title font-weight-400">Order Online</h6>
            <p>Best Sport Shoes in the world</p>
            <a class="waves-effect waves-light btn red fixed-margin mt-3">Order Now</a>
          </div>
          <div class="card-tabs">
            <ul class="tabs tabs-fixed-width">
              <li class="tab"><a href="#test4">Nike</a></li>
              <li class="tab"><a class="active" href="#test5">Puma</a></li>
              <li class="tab"><a href="#test6">Reebok</a></li>
            </ul>
          </div>
          <div class="card-content">
            <div id="test4" class="center"><img src="<?php echo e(asset('images/cards/nike.png')); ?>" alt="images" /></div>
            <div id="test5" class="center"><img src="<?php echo e(asset('images/cards/puma.png')); ?>" alt="images" /></div>
            <div id="test6" class="center"><img src="<?php echo e(asset('images/cards/reebok.png')); ?>" alt="images" /></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('vendor-script'); ?>
<script src="<?php echo e(asset('vendors/chartist-js/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/chartjs/chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('fonts/fontawesome/js/all.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('js/scripts/cards-extended.js')); ?>"></script>
<script src="<?php echo e(asset('js/custom/custom-script.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\edkonnect\resources\views\pages\cards-extended.blade.php ENDPATH**/ ?>