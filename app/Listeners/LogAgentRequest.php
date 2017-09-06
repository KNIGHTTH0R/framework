<?php

namespace App\Listeners;

use App\Events\PageWasVisited;
use App\Model\Agent;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class LogAgentRequest
 *
 * @package App\Listeners
 */
class LogAgentRequest
{
    /**
     * @var Agent
     */
    private $agent;
    /**
     * @var Request
     */
    private $request;

    /**
     * Create the event listener.
     *
     * @param Agent $agent
     * @param Request $request
     */
    public function __construct(Agent $agent, Request $request)
    {
        $this->agent = $agent;

        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  PageWasVisited  $event
     * @return void
     */
    public function handle(PageWasVisited $event)
    {
        $this->agent->ip_address = $this->request->ip();
        $this->agent->browser = $this->request->userAgent();
        $this->agent->page_visited = $event->page->id;

        $this->agent->save();
    }
}
