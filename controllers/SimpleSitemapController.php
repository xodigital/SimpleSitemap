<?php namespace Craft;

class SimpleSitemapController extends BaseController
{
	protected $allowAnonymous = true;

	public function actionIndex()
	{
		$xml = new \SimpleXMLElement(
			'<?xml version="1.0" encoding="UTF-8"?>' .
			'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"/>'
		);

		$criteria = craft()->elements->getCriteria(ElementType::Entry);
		$criteria->limit = null;

		$excludeList = array();

		if (craft()->config->exists('sitemap') &&
			array_key_exists('excludeIds', craft()->config->get('sitemap'))) {
                        $config = craft()->config->get('sitemap');
                        $excludeList = $config['excludeIds'];
		}


			foreach ($criteria as $entry) {
			if($entry->url && !in_array($entry->id, $excludeList)) {
				$url = $xml->addChild('url');
				$url->addChild('loc', $entry->url);
				$url->addChild('lastmod', $entry->dateUpdated->format(\DateTime::W3C));
				$url->addChild('priority', $entry->uri == '__home__' ? 0.75 : 0.5);
			}
		}

		HeaderHelper::setContentTypeByExtension('xml');
		ob_start();
		echo $xml->asXML();
		craft()->end();
	}
}
