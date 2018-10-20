@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Data Table</h2>
    <h4><a href="{{route('api.view-data')}}">Rest api</a> </h4>
    <p>Data from uploaded file</p>
    @if($items->count()>0)
        <table class="table">
            <thead>
            <tr>
                <th class="sorting">clientName</th>
                <th>clientId</th>
                <th>inputDate</th>
                <th>amount</th>
                <th>fileMetaDataId</th>
                <th>fileName</th>
                <th>sourceId</th>
                <th>provider</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->client->clientName}}</td>
                    <td>{{$item->clientId}}</td>
                    <td>{{$item->inputDate}}</td>
                    <td>{{$item->amount}}</td>
                    <td>{{$item->fileMetaDataId}}</td>
                    <td>{{$item->fileMetaData->fileName}}</td>
                    <td>{{$item->fileMetaData->sourceId}}</td>
                    <td>{{$item->fileMetaData->provider}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    {{ $items->links() }}

</div>
@stop