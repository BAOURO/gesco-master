@extends('layouts.admin')

@section('main-content')
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4">
                @include('config.annees.index')
            </div>

            <div class="col-lg-8">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>  
                                    <th>Annee Debut</th>
                                    <th>Annee Fin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Annee Debut</th>
                                    <th>Annee Fin</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($annees as $annee)
                                <tr>
                                    <td>{{ $annee->id }}</td>
                                    <td>{{ $annee->annee_debut }}</td>
                                    <td>{{ $annee->annee_fin }}</td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $annees->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
