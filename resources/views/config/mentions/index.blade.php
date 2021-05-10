@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mentions</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
                @include('mentions.create')
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
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
                                        <button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button>
                                        <button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>