<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service as Services;
use App\Models\Category;

class Service extends Component
{
    public $services, $name, $description, $service_id, $category_id;
    public $updateService = false;
    public $categories;
    public $categoryFilter = '';
    protected $listeners = [
        'deleteService'=>'destroy'
    ];
    // Validation Rules
    protected $rules = [
        'name'=>'required',
        'description'=>'nullable',
        'category_id' => 'required'
    ];
    public function render()
    {
        $query = Services::select('id','category_id','name','description')->latest();

        if (!empty($this->categoryFilter)) {
            $query->where('category_id', $this->categoryFilter);
        }
        $this->services = Services::select('id','category_id','name','description')->latest()->get();
        $this->categories = Category::select('id', 'name')->get();
        return view('livewire.service');
    }
    public function resetFields(){
        $this->name = '';
        $this->description = '';
        $this->category_id = '';
    }
    public function store(){
        // Validate Form Request
        $this->validate();
        try{
            // Create Service
            Services::create([
                'name'=>$this->name,
                'description'=>$this->description,
                'category_id'=>$this->category_id,
            ]);

            // Set Flash Message
            session()->flash('success','Service Created Successfully!!');
            // Reset Form Fields After Creating Service
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while creating service!!');
            // Reset Form Fields After Creating Service
            $this->resetFields();
        }
    }
    public function edit($id){
        $service = Services::findOrFail($id);
        $this->name = $service->name;
        $this->description = $service->description;
        $this->service_id = $service->id;
        $this->category_id = $service->category_id;
        $this->updateService = true;
    }
    public function cancel()
    {
        $this->updateService = false;
        $this->resetFields();
    }
    public function update(){
        // Validate request
        $this->validate();
        try{
            // Update Service
            Services::find($this->service_id)->fill([
                'name'=>$this->name,
                'description'=>$this->description,
                'category_id'=>$this->category_id,
            ])->save();
            session()->flash('success','Service Updated Successfully!!');

            $this->cancel();
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating service!!');
            $this->cancel();
        }
    }
    public function destroy($id){
        try{
            Services::find($id)->delete();
            session()->flash('success',"Service Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong while deleting service!!");
        }
    }
}
