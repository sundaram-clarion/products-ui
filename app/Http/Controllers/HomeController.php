<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function productList()
	{
		$products = $this->getData();
		return view('welcome', ['data' => $products]);
	}
	
	public function details($id)
	{
		$detail = [];
		$products = $this->getData();
		if ($products['products']['status'] == 200 && isset($products['products']['list']->data) && count($products['products']['list']->data)) {
			$records = collect($products['products']['list']->data);
			$res = $records->where('id', $id);
			$detail['product'] = $res->all();
			if (isset($products['reviews']['list']->data->data)) {
				$records1 = collect($products['reviews']['list']->data->data);
				$res1 = $records1->where('productId', $id);
				$detail['reviews'] = $res1->all();
			}
		}	
		return view('details', ['data' => $detail]);
	}
	
	public function getData()
	{
		$data = [];
		$client = new \GuzzleHttp\Client();
		$response = $client->request('GET', 'http://shop.com/v1/products');
		$data['products']['status'] = $response->getStatusCode();
		$contents = $response->getBody()->getContents();
		$data['products']['list'] = json_decode($contents);
		
		$reviewResponse = $client->request('GET', 'http://shop.com/v1/product/reviews');
		$data['reviews']['status'] = $reviewResponse->getStatusCode();
		$contents = $reviewResponse->getBody()->getContents();
		$data['reviews']['list'] = json_decode($contents);	
		return $data;
	}
}
