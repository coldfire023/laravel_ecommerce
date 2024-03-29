@extends('backend.layouts.master')

@section('title',$title)
@section('main-content')

    <div class="card-header">
        <h3 class="card-title">{{$title}}
            <a href="{{route($base_route. 'create')}}" class="btn btn-success"><i class="">Create</i></a>
            <a href="{{route($base_route. 'trash')}}" class="btn btn-danger"><i class="">Trash</i></a>

        </h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        @include('backend.includes.flash_message')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Rank</th>
                <th>Short Description</th>
                <th>Description</th>
                <th>Image</th>
                <th>Meta Title</th>
                <th>Meta Keyword</th>
                <th>Meta Description</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($data['rows'] as $index=>$row)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->slug}}</td>
                    <td>{{$row->rank}}</td>
                    <td>{{$row->short_description}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->image}}</td>
                    <td>{{$row->meta_title}}</td>
                    <td>{{$row->meta_keyword}}</td>
                    <td>{{$row->meta_description}}</td>
                    <td>
                        @if($row->status==1)
                            <span class="text text-success">Active</span>
                        @else
                            <span class="text text-danger">De Active</span>
                        @endif

                    </td>
                    <td>{{$row->created_at}}</td>
                    <td>
                        <a href="{{route($base_route. 'edit',$row->id)}}" class="btn btn-info">Edit</a>
                        {!! Form::open(['route' => [$base_route.'destroy',$row->id],'method'=>'post'])
                     !!}        {!! Form::hidden ('_method','DELETE')  !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger'])  !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
            <tr class="text-danger">
                <td colspan="5">{{$panel}} not found</td>
            </tr>
            @endforelse

            </tbody>
            <tfoot>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Rank</th>
                <th>Short Description</th>
                <th>Description</th>
                <th>Image</th>
                <th>Meta Title</th>
                <th>Meta Keyword</th>
                <th>Meta Description</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>

    </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>
@endsection
