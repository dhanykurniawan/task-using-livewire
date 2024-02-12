<?php

namespace App\Livewire;

use App\Models\Task as ModelsTask;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Task extends Component
{
    public function completed($id)
    {
        session()->flash('status', 'Task completed!');
        ModelsTask::find($id)->update(['status' => 'Completed']);
    }

    public function delete($id)
    {
        session()->flash('status', 'Task successfully deleted!');
        ModelsTask::find($id)->delete();
    }

    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.task', [
            'tasks' => ModelsTask::orderBy('id', 'DESC')->get()
        ]);
    }
}
