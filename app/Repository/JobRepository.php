<?php

namespace App\Repository;

use App\Models\Job;

class JobRepository implements IJobRepository{


    //Get all products
    public function getAllJobs()
    {
        //Return all jobs
        return Job::all();
    }

    //Get single product
    public function getSingleJob($id)
    {
        //Return single job
        return Job::find($id);
    }
    

    //Store single product
    public function storeJob(array $data)
    {
        //Store the validated data coming from JobController
        Job::insert([
            'full_name'=>$data['full-name'],
            'address'=>$data['address'],
            'city'=>$data['city'],
            'phone'=>$data['phone'],
            'business_type'=>$data['businessType'],
            'profession'=>$data['profession'],
            'picture'=>$data['picture'],
            'description'=>$data['description'],
            'user_id'=>auth()->user()->id,
            'created_at'=>now()
        ]);

    }

    //Edit single product
    public function editJob($id)
    {

    }

    //Save product after edit
    public function updateJob($id, array $data)
    {
        //Store the validated data coming from JobController
        Job::find($id)->update([
            'full_name'=>$data['full-name'],
            'address'=>$data['address'],
            'city'=>$data['city'],
            'phone'=>$data['phone'],
            'business_type'=>$data['businessType'],
            'profession'=>$data['profession'],
            'picture'=>$data['picture'],
            'description'=>$data['description'],
            'user_id'=>auth()->user()->id,
            'updated_at'=>now()
        ]);
    }
   
}


?>