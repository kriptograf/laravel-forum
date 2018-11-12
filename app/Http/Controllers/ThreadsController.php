<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use Illuminate\Http\Request;
use App\Filters\ThreadsFilters;

class ThreadsController extends Controller
{
    public function __construct()
    {
        /**
         * Access unauth user to index action and show action
         */
        $this->middleware('auth')->except(['index', 'show', 'api']);
    }

    /**
     * Display a listing of the resource.
     * @param $channel
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel, ThreadsFilters $filters)
    {
        $threads = $this->getThreads($channel, $filters);

        return view('threads.index', [
            'threads' => $threads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Validation fields from Thread
         */
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'channel_id'=>'required|exists:channels,id'
        ]);

        $thread = Thread::create([
            'user_id'=>auth()->id(),
            'channel_id'=>\request('channel_id'),
            'title'=>\request('title'),
            'body'=>\request('body'),
        ]);

        return redirect($thread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Thread $thread)
    {
        return view('threads.show', [
            'thread' => $thread,
            'replies' => $thread->replies()->paginate(20)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }

    public function api(Channel $channel, ThreadsFilters $filters)
    {
        $threads = $this->getThreads($channel, $filters);

        return response($threads)->header('Access-Control-Allow-Origin', '*')->header("content-type", "application/json");
    }

    /**
     * @param Channel $channel
     * @param ThreadsFilters $filters
     * @return mixed
     */
    protected function getThreads(Channel $channel, ThreadsFilters $filters)
    {
        $threads = Thread::latest()->filter($filters);

        //Query
        if ($channel->exists) {
            $threads->where('channel_id', $channel->id);
        }

        /**
         * apply filter by user name
         */
        $threads = $threads->get();

        return $threads;
    }
}
