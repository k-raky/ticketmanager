@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header text-center">
         <h3>Liste des commandes</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Asset text-center align-middle">
                <thead>
                    <tr>
                        <th>

                        </th>
                        <th >
                         ID
                        </th>
                        <th>
                            Prénom
                        </th>
                        <th>
                            Nom
                        </th>
                        
                        <th>
                          Adresse
                        </th>
                        <th>
                           Ville
                          </th>
                        <th >
                            Email
                        </th>
                        <th >
                            Téléphone
                        </th>
                        <th>
                            Total
                        </th>
                       
                           
                        <th>
                            Date de paiement
                          </th>
                         
                        <th>
                            État
                           </th>

                           <th>
                               Responsable
                           </th>
                        
                        <th>
                           Opérations
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($commandes as $commande)
                        <tr data-entry-id="{{ $commande->id}}">

                            <td class="align-middle text-center">

                            </td>
                               
                            <td>
                                {{ $commande->id ?? '' }}
                            </td>
                          
                            <td>
                                {{ $commande->billing->first_name ?? '' }}
                            </td>
                          
                            <td>
                                {{ $commande->billing->last_name ?? '' }}
                            </td>

                            <td>
                                {{ $commande->billing->address_1 ?? '' }}
                            </td>
                            <td>
                                {{ $commande->billing->city ?? '' }}
                            </td>
                            <td style="width:10">
                                {{ $commande->billing->email ?? '' }}
                            </td>
                            <td>
                                {{ $commande->billing->phone ?? '' }}
                            </td>
                          
                            <td>
                               <h6>{{ $commande->total ?? '' }}</h6>  <span style="color:"> {{ $commande->currency?? '' }}</span>
                         </td>
                            <td>
                                {{ $commande->date_paid ?? '' }}
                            </td>
                           
                            <td class="@if($commande->status=='processing'){{'text-green'}}
                                  @elseif($commande->status=='cancelled'){{'text-red'}}
                                  @endif
                                ">
                               
                               <h6> {{ $commande->status ?? '' }}</h6>
                            </td>
                      
                            <td>
                                @foreach ($allocations as $allocation)
                                    @if ($allocation->commande_id == $commande->id)
                                        {{ $allocation->user_name}}
                                    @endif
                                @endforeach
                            </td>

                            <td>
                               
                            
                                @can('asset_edit')

                                <a class="btn btn-xs btn-info text-light" data-toggle="modal" data-target="#modelTelecharger{{ $commande->id}}">
                                    Télécharger
                                </a>
                            @endcan


                            </td>

                        </tr>

                        @include('admin.commandes.modal')
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.commandes.modal_liste_users')


</div>



@endsection
@section('scripts')
@parent
<script>

let commandes_ids = [];


    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('asset_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  @endcan
  
  let allocateButton = {
      className: 'btn-default',
      text: "Allouer",
      exportOptions: {
          columns: ':visible'
        },
        action : function (e, dt, node, config) {
            let selectedRows= dt.rows({selected :true}).data();
            console.log(selectedRows)
            if (selectedRows.length != 0) {   

                for (let i = 0; i < selectedRows.length; i++) {
                    if (!(selectedRows[i][10].includes("cancelled"))) {
                        commandes_ids.push(selectedRows[i][1]);
                    } 
                }

                if (commandes_ids.length != 0) {
                    $('#modelListeUsers').modal("show") // relatedTarget
                }
                
            }
        }
        
    }

    
  dtButtons.push(allocateButton)
  dtButtons.push(deleteButton)
  

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Asset:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

    function allocate(obj) {
        var list_class = obj.className;
        var user_id = document.getElementsByClassName(list_class)[0].getElementsByClassName("row")[0].getElementsByClassName("user_id")[0].innerText;
        var user_name = document.getElementsByClassName(list_class)[0].getElementsByClassName("row")[0].getElementsByClassName("user_name")[0].innerText;

       
        $.ajax({
            type: 'GET',
            url: "{{ route('allocate')}}",
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data: {
                user_id : user_id,
                user_name : user_name,
                commandes_ids: commandes_ids,
            },
        }).done(function () { location.reload() })
    }

</script>


<style>
    .text-green{
        color:green;
    }
    .text-red{
        color:red;
    }
</style>
@endsection
