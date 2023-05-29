<?php

namespace App\Repository;

interface IJobRepository{
    //Get all products
    public function getAllJobs();

    //Get single product
    public function getSingleJob($id);

    //Store single product
    public function storeJob(array $data);

    //Edit single product
    public function editJob($id);

    //Save product after edit
    public function updateJob($id, array $data);
   
}



?>