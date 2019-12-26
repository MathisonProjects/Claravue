<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Todo_Projects;
use App\Models\Todo_Categories;
use App\Models\Todo_Tasks;

use App\Implementation\Email;

use App\Jobs\TaskNotificationEmail;

class TodoController extends Controller
{
	public function getRefresh() {
		$data = [
			'projects'   => Todo_Projects::get(),
			'categories' => Todo_Categories::get(),
			'tasks'      => Todo_Tasks::all()
		];

		return $data;
	}

    public function saveProject(Request $request) {
        $data = $request->input();

        if (isset($data['id'])) {
            $item = Todo_Projects::find($data['id']);
        } else {
            $item = new Todo_Projects;
        }
        $item->Name        = $data['Name'];
        $item->Description = $data['Description'];
        $item->save();
    }
    
    public function deleteProject(Request $request) {
        $modelToDelete = Todo_Projects::find($request->input('id'));
        $modelToDelete->delete();
    }

    public function saveCategory(Request $request) {
        $data = $request->input();

        if (isset($data['id'])) {
            $item = Todo_Categories::find($data['id']);
        } else {
            $item = new Todo_Categories;
        }
        $item->ProjectId   = $data['ProjectId'];
        $item->Name        = $data['Name'];
        $item->Description = $data['Description'];
        $item->save();
    }

    public function deleteCategory(Request $request) {
        $modelToDelete = Todo_Categories::find($request->input('id'));
        $modelToDelete->delete();
    }

    public function saveTask(Request $request) {
        $data = $request->input();

        if (isset($data['id'])) {
            $item = Todo_Tasks::find($data['id']);
        } else {
            $item = new Todo_Tasks;
        }
        $item->CategoryId  = $data['CategoryId'];
        $item->Name        = $data['Name'];
        $item->Description = $data['Description'];
        $item->SubtaskOf   = $data['SubtaskOf'];
        $item->Status      = $data['Status'];
        $item->priority    = $data['priority'];
        $item->save();

        if ($data['sendNotification']) {
            $data['id'] = $item->id;
            $data['updated_at'] = $item->updated_at;
            $data['created_at'] = $item->created_at;
            $data['archived_at'] = $item->archived_at;

            $this->sendTaskNotification($data);      
        }

    }

    public function deleteTask(Request $request) {
        $modelToDelete = Todo_Tasks::find($request->input('id'));
        $modelToDelete->delete();
    }

    public function archiveTask(Request $request) {
        $item = Todo_Tasks::find($request->input('id'));
        $item->archived_at = date('Y-m-d H:i:s');
        $item->save();
    }

    private function sendTaskNotification($data) {
        $email = new Email;
        $email->setForm('taskUpdate')
            ->setSubject('Task Update: T#'.$data['id'].': '.$data['Name'])
            ->setData($data);
        
        TaskNotificationEmail::dispatch($email);
    }
}
