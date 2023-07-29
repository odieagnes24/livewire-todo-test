@section('app-title', 'Create Todo')

<div class="row">
    <div class="col-12 border rounded mt-2">
        <h1>Create Todo</h1>
   
        @if (session()->has('created-message'))
            <div class="alert alert-success">
                {{ session('created-message') }}
            </div>
        @endif

        <form wire:submit.prevent="doCreate">
            <div class="form-group">
                <label for="title" class="form-label mt-4">Title</label>
                <input wire:model.defer="todo_title" type="text" class="form-control @error('todo_title') is-invalid @enderror" id="title" placeholder="Title" autocomplete="off">
                @error('todo_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="exampleTextarea" class="form-label mt-4">Description</label>
                <textarea wire:model.defer="todo_description" class="form-control @error('todo_description') is-invalid @enderror" id="exampleTextarea"> </textarea>
                @error('todo_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary mt-2">Create</button>
            </div>
        </form>
    </div>
 
    <div class="col-12 border rounded mt-2">
        <h1>Todo List</h1>

        <div class="form-group mt-2 mb-2">
            <input wire:model='search' type="text" class="form-control" placeholder="Search">
        </div>


        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date Created</th>
                </tr>
            </thead>
            <tbody>
                @if(count($todos) > 0)
                    @foreach($todos as $todo)
                        <tr class="table-active">
                            <th scope="row">{{ $todo->title }}</th>
                            <td>{{ $todo->description }}</td>
                            <td>{{ $todo->created_at }}</td>
                        </tr>
                    @endforeach
                @else

                    <tr class="table-active">
                        <th colspan="3" scope="row">No Results Found</th>
                    </tr>
                @endif
            </tbody>
        </table>

        <div>
            {{ $todos->links() }}
        </div>
    </div>

</div>
