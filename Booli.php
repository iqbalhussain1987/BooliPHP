<?php
require('BooliPHP.php');

/**
 * Implementation of Booli API
 * @author Niklas Fors [niklas.fo.git@gmail.com]
 * @package BooliPHP
 * @copyright 2012 Niklas Fors
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://github.com/niklasfo/BooliPHP
 */
class Booli extends BooliPHP {
	/**
	 * Get listing from Booli
	 * @param string $area Area to search in
	 * @param array $filter (optional) Extra parameters to send to Booli
	 * @param int $offset (optional) Offset from beginning to return result form
	 * @param int $limit (optional) Number of results
	 * @return array Result from Booli
	 */
	public function getListing( $area, array $filter = null, $offset = 0, $limit = 1000 ){
		$params = $this->getAuthenticateArray();
		$params['offset'] = $offset;
		$params['limit'] = $limit;

		//'q' - Area to search for. Format: 'nacka, stockholm'
		$params['q'] = $area;
		//'center' - Coordinate in center of area. Format: '59.334972,18.065504'
		$params['center'] = $filter['center'];
		//'dim' - Dimension of rectangle with center specified in 'center'. Format 'x,y' in meters
		$params['dim'] = $filter['dim'];
		//'bbox' - Coordinates for a rectangluar area. Format 'lat_lo,lng_lo,lat_hi,lng_hi' where 'lo' is southwest and 'hi' is northeast
		$params['bbox'] = $filter['bbox'];
		//'areaId' - Id of area to search in, i.e. '76'. Can be combined, i.e. '76,16'
		$params['areaId'] = $filter['areaId'];

		//'minPrice' - Minimum price of object. Format: x in SEK
		$params['minPrice'] = $filter['minPrice'];
		//'maxPrice' - Maximum price of object. Format: x in SEK
		$params['maxPrice'] = $filter['maxPrice'];

		//'minRooms' - Minimum number of rooms in object. Format: x (float)
		$params['minRooms'] = $filter['minRooms'];
		//'maxRooms' - Maximum number of rooms in object. Format: x (float)
		$params['maxRooms'] = $filter['maxRooms'];

		//'maxRent' - Maximum rent of object. Format: x in SEK
		$params['maxRent'] = $filter['maxRent'];

		//'minLivingArea' - Minimum living area. Format: x in m^2 (float)
		$params['minLivingArea'] = $filter['minLivingArea'];
		//'maxLivingArea' - Maximum living area. Format: x in m^2 (float)
		$params['maxLivingArea'] = $filter['maxLivingArea'];

		//'minPlotArea' - Minimum area of plot. Format: x in m^2 (float)
		$params['minPlotArea'] = $filter['minPlotArea'];
		//'maxPlotArea' - Maximum area of plot. Format: x in m^2 (float)
		$params['maxPlotArea'] = $filter['maxPlotArea'];

		//'objectType' - Type of object. On of 'villa', 'lägenhet', 'gård', 'tomt-mark', 'fritidshus',
		//'parhus', 'radhus' or 'kedjehus'. Multiple values in comma separated list.
		$params['objectType'] = $filter['objectType'];

		//'minCreated' - Earliest date when object was published. Format 'yyyymmdd'
		$params['minCreated'] = $filter['minCreated'];
		//'maxCreated' - Latest date when object was published. Format 'yyyymmdd'
		$params['maxCreated'] = $filter['maxCreated'];


		//Build parameter list to send to Booli
		$path = '/listings?' . http_build_query($params);

		//Do call to Booli and return result
		$result = $this->request($path);
		return json_decode($result);
	}
}
?>
