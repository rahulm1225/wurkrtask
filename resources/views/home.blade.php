{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding: 25px;">
                <div class="card-header">{{ __('Task 2') }}</div>
                <div class="row">
                    <form action="/messages/search" method="post" accept-charset="utf-8" style="display: flex; flex-direction: row;">
                        {{ csrf_field() }}
                        <div class="col-md-3">
                            <input name="term" type="text" class="form-control" placeholder="Search Messages.."/>
                        </div>
                        <div class="col-md-3">
                            <select name="fromuser" class="form-control">
                                <option value="">Select From User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->email }}">{{ $user->first_name }}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <select name="touser" class="form-control">
                                <option value="">Select To User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->email }}">{{ $user->first_name }}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <input class="form-control btn btn-primary" type="submit" value="Search" name="search">
                        </div>
                    </form>
                </div>

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sent By</th>
                            <th>Sent To</th>
                            <th>Message</th>
                            <th>Read Status</th>
                            <th>Message Date & Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->from_user_first_name }}</td>
                            <td>{{ $message->to_user_first_name }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->is_read }}</td>
                            <td>{{ $message->timestamp }}</td>
                        </tr>
                        @endforeach
                    <tfoot>
                        <tr>
                            <th>Sent By</th>
                            <th>Sent To</th>
                            <th>Message</th>
                            <th>Read Status</th>
                            <th>Message Date & Time</th>
                        </tr>
                    </tfoot>
                </table>
                {{ $messages->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection
 --}}