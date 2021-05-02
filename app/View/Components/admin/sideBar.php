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
                'url'=>'Dashboard'
            ],
            [
                'label'=> 'Approve Transaksi',
                'url'=>'ApproveTransaksi'
            ],
            [
                'label'=> 'Approve Withdraw',
                'url'=>'ApproveWithdraw'
            ],
            [
                'label'=> 'Register Confirm',
                'url'=>'RegisterConfirm'
            ],
            [
                'label'=> 'List Showroom',
                'url'=>'ListShowroom'
            ]
        ];
    }
}