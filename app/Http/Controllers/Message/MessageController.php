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

      return $this->repository->store($request->all());

    }
}
