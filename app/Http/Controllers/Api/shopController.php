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
    	return shopProducts::get();
	}

	public function allTransactions() {
    	return shopTransactions::get();
	}

	public function saveCategory(Request $request) {
		shopCategories::updateOrCreate($request->input());
	}

	public function saveItem(Request $request) {
		shopProducts::updateOrCreate($request->input());
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
