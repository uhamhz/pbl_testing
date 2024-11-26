<?php
class DashboardModel
{
    private $data = [
        1 => 'Admin Dashboard Data 1',
        2 => 'Admin Dashboard Data 2',
    ];
    public function getDataById($id)
    {
        return $this->data[$id] ?? null;
    }
    public function updateData($postData)
    {
        // Logic to update data, e.g., database update
        // For simplicity, just print the data
        print_r($postData);
    }
}