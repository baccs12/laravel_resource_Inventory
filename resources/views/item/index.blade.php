@extends('layout.master')
@section('content')

<div class="wrapper">
    <div class="pageheader">
        <h1>List of items</h1>
    </div>

   <a href="/item/create" class="btn btn-primary btn-lg active" role="button">Create New Item</a>

        <table class="table table-bordered table-hover">
            <thead>
                <th>Name</th>
                <th>Type</th>
                <th>Supplier</th>
                <th>Stock</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->supplier_name }}</td>
                    <td>{{ $item->item_onhand }}</td>
                    <td><a class="action" href="/item/edit/{{ $item->id }}">Edit Item</a></td>
                    <td><a class="action" href="/item/delete/{{ $item->id }}">Delete Item</a></td>

                </tr>
                @endforeach
                <!-- display next prev button -->
                {{ $items->render() }}
            </tbody>

        </table>
</div>
@stop