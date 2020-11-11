<?php
namespace Domains\Task\Repositories;

use Domains\Task\Transformers\TaskCollectionTransformer;
use Domains\Task\Transformers\TaskTransformer;
use Domains\Task\Models\Task;
use Support\Repository\AbstractRepository;

class TaskRepository extends AbstractRepository
{
    /*
     * @var  $model, Task
     * @type instace class
     */
    protected $model = Task::class;


    /*
     * @var  $resourceTransformer, TaskTransformer
     * @type instace class
     */
    protected $resourceTransformer = TaskTransformer::class;


    /**
     * @var  $resourceTransformer, TaskCollectionTransformer
     * @type instace class
     */
    protected $collectionTransformer = TaskCollectionTransformer::class;
}