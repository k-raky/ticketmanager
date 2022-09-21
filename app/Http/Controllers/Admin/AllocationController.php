<?php

namespace App\Http\Controllers\Admin;

use App\Allocation;

use App\Http\Controllers\Controller;
use Codexshaper\WooCommerce\Facades\Order;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $allocations = Allocation::all();

        return $allocations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commandes_ids = $request->commandes_ids;
        $user_id = $request->user_id;

        $data     = [
            'responsible' => $user_id,
        ];
        
        for ($i=0; $i < count($commandes_ids); $i++) { 
            Order::update($commandes_ids[$i], $data);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Allocation $allocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allocation $allocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allocation $allocation)
    {
        //
    }
}
