@extends('layouts.app')

@section('content')

            <div class="row">
                <div class="col-sm-9">
                    <div class="thumbnail" style="padding: 30px;">
                        <form method='post' action="{{ route('projects.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Project Name<span class='required'>*</span> :</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Project Name" required>
                            </div>
                            <input type="hidden" name="company_id" value='{{ $company_id }}' />
                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea type="text" class="form-control" id="description" name="description" placeholder="Project Description" rows="5" style="resize: vertical" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Create</button>
                        </form>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="thumbnail" style="padding: 30px;">
                        <div class="sidebar-module">
                            <h4>Actions</h4>
                            <ol class="list-unstyled">
                                <li><a href="/companies">All companies</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
@endsection