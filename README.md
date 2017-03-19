## Descrption

This is fork of WordPress plugin boilerpate combined with [Roots Sage](https://github.com/roots/sage) webpack build script.
Plugin includes modified files from original [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate) version but with stripped comments which should save you time of renaming all classes and filenames and othere included information that is just waste of time.

[Plugin Boilerplate generator](https://wppb.me/) kind of saves time but you still end up having to rename bunch of things before you can get started to actually do some work you would like to.
To fight against name colisions PHP namespaces are included in this plugin so be sure to rename base namespace in all files.

Folder structure is still the same as the original, only difference is that assets are moved to 'dist' directory instead of having them separated for admin/public area.

Plugin includes composer.json file with example how to copy files from vendor directory to 'lib' directory.
If you would like to manage php dependencies with composer, just include them in composer.json like you usually do and add them to 'CopyWebpackPlugin' in /assets/build/webpack.config.js L:130'.
This will copy all of your plugin required files into 'lib' directory and you can then include them in your plugin from there.
Not really sure would autoload work out of the box within WordPress plugins that are ment to be installed from WordPress repository via plugin installer.


## Features

* Sass for stylesheets
* ES6 for JavaScript
* [Webpack](https://webpack.github.io/) for compiling assets, optimizing images, and concatenating and minifying files
* [Browsersync](http://www.browsersync.io/) for synchronized browser testing


## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](http://php.net/manual/en/install.php) >= 5.6.4
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install)


## Plugin Installation

Fork or clone repository in your local dir
* `yarn` — navigate to the plugin directory and run yarn
* `composer install` — Install composer dependencies
* `yarn run build` - Initial build
* `yarn run start` - 'Watch'



### Install dependencies

From the command line on your host machine (not on your Vagrant development box), navigate to the theme directory then run `yarn`:

```shell
# @ wp-plugins/your-plugin-name/
$ yarn
```

You now have all the necessary dependencies to run the build process.

### Build commands

* `yarn run start` — Compile assets when file changes are made, start Browsersync session
* `yarn run build` — Compile and optimize the files in your assets directory
* `yarn run build:production` — Compile assets for production

#### Additional commands

* `yarn run rmdist` — Remove your `dist/` folder
* `yarn run lint` — Run ESLint against your assets and build scripts
* `composer test` — Check your PHP for PSR-2 compliance with `phpcs`

### Using Browsersync

To use Browsersync you need to update `devUrl` at the bottom of `assets/config.json` to reflect your local development hostname.

If your local development URL is `https://project-name.dev`, update the file to read:
```json
...
  "devUrl": "https://project-name.dev",
...
```

If you are not using [Bedrock](https://roots.io/bedrock/), update `publicPath` to reflect your folder structure:

```json
...
  "publicPath": "/wp-plugins/plugin-name/"
...
```

By default, Browsersync will use webpack's [HMR](https://webpack.github.io/docs/hot-module-replacement.html), which won't trigger a page reload in your browser.

If you would like to force Browsersync to reload the page whenever certain file types are edited, then add them to `watch` in `assets/config.json`.

```json
...
  "watch": [
    "assets/scripts/**/*.js",
    "templates/**/*.php",
    "src/**/*.php"
  ],
...
```