<?php

namespace Books\Http\Controllers;

use Books\Domain\BookExchange;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\DatabaseManager as DB;

class BookExchangeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const DEFAULT_LIMIT = 5;
    const LIMIT_MAX = 50;

    public function getPreviousExchange() {

    }

    public function getCurrentExchange() {
        return BookExchange::first();
    }

    public function allExchanges(Request $request, DB $db) {

        $limit = self::DEFAULT_LIMIT;

        $inputLimit = $request->get('limit');

        if($inputLimit && is_numeric($inputLimit) && intval($inputLimit) > 0 && intval($inputLimit) <= self::LIMIT_MAX)
        {
            $limit = $inputLimit;
        }

        return \DB::table('book_exchanges')->take($limit)->latest()->get();
        return BookExchange::all()->take($limit)->latest();
    }

}
