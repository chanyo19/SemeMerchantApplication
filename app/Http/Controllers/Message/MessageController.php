<?php

namespace App\Http\Controllers\Message;

use App\Models\Merchant\Merchant;
use App\Repositories\Message\MessageRepositoryInterface;
use App\Traits\MerchantTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    use MerchantTrait;
    /**
     * @var MessageRepositoryInterface
     */
    private $repository;

    /**
     * MessageController constructor.
     * @param MessageRepositoryInterface $repository
     */
    public function __construct(MessageRepositoryInterface $repository)
    {


        $this->repository = $repository;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request){

       // dd($request->user());
      return $this->repository->store($request->all(),$request->user()->mobile_number);

    }


    /**
     * return conversation belongs to client
     * @param $c_id
     *
     * @param Request $request
     * @return mixed
     */
    public function  getClientConversations($c_id,Request $request){
        return response()->json(["conversations"=>$this->repository->getMyConversations("c",$c_id,$request->user()->mobile_number)],200);
    }

    /**
     * return conversation belongs to merchant
     * @param $m_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMerchantConversations($m_id,Request $request){
        return response()->json(["conversations"=>$this->repository->getMyConversations("m",$m_id,$request->user()->mobile_number)],200);
    }

    /**
     * @param $c_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllMessagesBelogsToConversation($c_id)
    {
        // TODO: Change the autogenerated stub
        return response()->json(["messages"=>$this->repository->getMyMessages($c_id)],200);

    }
    //get merchant conversations

    /**
     *Get merchant conversations
     */
    public function myConversations(){

        $my_conversations= $this->repository->getMyConversations('m',$this->getMerchant(),'');
        return view('conversation.conversation')->with('conversations',$my_conversations);

    }

    /**
     *Get messages for conversation
     * @param $c_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myMessages($c_id){
        $messages=$this->repository->getMyMessages($c_id);
        //dd($messages);
        return view('conversation.message-body')->with('messages',$messages)->with('c_id',$c_id);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessageToClient(Request $request){
        $request->validate([
            'conversation_id'=>'required|numeric',
            'message'=>'required|max:200'
        ]);
        $message=$this->repository->storeToMessageUsingConversation($request->conversation_id,$request->all());
        if($message){
            Session::flash('success','Message send successfully');
            return redirect()->back();
        }
    }
}
