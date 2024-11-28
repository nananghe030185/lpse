<?php

/**
 * API Wrapper to get RUP fron LKPP Sites (sirup.lkpp.go.id)
 * @author Habli Muhammad Rizal <rizalmovic@gmail.com>
 * @version 0.1
 */

namespace OrangeSyrup;

class Orange
{

	public $sirup;

	public function __construct(Sirup $sirup)
	{
		$this->sirup = $sirup;
	}

	/**
	 * Get RUP by KLDI ID
	 * @param  string  $code  [kode KLDI]
	 * @param  integer $limit [limit hasil pencarian]
	 * @param  string  $query [keyword]
	 * @return array|json
	 */
	public function getByKLDI_ID($code = '', $year = '', $limit = 10, $query = '')
	{
		$params = [
			'type' 	=> 'kldi',
			'code' 	=> $code,
			'year'	=> $year ? $year : date('YYYY', strtotime('now')),
			'limit' => $limit,
			'query'	=> $query
		];
		return $this->sirup->get($params);
	}

	/**
	 * Get RUP Lelang by Satker ID
	 * @param  string  $code  [kode satker]
	 * @param  integer $limit [limit hasil pencarian]
	 * @param  string  $query [keyword]
	 * @return array|json
	 */
	public function getLelangBySatker_ID($code = '', $year = '', $limit = 10, $query = '')
	{
		$params = [
			'type' 	=> 'satker-lelang',
			'code' 	=> $code,
			'year'	=> $year ? $year : date('YYYY', strtotime('now')),
			'limit' => $limit,
			'query'	=> $query
		];

		return $this->sirup->get($params);
	}

	/**
	 * Get RUP Swakelola by Satker ID
	 * @param  string  $code  [kode satker]
	 * @param  integer $limit [limit hasil pencarian]
	 * @param  string  $query [keyword]
	 * @return array|json
	 */
	public function getSwakelolaBySatker_ID($code = '', $year = '', $limit = 10, $query = '')
	{
		$params = [
			'type' 	=> 'satker-swakelola',
			'code' 	=> $code,
			'year'	=> $year ? $year : date('YYYY', strtotime('now')),
			'limit' => $limit,
			'query'	=> $query
		];

		return $this->sirup->get($params);
	}

	/**
	 * Get RUP by Paket ID
	 * @param  string  $code  [kode paket]
	 * @param  integer $limit [limit hasil pencarian]
	 * @param  string  $query [keyword]
	 * @return array|json
	 */
	// public function getByPaket_ID($code = '', $limit = 10, $query = '')
	// {
	// 	$params = [
	// 		'type' 	=> 'satker',
	// 		'code' 	=> $code,
	// 		'year'	=> $year ? $year : date('YYYY', strtotime('now')),
	// 		'limit' => $limit,
	// 		'query'	=> $query
	// 	];

	// 	return $this->sirup->get($params);
	// }

}
