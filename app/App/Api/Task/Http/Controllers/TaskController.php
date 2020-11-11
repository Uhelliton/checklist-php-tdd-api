<?php
namespace App\Api\Task\Http\Controllers;

use App\Api\Task\Http\Requests\TaskRequest;
use Domains\Task\DataTransferObject\TaskData;
use Domains\Task\Repositories\TaskRepository;
use Support\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * @property instace repository TaskRepository
 */
class  TaskController extends Controller
{
    /**
     *
     * @param  TaskRepository  $taskRepository
     * @return void
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->repository = $taskRepository;
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index()
    {
        return $this->repository->all();
    }


    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TaskRequest $request)
    {
        $taskDto = TaskData::fromRequest($request)->toArray();
        $task = $this->repository->create($taskDto);

        if (!$task) return $this->response500();
        return $this->response201($task);
    }

    /**
     * Update the given user.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $taskDto =  TaskData::fromRequest($request);
    }
}