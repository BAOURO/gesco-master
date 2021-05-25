@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="row">

            <div class="col-lg-4">
                @include('config.menus.create')
            </div>

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Cycles
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $k = 1; ?>
                                    @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{$k++}}</td>
                                        <td>{{$menu->name}}</td>
                                        <td>{{$menu->link}}</td>
                                        <td>{{$menu->status}}</td>
                                        <td>
                                            <span class='btn btn-info btn-circle' data-toggle='modal' data-target='#menu' id='{{$menu->id}}'>
                                                <i class="fa fa-edit"></i>
                                            </span>
                                            <a href="#" class="btn btn-danger btn-circle">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<div class="modal fade" id="menu" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" ></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('menus.update', 0)}}" id="formu1">
                    @csrf
                   <!--  @method('PATCH') -->
                    <div class="form-group">
                        <label for="nom">Nom du Menu Item</label>
                        <input class="form-control" name="name_update" id="name_update"  type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom du link</label>
                        <input class="form-control" name="link_update" id="link_update"  type="text" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="status_update">Status</label>
                        <select name="status_update" class="form-control" id="status_update">
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                        </select>
                    </div>
                  <div class="modal-footer">
                      <button type="submit" id="confirmer" class="btn btn-success">Modifier</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var menus = <?= json_encode($menus)?>;
    function search_menu(id){
        var m = 0;
        $.each(menus, function(key, val){
            if (parseInt(val.id) == parseInt(id)) {
                m = val;
            }
        })
        return m;
    }
    $('#menu').on('show.bs.modal', function (event)
    {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var menu_id = button[0].id;
        var menu = search_menu(menu_id);

        $("#name_update").val(menu.name);
        $("#link_update").val(menu.link);
        $("#status_update").val(menu.status);
        var elem = document.getElementById('formu1');
        var action = elem.action;
        elem.action = action.substring(0, action.length - 1)+menu_id;
        modal.find('.modal-title').text("MODIFICATION MENU ")
    })
</script>
@endsection