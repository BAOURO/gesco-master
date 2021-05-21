@extends('layouts.admin')
@section('main-content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des enseignants</h6>
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
                        <th>Noms et prenoms</th>
                        <th>Grade</th>
                        <th>Titre</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $k=1;?>
                    @foreach($enseignants as $key)
                    <tr>
                        <td>{{$k++}}</td>
                        <td>{{$key->noms_prenoms}}</td>
                        <td>{{$key->grade}}</td>
                        <td>{{$key->titre}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <?= $enseignants->links()?>
    </div>
</div>
@endsection
