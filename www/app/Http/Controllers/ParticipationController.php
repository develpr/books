<?php

namespace Books\Http\Controllers;

use Books\Domain\BookExchange;
use Books\Domain\BookExchangeParticipation;
use Books\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\DatabaseManager as DB;

class ParticipationController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUsesCurrentExchangeParticipation(Request $request) {
        /** @var User $user */
        $user = \Auth::user();

        /** @var BookExchange $bookExchange */
        $bookExchange = BookExchange::where('send_by_date', '>=', new \DateTime('today'))->first();

        /** @var BookExchangeParticipation $participation */
        $participation = BookExchangeParticipation::firstOrCreate([
            'book_exchange_id' => $bookExchange->id,
            'receiver_user_id' => $user->id
        ]);


        return $participation;

    }

}
