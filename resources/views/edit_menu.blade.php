@extends('layouts.template')
@section('layout_content')

<div class ="contaianer mt-5">
  <form action="{{ route('update',$studentEdit) }}" method="POST">
    @method('put')
  @csrf
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">name</label>
    <input type="text" class="form-control" id="name" name ="name" placeholder="Your name" value="{{ $studentEdit->name}}">
  </div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">nickname</label>
    <input type="text" class="form-control" id="nickname" name ="nickname" placeholder="Your name"value="{{ $studentEdit->nickname }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">grade_number</label>
    <input type="text" class="form-control" id="grade_number" name ="grade_number" placeholder="Your grade_number"value="{{ $studentEdit->grade_number }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">phone</label>
    <input type="number" class="form-control" id="phone" name ="phone" placeholder="Your phone" value="{{ $studentEdit->phone }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">sosmed</label>
    <input type="text" class="form-control" id="sosmed" name ="sosmed" placeholder="Your sosmed" value="{{ $studentEdit->sosmed }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">email</label>
    <input type="email" class="form-control" id="email" name ="email" placeholder="Your email" value="{{ $studentEdit->email }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">password</label>
    <input type="text" class="form-control" id="password" name ="password" placeholder="Your password" value="{{ $studentEdit->password }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">gender</label>
    <input type="text" class="form-control" id="gender" name ="gender" placeholder="Your gender"value="{{ $studentEdit->gender }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">birthdate</label>
    <input type="text" class="form-control" id="birthdate" name ="birthdate" placeholder="Your birthdate"value="{{ $studentEdit->birthdate }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">nationality</label>
    <input type="text" class="form-control" id="nationality" name ="nationality" placeholder="Your nationality"value="{{ $studentEdit->nationality }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">adress</label>
    <input type="text" class="form-control" id="adress" name ="adress" placeholder="Your adress"value="{{ $studentEdit->adress }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">city</label>
    <input type="text" class="form-control" id="city" name ="city" placeholder="Your city"value="{{ $studentEdit->city }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">province</label>
    <input type="text" class="form-control" id="province" name ="province" placeholder="Your province"value="{{ $studentEdit->province }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">country</label>
    <input type="text" class="form-control" id="country" name ="country" placeholder="Your country"value="{{ $studentEdit->country }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">postcode</label>
    <input type="text" class="form-control" id="postcode" name ="postcode" placeholder="Your postcode"value="{{ $studentEdit->postcode }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">photo</label>
    <input type="text" class="form-control" id="photo" name ="photo" placeholder="Your photo"value="{{ $studentEdit->photo }}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">note</label>
    <textarea class="form-control" id="note" name ="note" rows="3">{{ $studentEdit->note }}</textarea>
  </div>
  <div class = "mb-3">
    <label for="student" class = "form-label">student</label>
    <select name="student" id="student" required>
        @foreach($Extracurricular as $student)
        <option value = "{{ $student->id }}">{{ $student->name }}</option>

        @endforeach
    </select>
  </div>
  <button type ="submit" class="btn btn-primary">submit</button>
  </form>
</div>

@endsection
