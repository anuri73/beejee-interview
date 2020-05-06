<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\IModel;
use App\Core\IView;
use App\Entity\Task;
use Doctrine\ORM\EntityManager;
use Klein\Request;
use Klein\Response;
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
        return $this->getView()->render('book/list.html.twig', [
            'tasks' => $tasks,
            'total' => $total,
            'totalPages' => ceil($total / $pageLimit),
            'page' => $page,
            'is_admin' => $_SESSION['authorized'] === true
        ]);
    }

    function create()
    {
        return $this->getView()->render('book/create.html.twig');
    }

    function add(Request $request, Response $response)
    {
        $task = $this->handleRequest($request, new Task());
        $this->model->getEntityManager()->persist($task);
        $this->model->getEntityManager()->flush();
        return $response->redirect('/tasks');
    }

    function view()
    {
        return $this->getView()->render('book/view.html.twig');
    }


    function update(Request $request, Response $response)
    {
        $task = $this->model->getEntityManager()->find(Task::class, $request->param('id'));
        if (null === $task) {
            return $response->code(404);
        }
        return $this->getView()->render('book/update.html.twig', [
            'task' => $task,
            'is_admin' => $_SESSION['authorized'] === true
        ]);
    }

    function edit(Request $request, Response $response)
    {
        $task = $this->model->getEntityManager()->find(Task::class, $request->param('id'));
        if (null === $task) {
            return $response->code(404);
        }
        $task = $this->handleRequest($request, $task);
        $this->model->getEntityManager()->persist($task);
        $this->model->getEntityManager()->flush();
        return $response->redirect('/tasks');
    }

    function delete()
    {

    }

    /**
     * @param Request $request
     * @param Task $model
     * @return Task
     */
    private function handleRequest(Request $request, Task $model): Task
    {
        $requestTask = $request->param('task', []);
        $model->username = $requestTask['username'];
        $model->email = $requestTask['email'];
        $model->task = $requestTask['task'];
        $model->completed = $requestTask['completed'];
        return $model;
    }
}
