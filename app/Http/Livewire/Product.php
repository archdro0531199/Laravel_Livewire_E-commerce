<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post as Posts;
use App\Models\Product as Products;

class Product extends Component
{

    public $posts, $name, $unit_price, $description, $postId, $updatePost = false, $addPost = false;

    /**
     * delete action listener
     */
    protected $listeners = [
        'deletePostListner'=>'deletePost'
    ];

    /**
     * List of add/edit form rules 
     */
    protected $rules = [
        'name' => 'required',
		'unit_price' => 'required',
        'description' => 'required'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->name = '';
		$this->unit_price = '';
        $this->description = '';
    }
    
    /**
     * render the post data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->posts = Products::select('id', 'name', 'unit_price', 'description')->get();
        return view('livewire.post');
    }

    /**
     * Open Add Post form
     * @return void
     */
    public function addPost()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }
     /**
      * store the user inputted post data in the posts table
      * @return void
      */
    public function storePost()
    {
        $this->validate(); 
        try {
            Products::create([
                'name' => $this->name,
				'unit_price' => $this->unit_price,
                'description' => $this->description
            ]);
            session()->flash('success','Post Created Successfully!!');
            $this->resetFields();
            $this->addPost = false;
        } catch (\Exception $ex) {
			dd($ex->getMessage()); 
            session()->flash('error','Something goes wrong!!');
        }
    }

    /**
     * show existing post data in edit post form
     * @param mixed $id
     * @return void
     */
    public function editPost($id){
        try {
            $post = Products::findOrFail($id);
            if( !$post) {
                session()->flash('error','Post not found');
            } else {
                $this->name = $post->name;
				$this->unit_price = $post->unit_price;
                $this->description = $post->description;
                $this->postId = $post->id;
                $this->updatePost = true;
                $this->addPost = false;
            }
        } catch (\Exception $ex) {
			dd($ex->getMessage()); 
            session()->flash('error','Something goes wrong!!');
        }
        
    }

    /**
     * update the post data
     * @return void
     */
    public function updatePost()
    {
        $this->validate();
        try {
            Products::whereId($this->postId)->update([
                'name' => $this->name,
				'unit_price' => $this->unit_price,
                'description' => $this->description
            ]);
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
            $this->updatePost = false;
        } catch (\Exception $ex) {
			dd($ex->getMessage()); 
            session()->flash('success','Something goes wrong!!');
        }
    }

    /**
     * Cancel Add/Edit form and redirect to post listing page
     * @return void
     */
    public function cancelPost()
    {
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }

    /**
     * delete specific post data from the posts table
     * @param mixed $id
     * @return void
     */
    public function deletePost($id)
    {
        try{
            Products::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}
