@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <form action="">
               {{$isLoggedIn}}
                <div class="form-group">
                    <label for="Client1">Client 1</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option>{{var_dump($clients)}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 2</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 3</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 4</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option>1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 5</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option>1</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="col-md-8">
        </div>
    </div>

@stop