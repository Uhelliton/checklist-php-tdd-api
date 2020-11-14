<?php
namespace Domains\User\Repositories;

use Domains\User\Transformers\UserCollectionTransformer;
use Domains\User\Transformers\UserTransformer;
use Domains\User\Models\User;
use Support\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    /*
     * @var  $model, User
     * @type instace class
     */
    protected $model = User::class;


    /*
     * @var  $resourceTransformer, TaskTransformer
     * @type instace class
     */
    protected $resourceTransformer = UserTransformer::class;


    /**
     * @var  $resourceTransformer, TaskCollectionTransformer
     * @type instace class
     */
    protected $collectionTransformer = UserCollectionTransformer::class;
}