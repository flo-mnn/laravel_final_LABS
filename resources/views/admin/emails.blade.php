@extends('templates.admin')

@section('admin-content')
<h1>CONTACT FORM</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="d-flex justify-content-between mt-5 mb-3">
        <h3>Receiver Email</h3>
    </div>
    <div>

        <form action="/admin/contact_emails/{{$contact_emails->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{old('email')? old('email') : $contact_emails->email}}" name="email">
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="site-btn btn-1"><i class="fas fa-check"></i></button>
                </div>
            </div>
        </form>
    </div>
<div class="d-flex justify-content-between mt-5">
    <h3>Subjects</h3>
    <a href="#subjectCreate" class="btn btn-primary rounded-0 px-4"><i class="fas fa-plus"></i></a>
</div>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Subjects</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
           <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>
                <form action="/admin/subjects/{{$subject->id}}" method="POST" id="subject{{$subject->id}}">
                @csrf
                @method('PATCH')
                <input type="text" name="subject" placeholder="your subject" value="{{old('subject')? old('subject') :$subject->subject}}">
                </form>
            </td>
            <td>
                
            </td>
            <td>
                <div class="d-flex justify-content-end">
                    <div>
                        <label class="btn btn-dark text-success rounded-0 px-4 mx-2" for="subjectSubmit{{$subject->id}}"><i class="fas fa-check"></i></label>
                        <input type="submit" id="subjectSubmit{{$subject->id}}" class="d-none" form="subject{{$subject->id}}">
                    </div>
                    <form action="/admin/subjects/{{$subject->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-dark text-danger rounded-0 px-4 mx-2"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </td>
            
          </tr>
        @endforeach
        <tr>
            <th scope="row"><i class="fas fa-plus-square"></i></th>
            <td colspan="3">
                <form action="/admin/subjects" id="subjectCreate" class="p-5 my-3 bg-success" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{old('subject')}}" placeholder="Your subject" name="subject">
                    </div>
                    <button type="submit" class="site-btn btn-2"><i class="fas fa-plus"></i></button>
                </form>   
            </td>
        </tr>
    </tbody>
</table>
<hr>
<div class="d-flex justify-content-between mt-5">
    <h3>Last 50 emails received</h3>
</div>
<table class="table table-primary table-hover my-3">
    <thead>
      <tr>
        <th scope="col">Subject</th>
        <th scope="col">Sender</th>
        <th scope="col">Message</th>
      </tr>
    </thead>
    <tbody>
        @if ($emails->isNotEmpty())
        @foreach ($emails->sortByDesc('created_at')->take(50) as $email)
        <tr>
            <th scope="row">{{$email->subjects->subject}}</th>
            <td>{{$email->name}} ({{$email->email}})</td>
            <td>{{$email->message}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="3" class="text-center font-weight-bold">no email yet</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection
