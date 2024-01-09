<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use App\Models\FilterGroup;
use App\Models\Filter;
use App\Models\CategoryParameter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\CategoryParameterProduct;

class StoreCategory extends BaseComponent
{
    use AuthorizesRequests;

    public $title, $slug, $image, $parent_id , $category_atr = [] ,$inputs = [], $i = 1 , $description , $icon , $picture;

	public $group_title , $modal_title , $modes , $filters = [] , $telegram_bot = false , $telegram_bot_view = 0;


	public $groupList = [];

	public function addGroup($title)
    {
        if ($title == 'new')
            $this->modal_title = 'گروه جدید';
        else {
            $group = $this->groupList[$title];
            $this->modal_title = $group['title'].'ویرایش گروه ';
			$this->group_title = $group['title'];
            $this->filters = $group['filters'];
        }
        $this->modes = $title;
		$this->emit('showModel', ['newGroup']);
    }

	public function array_value_recursive($key, array $arr){
        $val = array();
        array_walk_recursive($arr, function($v, $k) use($key, &$val){
            if($k == $key) array_push($val, $v);
        });
        return count($val) > 1 ? $val : array_pop($val);
    }

    public function storeGroup()
    {
        $filter = [];
        $this->validate(
            [
                'group_title' => ['required', 'string','max:255'],
            ] , [] , [
                'group_title' => 'عنوان',
            ]
        );
        foreach ($this->filters as $key => $item)
        {
			if(empty($item['title']))
				return $this->addError('error','عنوان فیلتر الزامی می باشد');
            $filter[] = [
                'id' => $item['id'] ?? 0,
                'group_id' => $this->modes <> 'new' ? $this->groupList[$this->modes]['id'] : 0,
                'title' => $item['title'],
                'created_at' => $item['created_at'] ?? '',
                'updated_at'=> $item['updated_at'] ?? ''
            ];
        }
        $group = [
            'id' => 0,
            'title' => $this->group_title,
            'filters' => $filter
        ];
        if ($this->modes === 'new')
            array_push($this->groupList,$group);
        else {
            $group['id'] = $this->groupList[$this->modes]['id'];
            $group['category_id'] = $this->model->id ?? 0;
            $group['created_at'] = $this->groupList[$this->modes]['created_at'] ?? '';
            $group['updated_at'] = $this->groupList[$this->modes]['updated_at'] ?? '';
            $this->groupList[$this->modes] = $group;
        }
        $this->reset(['group_title','filters']);
        $this->resetErrorBag();
		$this->emit('hideModel', ['newGroup']);
    }

	public function addFilter()
    {
        $this->i = $this->i + 1;
        array_push($this->filters , $this->i);
    }

	public function hide($id)
    {
        $this->reset(['group_title','filters']);
        $this->resetErrorBag();
		$this->emit('hideModel', [$id]);
    }

	public function deleteFilter($key)
    {
        if ($this->modes <> 'new')
        {
            $id = $this->groupList[$this->modes]['filters'][$key]['id'];
            $id ? Filter::find($id)->delete() : '';
        }
        unset($this->filters[$key]);
    }

	public function deleteGroup($id)
    {
        $key = $this->groupList[$id]['id'];
        $key ? FilterGroup::find($key)->delete() : '';
        unset($this->groupList[$id]);
    }

	public function mount($action, $id = null)
    {
		$this->i = CategoryParameter::orderBy('id','DESC')->first()->id;

		
        if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }

        $this->data['parent_id'] = Category::whereNull('parent_id')
            ->where('id', '!=', $this->model->id ?? 0)
            ->get()->pluck('title', 'id');
			
    }



    public function render()
    {
		
        return view('admin.categories.store-category')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
        $this->authorize('create_categories');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_categories');

        $this->saveInDatabase(new Category());

        $this->emitNotify('دسته با موفقیت ثبت شد');

        $this->resetInputs();
		$this->inputs = [];
    }

    public function edit($id)
    {
        $this->authorize('edit_categories');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Category::findOrFail($id);
		$this->groupList = $this->model->groups()->with(['filters'])->get()->toArray();
	
        $this->title = $this->model->title;
        $this->slug = $this->model->slug;
        $this->image = $this->model->image;
        $this->parent_id = $this->model->parent_id;

		$this->description = $this->model->description;
		$this->icon = $this->model->icon;
		$this->picture = $this->model->picture;
		$this->telegram_bot = $this->model->telegram_bot;
		$this->telegram_bot_view = $this->model->telegram_bot_view;
		
    }

    public function update()
    {
        $this->authorize('edit_categories');

        $this->saveInDatabase($this->model);


        $this->emitNotify('دسته با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Category $category )
    {
        $this->parent_id = $this->emptyToNull($this->parent_id);

        $this->validate(
            [
                'title' => ['required', 'string', 'max:250'],
                'slug' => ['required', 'string', 'max:250', 'unique:categories,slug,' . ($this->model->id ?? 0)],
                'image' => ['required', 'string', 'max:250'],
                'parent_id' => ['nullable', 'exists:categories,id'],
				'description' => ['nullable','string'],
				'icon' => ['nullable','string'],
				'picture' => ['nullable','string'],
				'telegram_bot' => ['required','boolean'],
				'telegram_bot_view' => ['required','integer']
            ],
            [],
            [
                'title' => 'عنوان',
                'slug' => 'آدرس',
                'image' => 'تصویر',
                'parent_id' => 'دسته',
				'telegram_bot' => 'نمایش در ربات تلگرام',
				'telegram_bot_view' => 'شماره نمایش در ربات تلگرام'
            ]
        );

        $category->title = $this->title;
        $category->slug = $this->slug;
        $category->image = $this->image;
        $category->parent_id = $this->parent_id;
		$category->description = $this->description;
		$category->icon = $this->icon;
		$category->picture = $this->picture;
		$category->telegram_bot = $this->telegram_bot;
		$category->telegram_bot_view = $this->telegram_bot_view;
        $category->save();
	
		foreach ($this->groupList as $item)
        {
            $group = $item['id'] == 0 ? new FilterGroup() : FilterGroup::find($item['id']);
            $group->title = $item['title'];
            $group->category_id = $category->id;
            $group->save();
            foreach ($item['filters'] as $filter)
            {
                $filters = $filter['id'] == 0 ? new Filter() : Filter::find($filter['id']);
                $filters->group_id = $group->id;
                $filters->title = $filter['title'];
                $filters->save();
            }
        }
        if ($this->mode == self::MODE_UPDATE)
			$this->groupList = $this->model->groups()->with(['filters'])->get()->toArray();
    }

    public function resetInputs()
    {
        $this->reset(['title', 'slug', 'image', 'parent_id','category_atr','group_title','filters','telegram_bot']);
    }
}