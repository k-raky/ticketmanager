<?php

namespace App\Http\Controllers\Admin;

use App\Allocation;
use App\Counter;
use App\Http\Controllers\Controller;
use App\User;
use Codexshaper\WooCommerce\Facades\Order;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        abort_if(Gate::denies('user_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $all_commandes = Order::all();
        $allocations = Allocation::all();
        $commandes = collect();
        foreach ($allocations as $allocation) {
        $result = $all_commandes->filter(function($commande) use($allocation) {
                return $allocation->commande_id == $commande->id;
            })->first();
            $commandes->push($result);
        }
        $commandes->sortByDesc('id');

        return view('admin.allocations.index', compact('commandes', 'allocations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $user_name = $request->user_name;
        $commandes_ids = $request->commandes_ids;

        for ($i=0; $i < count($commandes_ids); $i++) { 
            Allocation::updateOrCreate(
                ["commande_id" => $commandes_ids[$i]],
                ["user_id" => $user_id,"user_name"=>$user_name]
            );
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
        
    }
}
