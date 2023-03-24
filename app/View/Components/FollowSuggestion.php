<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class FollowSuggestion extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $users;
    public function __construct()
    {
        $user = auth()->user();
        $following = $user->following()->pluck('users.id');
        $following = $following->merge($user->id);
        $this->users = User::WhereNotIn('id',$following)->inRandomOrder()->limit(2)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.follow-suggestion');
    }
}
