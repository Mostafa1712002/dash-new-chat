<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\FacebookConversation;
use App\Models\FacebookMessage;

class ImportDataFromFacebook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data-from-facebook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

     public function handle()
    {

        $pages = DB::table('facebook_pages')->get();
        foreach ($pages as $page) {
         
            $data = $this->conversationApi('https://graph.facebook.com/v18.0/' . $page->page_id . '/conversations?platform=messenger&access_token=' . $page->access_token . '&fields=id,updated_time,link,participants,message_count,unread_count,can_reply,snippet');

            if (isset($data->data)) {
                foreach ($data->data as $value) {
                    $facebook_conversation = FacebookConversation::where('conversation_id', $value->id)->first();
                    if (!$facebook_conversation) {
                        $facebook_conversation = new FacebookConversation();
                    }
                    $facebook_conversation->conversation_id = $value->id;
                    $facebook_conversation->link = $value->link;
                    $facebook_conversation->page_id = $page->page_id;
                    $facebook_conversation->updated_time = \Carbon\Carbon::parse($value->updated_time)->format('Y-m-d H:i:s');
                    $facebook_conversation->conversation_id = $value->id;
                    $facebook_conversation->link = $value->link;
                    $facebook_conversation->participants = json_encode($value->participants);
                    $facebook_conversation->message_count = $value->message_count;
                    $facebook_conversation->unread_count = $value->unread_count;
                    $facebook_conversation->can_reply = $value->can_reply;
                    $facebook_conversation->snippet = $value->snippet;
                    $facebook_conversation->save();
                    if ($facebook_conversation->updated_time != $value->updated_time) {
                        
                    }
                    while (isset($data->paging->next)) {
                        $data = $this->conversationApi($data->paging->next);
                        if (isset($data->data)) {
                            foreach ($data->data as $value) {
                                $facebook_conversation = FacebookConversation::where('conversation_id', $value->id)->first();
                                if (!$facebook_conversation) {
                                    $facebook_conversation = new FacebookConversation();
                                }
                                $facebook_conversation->conversation_id = $value->id;
                                $facebook_conversation->link = $value->link;
                                $facebook_conversation->participants = json_encode($value->participants);
                                $facebook_conversation->message_count = $value->message_count;
                                $facebook_conversation->unread_count = $value->unread_count;
                                $facebook_conversation->can_reply = $value->can_reply;
                                $facebook_conversation->snippet = $value->snippet ?? null;
                                $facebook_conversation->updated_time = \Carbon\Carbon::parse($value->updated_time)->format('Y-m-d H:i:s');
                                $facebook_conversation->page_id = $page->page_id;
                                $facebook_conversation->save();
                            }
                        }
                    }
                }
            }
        }

        $data = FacebookConversation::get()->groupBy("page_id");

        foreach ($data as $page_id => $conversations) {
            $page = DB::table('facebook_pages')->where('page_id', $page_id)->first();
            foreach ($conversations as $conversation) {
                $data_message = $this->messageApi('https://graph.facebook.com/v12.0/' . $conversation->conversation_id . '/messages?access_token=' . $page->access_token . '&fields=id,created_time,message,from,to,attachments,tags,sticker,shares');
                if (isset($data_message['data'])) {
                    foreach ($data_message['data'] as $record) {
                        $facebook_message = FacebookMessage::where('message_id', $record['id'])->first();
                        if (!$facebook_message) {
                            $facebook_message = new FacebookMessage();
                        }
                        $facebook_message->message_id = $record['id'];
                        $facebook_message->conversation_id = $conversation->conversation_id;
                        $facebook_message->created_time = \Illuminate\Support\Carbon::parse($record['created_time'])->format('Y-m-d H:i:s');
                        $facebook_message->message_id = $record['id'];
                        $facebook_message->message = $record['message'];
                        $facebook_message->from = json_encode($record['from']);
                        $facebook_message->to = json_encode($record['to']);
                        $facebook_message->attachments = isset($record['attachments']) ? json_encode($record['attachments']) : null;
                        $facebook_message->tags = isset($record['tags']) ? json_encode($record['tags']) : null;
                        $facebook_message->sticker = isset($record['sticker']) ? json_encode($record['sticker']) : null;
                        $facebook_message->shares = isset($record['shares']) ? json_encode($record['shares']) : null;
                        $facebook_message->save();
                    }
                }
                while (isset($data_message->paging->next)) {
                    $data_message = $this->messageApi($data_message->paging->next);
                    if (isset($data_message->messages->data)) {
                        foreach ($data_message->messages->date as $record) {
                            $facebook_message = FacebookMessage::where('message_id', $record['id'])->first();
                            if (!$facebook_message) {
                                $facebook_message = new FacebookMessage();
                            }
                            $facebook_message->message_id = $record['id'];
                            $facebook_message->conversation_id = $conversation->conversation_id;
                            $facebook_message->created_time = $record['created_time'];
                            $facebook_message->message_id = $record['id'];
                            $facebook_message->message = $record['message'];
                            $facebook_message->from = json_encode($record['from']);
                            $facebook_message->to = json_encode($record['to']);
                            $facebook_message->attachments = isset($record['attachments']) ? json_encode($record['attachments']) : null;
                            $facebook_message->tags = isset($record['tags']) ? json_encode($record['tags']) : null;
                            $facebook_message->sticker = isset($record['sticker']) ? json_encode($record['sticker']) : null;
                            $facebook_message->shares = isset($record['shares']) ? json_encode($record['shares']) : null;
                            $facebook_message->created_time = $record['created_time'];
                            $facebook_message->save();
                        }
                    }
                }
            }
        }
    }

    public function conversationApi($link)
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

        $response_message = curl_exec($curl);

        curl_close($curl);
        return json_decode($response_message, true);
    }
}
