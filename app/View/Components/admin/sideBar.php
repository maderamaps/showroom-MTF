<?php

namespace App\View\Components\admin;

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
        return view('components.admin.sidebar', ['active' => $this->active]);
    }

    public function list(){
        return[
            [
                'label'=> 'Dashboard',
                'icon' => 'fas fa-home',
                'url'=>'Dashboard'
            ],
            [
                'label'=> 'Approve Transaksi',
                'icon' => 'fas fa-thumbs-up',
                'url'=>'ApproveTransaksi'
            ],
            [
                'label'=> 'Approve Withdraw',
                'icon' => 'fas fa-gifts',
                'url'=>'ApproveWithdraw'
            ],
            [
                'label'=> 'Register Confirm',
                'icon' => 'fas fa-id-card',
                'url'=>'RegisterConfirm'
            ],
            [
                'label'=> 'List Showroom',
                'icon' => 'fas fa-store',
                'url'=>'ListShowroom'
            ]
        ];
    }
}
