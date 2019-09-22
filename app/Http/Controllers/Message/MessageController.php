<?php

namespace App\Http\Controllers\Message;

use App\Repositories\Message\MessageRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
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

      return $this->repository->store($request->all(),$request->user()->mobile_number);

    }

    /**
     * return conversation belongs to client
     * @param $c_id
     *
     * @return mixed
     */
    public function  getClientConversations($c_id){
        return response()->json(["conversations"=>$this->repository->getMyConversations("c",$c_id)],200);
    }

    /**
     * return conversation belongs to merchant
     * @param $m_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMerchantConversations($m_id){
        return response()->json(["conversations"=>$this->repository->getMyConversations("m",$m_id)],200);
    }
    public function getAllMessagesBelogsToConversation($c_id)
    {
        // TODO: Change the autogenerated stub
        return response()->json(["messages"=>$this->repository->getMyMessages($c_id)],200);

    }
}
