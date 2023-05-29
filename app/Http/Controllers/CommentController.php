<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Job;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //Store comment to database
    public function addComment(Request $request, $id)
    {
        // Validate user input
        $request->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required|numeric|min:1|max:5'
        ]);

        // Sanitize user input
        $comment = filter_var($request->comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $rating = filter_var($request->rating, FILTER_SANITIZE_NUMBER_INT);
                Comment::create([
            'job_id'=>$id,
            'comment'=>$comment,
            'rating'=>$rating,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        //get job comment
        $job = Job::find($id);
        
        // //Redirect to product detail page with newly added comment
        return redirect()->route('job-details', ['id' => $id]);
    }

    //Delete comment
    public function commentDelete(Request $request)
    {
        // $comment_id = $request->comment_id;
        // Comment::find($comment_id)->delete();
        // return redirect()->back();
        //find comment
        try{
            $comment = Comment::findOrFail($request->comment_id);
            $comment->delete();
            return redirect()->back();
        }catch(ModelNotFoundException $e){
            return redirect()->back()->with('error', 'Comment Not Found');
        }
    }
}
