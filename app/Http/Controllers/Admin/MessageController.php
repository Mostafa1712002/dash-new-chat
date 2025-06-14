<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\FacebookPage;
use App\Models\FacebookMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\FacebookPageRequest;
use App\Models\FacebookConversation;

class MessageController extends Controller
{



    public function index($conversation_id)
    {
        $model = FacebookConversation::where('conversation_id', $conversation_id)->first();
        if (!$model) {
            return abort(404);
        }
        $messages = $model->messages;
        // if ($model->participants) {
        $value = json_decode($model->participants, true);
        $to = (object) $value['data'][0];
        // }else{
        //     $to = (object) [];
        //     $to->name = '';
        //     $to->id = '';
        // }
        return view('admin.facebook.messages', get_defined_vars());
    }


    public function store($conversation_id)
    {
        //     curl -X POST "https://graph.facebook.com/v22.0/{PAGE_ID}/messages" \
        //   -d "recipient={'id':'{PSID}'}" \
        //   -d "messaging_type=RESPONSE" \
        //   -d "message={'text':'hello, world'}" \
        //   -d "access_token={PAGE_ACCESS_TOKEN}"
        $model = FacebookConversation::where('conversation_id', $conversation_id)->first();
        if (!$model) {
            return abort(404);
        }
        $value = json_decode($model->participants, true);
        $to = (object) $value['data'][0];
        $link = 'https://graph.facebook.com/v22.0/' . $model->page->page_id . '/messages?recipient={"id":"' . $to->id . '"}&messaging_type=RESPONSE&message={"text":"hello, world"}&access_token=' . $model->page->page_access_token;

        $response = $this->messageApi($link);
    }


    public function messageApi($link)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $link,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        return $response;
    }


}
