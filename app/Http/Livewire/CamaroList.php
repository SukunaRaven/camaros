<?php

namespace App\Http\Livewire;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Camaros;
use App\Models\Category;


class CamaroList extends Component
{
    public $search = '';
    public $category = '';
    public $perPage = 12;

    protected $updatesQueryString = ['search','category','page'];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategory(): void
    {
        $this->resetPage();
    }

    public function toggleStatus($id): void
    {
        $camaro = Camaros::findOrFail($id);
        if (auth()->user()->cannot('toggleStatus', $camaro)) {
            $this->dispatchBrowserEvent(['type'=>'error','message'=>'Geen toestemming']);
            return;
        }
        $camaro->is_active = !$camaro->is_active;
        $camaro->save();
        $this->dispatchBrowserEvent(['type'=>'success','message'=>'Status gewijzigd']);
        $this->emit();
    }

    public function render(): View|Factory|Htmlable|Closure|string|\Illuminate\View\View
    {
        $query = Camaros::with('category','uploader')
            ->when($this->search, fn($q) => $q->where(fn($q2) => $q2->where('name','like','%'.$this->search.'%')->orWhere('description','like','%'.$this->search.'%')))
            ->when($this->category, fn($q) => $q->where('category_id',$this->category));

        $camaros = $query->orderBy('created_at','desc')->paginate($this->perPage);
        $categories = Category::all();

        return view('livewire.camaro.list', compact('camaros','categories'));
    }

    private function resetPage()
    {
    }

    private function dispatchBrowserEvent(array $array)
    {
    }

    private function emit()
    {
    }
}
