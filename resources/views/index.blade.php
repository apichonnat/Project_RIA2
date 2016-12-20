@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="/route">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="Client1">Chauffeur</label>
                    <select class="form-control" name="driver" id="Client1">
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 1</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 2</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 3</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 4</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 5</label>
                    <select class="form-control" name="Client1" id="Client1">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Confirmation de la tournée</button>
            </form>
        </div>
        <div class="col-md-8" id="response">
        </div>
    </div>

@stop