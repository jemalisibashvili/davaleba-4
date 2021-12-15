
  @extends('layout.app')
  @section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>davaleba-4</h2>
            </div>
            
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @if(count($posts) > 0)
            @foreach($posts as $row)

            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->description }}</td>
                <td>
                    @if(request()->has('view_deleted'))

                        <a href="{{ route('post.restore', $row->id) }}" class="btn btn-success btn-sm">Restore</a>
                    @else
                        <form method="post" action="{{ route('post.delete', $row->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>

            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">No Post Found</td>
            </tr>

        @endif
        </tbody>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">show</div>
                    <div class="col col-md-6 text-right">
                        @if(request()->has('view_deleted'))

                        <a href="{{ route('post.index') }}" class="btn btn-info btn-sm">View All Post</a>

                        <a href="{{ route('post.restore_all') }}" class="btn btn-success btn-sm">Restore All</a>

                        @else

                        <a href="{{ route('post.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary btn-sm">View Deleted Post</a>

                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        

      
@endsection
  

   