# Allonsy (a FoundationPress fork)

[![license](https://img.shields.io/npm/l/color-name-list.svg?colorB=ff77b4)](https://github.com/olefredrik/FoundationPress/blob/master/MIT-LICENSE.txt)

This is a starter-theme for WordPress based on Foundation 6, the most advanced responsive (mobile-first) framework in the world. The purpose of Allonsy, is to act as a small and handy toolbox that contains the essentials needed to build any design. Allonsy is meant to be a starting point, not the final product.

Please fork, copy, modify, delete, share or do whatever you like with this.

All contributions are welcome!

## Requirements

**This project requires [Node.js](http://nodejs.org) v4.x.x to v6.11.x to be installed on your machine.** Please be aware that you might encounter problems with the installation if you are using the most current Node version (bleeding edge) with all the latest features.

Allonsy uses [Sass](http://Sass-lang.com/) (CSS with superpowers). In short, Sass is a CSS pre-processor that allows you to write styles more effectively and tidy.

The Sass is compiled using libsass, which requires the GCC to be installed on your machine. Windows users can install it through [MinGW](http://www.mingw.org/), and Mac users can install it through the [Xcode Command-line Tools](http://osxdaily.com/2014/02/12/install-command-line-tools-mac-os-x/).

If you have not worked with a Sass-based workflow before, I would recommend reading [FoundationPress for beginners](https://foundationpress.olefredrik.com/posts/tutorials/foundationpress-for-beginners), a short blog post that explains what you need to know.

## Quickstart

### 1. Clone the repository and install with npm
```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://github.com/uptownstudios/allonsy2.git
$ cd allonsy2
$ npm install (on Plesk its /opt/plesk/node/6/bin/npm install)
```

### 2. Configuration

#### YAML config file
Allonsy includes a `config-default.yml` file. To make changes to the configuration, make a copy of `config-default.yml` and name it `config.yml` and make changes to that file. The `config.yml` file is ignored by git so that each environment can use a different configuration with the same git repo.

At the start of the build process a check is done to see if a `config.yml` file exists. If `config.yml` exists, the configuration will be loaded from `config.yml`. If `config.yml` does not exist, `config-default.yml` will be used as a fallback.

#### Browsersync setup
If you want to take advantage of [Browsersync](https://www.browsersync.io/) (automatic browser refresh when a file is saved), simply open your `config.yml` file after creating it in the previous step, and put your local dev-server address and port (e.g http://localhost:8888) in the `url` property under the `BROWSERSYNC` object.

### 3. Get started

```bash
$ npm start (on Plesk its /opt/plesk/node/6/bin/npm start)
```

### 4. Compile assets for production

When building for production, the CSS and JS will be minified. To minify the assets in your `/dist` folder, run

```bash
$ npm run build  (on Plesk its /opt/plesk/node/6/bin/npm run build)
```

### Project structure

In the `/src` folder you will the working files for all your assets. Every time you make a change to a file that is watched by Gulp, the output will be saved to the `/dist` folder. The contents of this folder is the compiled code that you should not touch (unless you have a good reason for it).

The `/page-templates` folder contains templates that can be selected in the Pages section of the WordPress admin panel. To create a new page-template, simply create a new file in this folder and make sure to give it a template name.

I guess the rest is quite self explanatory. Feel free to ask if you feel stuck.

### Styles and Sass Compilation

 * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

 * `src/assets/scss/app.scss`: Make imports for all your styles here
 * `src/assets/scss/global/*.scss`: Global settings
 * `src/assets/scss/components/*.scss`: Buttons etc.
 * `src/assets/scss/modules/*.scss`: Topbar, footer etc.
 * `src/assets/scss/templates/*.scss`: Page template styling

 * `dist/assets/css/app.css`: This file is loaded in the `<head>` section of your document, and contains the compiled styles for your project.

If you're new to Sass, please note that you need to have Gulp running in the background (``npm start``), for any changes in your scss files to be compiled to `app.css`.

### JavaScript Compilation

All JavaScript files in the `src/assets/js` folder, along ith Foundation and its dependencies, are bundled into one file called `app.js`. The files are imported using module dependency with [webpack](https://webpack.js.org/) as the module bundler.

If you're unfamiliar with modules and module bundling, check out [this resource for node style require/exports](http://openmymind.net/2012/2/3/Node-Require-and-Exports/) and [this resource to understand ES6 modules](http://exploringjs.com/es6/ch_modules.html).

Foundation modules are loaded in the `src/assets/js/app.js` file. By default all components are loaded. You can also pick and choose which modules to include. Just follow the instructions in the file.

## Demo

* [Clean Allonsy install](https://allonsytheme.com)

## Local Development
We recommend using one of the following setups for local WordPress development:

* [MAMP](https://www.mamp.info/en/) (macOS)
* [WAMP](http://www.wampserver.com/en/download-wampserver-64bits/) (Windows)
* [LAMP](https://www.linux.com/learn/easy-lamp-server-installation) (Linux)
* [Local](https://local.getflywheel.com/) (macOS/Windows)
* [VVV (Varying Vagrant Vagrants)](https://github.com/Varying-Vagrant-Vagrants/VVV) (Vagrant Box)
* [Trellis](https://roots.io/trellis/)

## Resources

* [Foundation UI Kit for Adobe XD](https://gumroad.com/l/foundation-ui-kit-xd)
* [Foundation UI Kit for Axure RP](https://gumroad.com/l/foundation-ui-kit-axure-rp)
* [Foundation UI Kit for Photoshop](https://gumroad.com/l/foundation-ui-kit-psd)
* [Foundation 6 Shortcodes for Visual Composer](https://www.402websites.com/downloads/foundation-6-shortcodes-visual-composer/?ref=2&campaign=Foundation6ShortcodesforVisualComposer)


## Tutorials

* [FoundationPress for beginners](https://foundationpress.olefredrik.com/posts/tutorials/foundationpress-for-beginners/)
* [Responsive images in WordPress with Interchange](http://rachievee.com/responsive-images-in-wordpress/)
* [Learn to use the _settings file to change almost every aspect of a Foundation site](http://zurb.com/university/lessons/66)
* [Other lessons from Zurb University](http://zurb.com/university/past-lessons)

## Documentation

* [Zurb Foundation Docs](http://foundation.zurb.com/docs/)
* [WordPress Codex](http://codex.wordpress.org/)

## Showcase

* [Betty Yee for State Controller](https://bettyyee.com)
* [Chalk It Up!](https://chalkitup.org)
* [CommuniCare](https://www.communicarehc.org)
* [Corner Drug Co.](https://cornerdrugco.com)
* [The Almonte Center](https://dralmonte.com)
* [Highlands Community Charter Schools](https://www.hccts.org)
* [Mickies Miracles](https://mickiesmiracles.org)
* [OnTarget Consulting](https://ontargetconsulting.net)
* [Peach Tree Health](https://pickpeach.org)
* [RIL Sacramento](https://ril-sacramento.org)
* [Santa Clara County Dental Society](https://sccds.org)
* [Sutter Park Neighborhood](https://sutterparkneighborhood.com)
* [Turning Point Community Programs](https://www.tpcp.org)
* [Tri-City Health](https://tri-cityhealth.org)
* [ZEE Medical](https://zeesac.com)


>Credit goes to all the brilliant designers and developers out there. Have **you** made a site that should be on this list? [Please let me know](https://twitter.com/uptownbrent)

## Contributing
#### Here are ways to get involved:

1. [Star](https://github.com/uptownstudios/allonsy2/stargazers) the project!
2. Answer questions that come through [GitHub issues](https://github.com/uptownstudios/allonsy2/issues)
3. Report a bug that you find
4. Share a theme you've built on top of Allonsy

#### Pull Requests

Pull requests are highly appreciated. Please follow these guidelines:

1. Solve a problem. Features are great, but even better is cleaning-up and fixing issues in the code that you discover
2. Make sure that your code is bug-free and does not introduce new bugs
3. Create a [pull request](https://help.github.com/articles/creating-a-pull-request)
4. Verify that all the Travis-CI build checks have passed
