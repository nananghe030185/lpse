<?php

/**
 * API Wrapper to get RUP fron LKPP Sites (sirup.lkpp.go.id)
 * @author Habli Muhammad Rizal <rizalmovic@gmail.com>
 * @version 0.1
 */

namespace OrangeSyrup;

use GuzzleHttp\Client;

class Sirup
{

	public $client;
	public $protocol;
	public $host;
	public $url;

	public function __construct(Client $client, $params = array())
	{
		$this->protocol = isset($params['protocol']) ? $params['protocol'] : 'http';
		$this->host 	= isset($params['host']) ? $params['host'] : 'sirup.lkpp.go.id';
		$this->url 		= isset($params['url']) ? $params['url'] : 'sirup/datatablectr/';
		$this->client 	= $client;
	}

	/**
	 * Get JSON
	 * array['query']   string 	[query]
	 * array['type']	string 	['satker' or 'paket'. default 'satker'.]
	 * array['code']	string 	[kode satker]
	 * array['limit']   integer [jumlah pencarian dalam satu halaman]
	 * @param  array  $params
	 * @return array | null
	 */
	public function get($params = array())
	{
		$path = '';
		$q = [
			'query' => [
				'tahun'	 => $params['year'],
				'sEcho'	 => 1,
				'iDisplayStart' => 0,
				'iDisplayLength' => $params['limit'],
				'sSearch'	=> $params['query']
			]
		];

		switch ($params['type']) {
			case 'kldi':
				$this->url = $this->url . 'datatableruprekapkldi';
				$q['query']['idKldi'] = $params['code'];
				break;
			case 'satker-lelang':
				$this->url = $this->url . 'dataruppenyediasatker';
				$q['query']['idSatker'] = $params['code'];
				break;
			case 'satker-swakelola':
				$this->url = $this->url . 'datarupswakelolasatker';
				$q['query']['idSatker'] = $params['code'];
				break;
			default:
				# code...
				break;
		}

		return $this->client->request('GET', $this->protocol . '://' . $this->host . '/' . $this->url, $q);
	}
}
