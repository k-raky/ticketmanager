<?php
namespace App\Http\Controllers\Admin;

use App\Allocation;
use App\Role;
use App\Team;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Stats;
use Codexshaper\WooCommerce\Facades\Order;
use Exception;
use Codexshaper\WooCommerce\Facades\Report;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class StatsController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = auth()->user();
        $user_role = DB::select('select role_id from role_user where user_id = ?', [$user->id]);

        if($user_role[0]->role_id != 1){

            $commandes = collect();
            $allocations = Allocation::where('user_id', $user->id)->get();
            foreach ($allocations as $allocation) {
                $order = Order::find($allocation->commande_id);
                $commandes->push((object)$order);
            }
            
            $commandes = $commandes->groupBy('status');

            return view('user.stats',compact('commandes'));

        }
        else {

            $roles = Role::all(); 
            $users = User::all();
            $commandes = Report::orders();


            $allocations = Allocation::all()->groupBy('user_id');
            $commandes_completed = Order::whereStatus('completed')->get();
            $commandes_per_user = collect();

            foreach ($allocations as $user_id => $user_allocation ) {
                $count=0;
                foreach ($user_allocation as $allocation) {
                    if ($commandes_completed->where('id',$allocation->commande_id)->count()>0) {
                        $count++;
                    } 
                }
                $commandes_per_user->push(['user_id'=>$user_id, 'total' => $count]);
            }

            return view('admin.commandes.stats',compact('commandes','users','roles', 'commandes_per_user'));
        }

    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $commandes)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.commandes.stats', compact('commandes'));
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
