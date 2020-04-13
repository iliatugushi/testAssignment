@extends('layout.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Simple Search Form
                    <br>
                    <small>
                        This is simple search form: which uses keyword and searches for any possible value in database
                        <br>
                        This form uses search_simple api
                    </small>
                </div>
                <div class="card-body">
                    <search-form-simple></search-form-simple>
                </div>
            </div>

            <br><br>


            <div class="card">
                <div class="card-header text-center">
                    Advanced Search Form
                    <br>
                    <small>
                        This is Advanced search form: which uses input fileds to search for specific records in database
                        <br>
                        This form uses search_advanced api
                    </small>
                </div>
                <div class="card-body">
                    <search-form-advanced></search-form-advanced>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
