import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

// import './lib/demosite';

import './vendor/stickyfooter.js';

// import './vendor/classie';

import './vendor/slick.min';

import './vendor/js.cookie.js';

// import './vendor/jquery.swipebox.min';

// import './vendor/instafeed.js';

import './vendor/imagesloaded.pkgd.min.js';

import './vendor/lazysizes.min.js';

import './vendor/jquery.waypoints.min.js';

$(document).ready(function() {
  $(document).foundation();
});
