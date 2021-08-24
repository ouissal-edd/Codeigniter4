<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CustomModel;

class Blog extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $model = new CustomModel($db);
        print_r($model->getPosts());




        $data = [
            'title' => 'CCi4',
        ];

        $posts = ['Title 1 ', 'Title 2', 'Title 3'];
        $data['posts'] = $posts;

        return view('blog', $data);
    }

    // Read Single Post

    public function post($id)
    {
        $model = new BlogModel();
        $post = $model->find($id);
        // if post exist
        if ($post) {
            $data = [
                'title' => 'Get Single post',
                'titlePost' => $post['post_title'],
                'post' => $post,
            ];
        } else {
            $data = [
                'titlePost' => 'Poste Not Found'
            ];
        }
        return view('single_post', $data);
    }

    //  Create Post
    public function new()
    {
        $data = [
            'title' => 'Create new post',
        ];
        // if the form is accheli submited
        if ($this->request->getMethod() == 'post') {
            $model = new BlogModel();
            $model->save($_POST);
        }
        return view('new_post', $data);
    }


    // Delete Post
    public function delete($id)
    {
        $model = new BlogModel();
        $post = $model->find($id);
        if ($post) {
            $model->delete($id);
            return redirect()->to('/blog');
        }
    }

    // Update Post
    public function edit($id)
    {

        $model = new BlogModel();
        $post = $model->find($id);

        $data = [
            'title' => 'update  post',
            'titlePost' => $post['post_title'],
        ];

        if ($this->request->getMethod() == 'post') {
            $_POST['post_id'] = $id;
            $model->save($_POST);
            $post = $model->find($id);
        }
        $data['post'] = $post;

        return view('edit_post', $data);
    }
}
