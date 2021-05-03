<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class sideBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active)
    {
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $list = $this->list();
        return view('components.user.side-bar', ['active' => $this->active]);
    }

    public function list(){
        return[
            [
                'label'=> 'Dashboard',
                'icon' => 'fas fa-home',
                'url'=>'DashboardUser'
            ],
            // [
            //     'label'=> 'Profil',
            //     'url'=>'Profil'
            // ],
            [
                'label'=> 'Transaksi',
                'icon' => 'fas fa-cash-register',
                // 'url'=>'TransaksiUser'
            ],
            [
                'label'=> 'Reward',
                'icon' => 'fas fa-coins',
                'url'=>'RewardUser'
            ]
        ];
    }
}
