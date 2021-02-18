<?php
namespace App\Controller;

use App\System\Controller\AbstractController;
use App\Model\User;

class IndexController extends AbstractController
{
    public function indexAction($params = [])
    {
        // $user = new User;
        // $user->login = 'admin';
        // $user->email = 'admin@example.com';
        // $user->save();

        print_r(User::find(2));

        $this->page = $this->view->render('index/index', [
            'title' => 'Hello, Title!',
        ]);

        return $this->output();
    }
}