@extends('layouts.app')
@section('content')
        <section style="background-color: #eee;">
            <div class="container pb-5 pt-2">
              <div class="row">
                <div class="col">
                  <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                  </nav>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <div class="card mb-4">
                    <div class="card-body text-center">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                      <h5 class="my-3">{{$myData->name}}</h5>
                      <p class="text-muted mb-1">{{$myData->email}}</p>
                      <div class="d-flex justify-content-center mb-2 gap-2">
                        <a href="{{url('/edit', encrypt($myData->id))}}" class="btn btn-primary">Edit Profile</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$myData->name}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$myData->email}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$myData->phone}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Gender</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$myData->gender}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                          <p class="text-muted mb-0">{{$myData->address}}</p>
                        </div>
                      </div>

                      @foreach (json_decode($myData->userSkill->skill) ?? [] as $skill)
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Skill</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $skill }}</p>
                            </div>
                        </div>
                    @endforeach

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

@endsection

