@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="/route" id="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label for="Client1">Chauffeur</label>
                    <select class="form-control" name="driver" id="driver">
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Point de départ</label>
                    <select class="form-control" name="startEnd" id="startEnd">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 1</label>
                    <select class="form-control" name="client1" id="client1">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 2</label>
                    <select class="form-control" name="client2" id="client2">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 3</label>
                    <select class="form-control" name="client3" id="client3">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Client1">Client 4</label>
                    <select class="form-control" name="client4" id="client4">
                        <option value="0"></option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->user->getLabel()}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" onclick="getRoute();" class="btn btn-default">Confirmation de la tournée</button>
            </form>
        </div>
        <div class="col-md-8" id="response"></div>
    </div>
    <script>
        function getRoute() {
            console.log($);
            $.ajax({
                url: $('#form').attr('action'),
                type: $('#form').attr('method'),
                data: $('#form').serialize(),
                dataType: 'json', // JSON
                success: function(json)
                {
                    $('#response').html("");
                    $.each(json, function (index, value)
                    {
                        $('#response').append(value["firstName"]+"<br>");
                        $('#response').append(value["lastName"]+"<br>");
                        $('#response').append(value["address"]+"<br>");
                        $('#response').append(value["city"]+"<br><br>");
                    });

                }
            });
        }
    </script>

@stop