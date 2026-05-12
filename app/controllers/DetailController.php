<?php
namespace App\Controllers;

require_once '../app/models/CareerDetailModel.php';

use App\Models\CareerDetailModel;

class DetailController
{
    public function detail()
    {
        $career = null;
        $model = new CareerDetailModel();

        if (isset($_GET['id']) && intval($_GET['id']) > 0) {
            $id = intval($_GET['id']);
            $career = $model->getCareerById($id);
        } elseif (isset($_GET['name']) && !empty($_GET['name'])) {
            $name = $_GET['name'];
            $career = $model->getCareerByName($name);
        }

        if (!$career) {
            echo "Career not found";
            return;
        }

        $id = $career['id'];
        $skills = $model->getCareerSkills($id);
        $educations = $model->getCareerEducations($id);

        require_once '../app/views/detail.php';
    }
}

?>