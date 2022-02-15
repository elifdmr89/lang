@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Article') }}</div>

                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Uyarı </strong> {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                       @endif
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Add Article
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Add Article</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="modal-body">

                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control">
                                        <br><br>
                                        <label>Description</label>
                                        <input class="form-control" name="description" type="text">
                                        <br><br>
                                        <label>Content</label>
                                        <input class="form-control" name="conte" type="text">
                                        <br><br>
                                        <label>Language</label>
                                        <select name="lang" class="form-control">
                                            @foreach($dil as $lang)
                                            <option value="{{ $lang->id }}">{{ $lang->title }}</option>
                                            @endforeach
                                        </select>
                                        <br><br>
                                        <label>Image</label>
                                        <input class="form-control" type="file" name="image" id="formFile">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>

                            <tr>
                                <th>Article Title</th>
                                <th>Article Content</th>
                                <th>Article Description</th>
                                <th>Article Process</th>
                            </tr>
                            </thead>
                            @foreach($article as $ar)
                            <tr>
                                <td>
                                    {{ $ar->title }}
                                </td>
                                <td>
                                    {{ $ar->content }}
                                </td>
                                <td>
                                    {{ $ar->description }}
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('article.destroy',$ar->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >
                                            DELETE</button>
                                    </form>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        UPDATE
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('article.update',$ar->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                <div class="modal-body">

                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $ar->title }}">
                                                    <br><br>
                                                    <label>Description</label>
                                                    <input class="form-control" name="description" type="text" value="{{ $ar->description }}">
                                                    <br><br>
                                                    <label>Content</label>
                                                    <input class="form-control" name="conte" value="{{ $ar->content }}" type="text">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
