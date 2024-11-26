<?php
class DashboardController
{
    public function index()
    {
        include_once __DIR__ . '/../view/dashboardAdmin.php';
    }
    public function show($id)
    {
        $model = new DashboardModel();
        $data = $model->getDataById($id);
        include_once __DIR__ . '/../view/dashboardAdmin.php';
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new DashboardModel();
            $model->updateData($_POST);
            header('Location: /dashboard');
            exit;
        }
    }

    public function dashboardAdmin()
    {
        include_once 'view/dashboardAdmin.html';
    }

    public function dashboardSantri()
    {
        include_once 'view/dashboardSantri.html';

    }

}
