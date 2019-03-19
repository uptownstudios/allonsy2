<?php

/**** TABLE OF CONTENTS ****/
// 0. Other Functions
// 1. Allow the upload of SVG graphics to Media Library
// 2. Add 'mobile' to body class on mobile device
// 3. Add not-home to body class
// 4. Adding portfolio items into search results with posts and pages
// 5. ACF Local Field Groups
// 6. Enqueue Scripts
// 7. Custom pagination
// 8. Add new image sizes
// 9. Custom Excerpt Length
// 10. AJAX Blog Loop Load Posts

/**** TABLE OF CONTENTS ****/


// 0. Other functions
require_once( 'custom-functions/other-functions.php' );


// 1. Allow the upload of SVG graphics to Media Library
require_once( 'custom-functions/upload-svg.php' );


// 2. Add 'mobile' to body class on mobile device
require_once( 'custom-functions/mobile-body-class.php' );


// 3. Add not-home to body class
require_once( 'custom-functions/not-home-body-class.php' );


// 4. Adding portfolio items into search results with posts and pages
require_once( 'custom-functions/portfolio-in-search.php' );


// 5. ACF Local Field Groups - Portfolio Options (just a gallery of images, but perhaps more to come)
require_once( 'custom-functions/portfolio-options.php' );


// 6. Enqueue Scripts
require_once( 'custom-functions/bs-enqueue-scripts.php' );


// 7. Custom pagination
require_once( 'custom-functions/custom-pagination.php' );


// 8. Add new image sizes
require_once( 'custom-functions/bs-image-sizes.php' );


// 9. Custom Excerpt Length
require_once( 'custom-functions/custom-excerpt-length.php' );


// 10. AJAX Blog Loop Load Posts
require_once( 'custom-functions/bs-ajax-blog-loop-load-posts.php' );
