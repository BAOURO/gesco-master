@extends('layouts.admin')
@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des annees academiques</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Annee</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Annee</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $k=1;?>
                    @foreach($annees as $a)
                    <tr>
                        <td>{{$k++}}</td>
                        <td>{{$a->annee}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <?= $annees->links()?>
    </div>
</div>
@endsection
