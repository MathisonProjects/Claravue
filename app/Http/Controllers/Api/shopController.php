<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\shopCategories;
use App\Models\shopProducts;
use App\Models\shopTransactions;

class shopController extends Controller
{
    public function allCategories() {
    	return shopCategories::get();
    }
	public function allItems() {
		$products = shopProducts::get();

		foreach ($products as $key => $product) {
			$products[$key]->categories = json_decode($product->categories);
			$products[$key]->meta = json_decode($product->meta);
		}
    	return $products;
	}

	public function allTransactions() {
    	return shopTransactions::get();
	}

	public function saveCategory(Request $request) {
		shopCategories::updateOrCreate($request->input());
	}

	public function saveItem(Request $request) {
		$data = $request->input();

        if (isset($data['id'])) {
            $item = shopProducts::find($data['id']);
        } else {
            $item = new shopProducts;
        }

        $item->sku = $data['sku'];
		$item->categories = $data['categories'];
		$item->name = $data['name'];
		$item->short_description = $data['short_description'];
		$item->long_description = $data['long_description'];
		$item->amount = $data['amount'];
		$item->meta = $data['meta'];
        $item->save();
	}

	public function saveTransaction(Request $request) {
		shopTransactions::updateOrCreate($request->input());
	}

	public function deleteCategory(Request $request) {
		$modelToDelete = shopCategories::find($request->input('id'));
        $modelToDelete->delete();
	}

	public function deleteItem(Request $request) {
		$modelToDelete = shopProducts::find($request->input('id'));
        $modelToDelete->delete();
	}

	public function deleteTransaction(Request $request) {
		$modelToDelete = shopTransactions::find($request->input('id'));
        $modelToDelete->delete();
	}
}
