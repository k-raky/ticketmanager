<?php

namespace App\Http\Controllers\Admin;

use App\Allocation;
use Codexshaper\WooCommerce\Facades\Order;
use App\Asset;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetRequest;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\makepdfController;
use App\User;

class CommandesController extends Controller
{ public function index()
    {
       abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes = Order::all();
        $users = User::all();
        $allocations = Allocation::all();

        return view('admin.commandes.index', compact('commandes', 'users', 'allocations'));
    }

    public function showModalListeUsers(Request $request)
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();
        $commandes_ids = $request->commandes_ids;

        return view('admin.commandes.modal_liste_users', compact('commandes_ids', 'users'));
    }


    public function create()
    {
        abort_if(Gate::denies('asset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commandes.create');
    }

    public function store(StoreAssetRequest $request)
    {
        $commandes = Order::create($request->all());

        return redirect()->route('admin.commandes.index');

    }

    public function edit(Order $commandes)
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commandes.edit', compact('commandes'));
    }
    

    public function update(UpdateAssetRequest $request, Order $commandes)
    {
        $commandes>update($request->all());

        return redirect()->route('admin.commandes.index');

    }

    public function imprimer()
    {
    
        return view('admin.commandes.imprimer');

    }

    public function show(Order $commandes)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.commandes.show', compact('commandes'));
    }

    public function destroy(Order $commandes)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes->delete();

        return back();

    }

    public function massDestroy(MassDestroyAssetRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }



}

