<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Mail;
use Exception;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'body' => 'Hello world!'
        ];

        try {
            Mail::to('leong.shi.yun@gmail.com')->send(new MailNotify($data));
            return response()
                ->json([
                    'status' => 'SUCCESS',
                    'message' => 'Email has been sent. Check you inbox.'
                ]);
        } catch(Exception $e) {
            throw($e);
            // return response()
            //     ->json([
            //         'status' => 'FAILED',
            //         'message' => 'Oops, something went wrong.'
            //     ]);
        }
    }
}
