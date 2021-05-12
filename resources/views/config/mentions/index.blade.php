@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="col-lg-12">
            <h1 class="page-header">Mentions</h1>
        </div>

        <div class="row">

            <div class="col-lg-4">
                @include('config.mentions.create')
            </div>

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Abreviation(s)</th>
                                    <th>Cycles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mentions as $mention)
                                <tr class="odd gradeX">
                                    <td>{{$mention->id}}</td>
                                    <td>{{$mention->nom}}</td>
                                    <td>{{$mention->abreviation}}</td>
                                    <td>{{$mention->cycle->nom}}</td>
                                    <td class="center">
                                        <button type="button" class="btn btn-info btn-circle">
                                            <a href="{{ route('mentions.show', $mention) }}" >
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-circle">
                                            <a href="{{ route('mentions.edit', $mention) }}" >
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-circle">
                                            <form method="POST" action="{{ route('mentions.destroy', $mention) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" hidden="hidden">
                                            </form>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{   $mentions->links() }}
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            
        </div>
    </div>
@endsection

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>