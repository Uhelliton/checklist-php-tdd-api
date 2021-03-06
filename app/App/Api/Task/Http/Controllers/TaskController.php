<?php
namespace App\Api\Task\Http\Controllers;

use App\Api\Task\Http\Requests\TaskRequest;
use Domains\Task\DataTransferObjects\TaskData;
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
     * @param  UserRepository  $taskRepository
     * @return void
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('jwt.auth');
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
     * Cria uma nova task
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $taskDto = TaskData::fromRequest($request)->toArray();
        $task = $this->repository->create($taskDto);

        if (!$task) return $this->response500();
        return $this->response201($task);
    }


    /**
     * Atualiza uma task
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        $taskDto = TaskData::fromRequest($request)->toArray();
        $task = $this->repository->update($taskDto, $id);

        if (!$task) return $this->response500();
        return $this->response200($task);

    }

    /**
     * Exibe uma task
     *
     * @param  string  $id
     * @return Response
     */
    public function show( int $id)
    {
        $task = $this->repository->find($id);

        if (!$task) return $this->responseResourceEmpty();
        return $this->response200($task);

    }

    /**
     * Remove task
     *
     * @param  string  $id
     * @return Response
     */
    public function destroy( int $id)
    {
        $task = $this->repository->delete($id);

        if (!$task) return $this->response500();
        return $this->response200($task);

    }
}