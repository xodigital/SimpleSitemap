# Simple Sitemap 1.1.0

Simple Sitemap automatically generates an XML [sitemap](http://www.sitemaps.org/) file for
your Craft website.

The generated sitemap is available at `/sitemap.xml` and contains a URL and last modified
date for every entry in the Craft website. It does not contain change frequencies and has
only a very naîve value for priority: 0.75 for the home page, 0.5 for all other entries.

## Installing

1. Copy the `simplesitemap` directory into your `craft/plugins` directory
2. Browse to Settings > Plugins in the Craft CP
3. Click on the Install button next to Simple Sitemap
4. Browse to `http://yoursite.com/sitemap.xml` and see the result of your hard work!

## Updates
* 1.2.0.
	* Added support for PHP 5.3
* 1.1.0
	* Add excludeIds config setting
  	'sitemap' => array(
          'excludeIds' => array(342, 339)
     	),
* 1.0.0
	* Initial release!
