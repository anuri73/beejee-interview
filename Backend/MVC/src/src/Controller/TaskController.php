<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\IModel;
use App\Core\IView;
use App\Entity\Task;
use Doctrine\ORM\EntityManager;
use Klein\Request;
use Klein\Response;
use Rakit\Validation\ErrorBag;
use Rakit\Validation\Validator;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Forms;

class TaskController extends Controller
{
    private FormFactoryInterface $formFactory;

    public function __construct(IView $view, IModel $model)
    {
        $this->formFactory = Forms::createFormFactoryBuilder()
            ->addExtensions([])
            ->addTypeExtensions([])
            ->addTypes([])
            ->addTypeGuessers([])
            ->getFormFactory();
        parent::__construct($view, $model);
    }

    function list(Request $request, Response $response)
    {
        $page = $request->param('page', 1);
        $pageLimit = 3;
        $sortBy = $request->param('sortBy', 'id');
        if (!in_array($sortBy, ['id', 'username', 'email'])) {
            $sortBy = "id";
        }
        /** @var EntityManager $em */
        $em = $this->getModel()->getEntityManager();
        $tasks = $em->getRepository(Task::class)->findNextTasks(
            $page,
            $pageLimit,
            $sortBy
        );
        $total = $em->getRepository(Task::class)->count([]);
        return $this->getView()->render('task/list.html.twig', [
            'tasks' => $tasks,
            'total' => $total,
            'totalPages' => ceil($total / $pageLimit),
            'page' => $page,
            'is_admin' => $_SESSION['authorized'] === true
        ]);
    }

    function create(Request $request, Response $response)
    {
        if ($request->method('post')) {
            if (($errors = $this->getValidationError($request)) && $errors->count()) {
                return $this->getView()->render('task/create.html.twig', [
                    'errors' => $errors->toArray()
                ]);
            } else {
                $task = $this->handleRequest($request, new Task());
                $this->model->getEntityManager()->persist($task);
                $this->model->getEntityManager()->flush();
                return $response->redirect('/tasks');
            }
        }
        return $this->getView()->render('task/create.html.twig');
    }

    function update(Request $request, Response $response)
    {
        $task = $this->model->getEntityManager()->find(Task::class, $request->param('id'));
        if (null === $task) {
            return $response->code(404);
        }
        if ($request->method('post')) {
            if (($errors = $this->getValidationError($request)) && $errors->count()) {
                return $this->getView()->render('task/update.html.twig', [
                    'errors' => $errors->toArray(),
                    'task' => $task,
                    'is_admin' => $_SESSION['authorized'] === true
                ]);
            } else {
                $task = $this->handleRequest($request, $task);
                $this->model->getEntityManager()->persist($task);
                $this->model->getEntityManager()->flush();
                return $response->redirect('/tasks');
            }
        }
        return $this->getView()->render('task/update.html.twig', [
            'task' => $task,
            'is_admin' => $_SESSION['authorized'] === true
        ]);
    }

    /**
     * @param Request $request
     * @param Task $model
     * @return Task
     */
    private function handleRequest(Request $request, Task $model): Task
    {
        /** @var array $requestTask */
        $requestTask = $request->param('task', []);
        $model->username = $requestTask['username'];
        $model->email = $requestTask['email'];
        $model->task = $requestTask['task'];
        $model->completed = empty($requestTask['completed']) ? false : $requestTask['completed'];
        return $model;
    }

    /**
     * @param Request $request
     * @return ErrorBag
     */
    private function getValidationError(Request $request): ErrorBag
    {
        /** @var array $requestTask */
        $requestTask = $request->param('task', []);
        $validator = new Validator();
        $validation = $validator->make($requestTask, [
            'username' => 'required',
            'email' => 'required|email',
            'task' => 'required|min:6',
        ]);
        // then validate
        $validation->validate();
        return $validation->errors();
    }
}
