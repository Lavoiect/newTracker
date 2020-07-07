@extends('layouts.app')
@include('partials.meta_dynamic')

@section('content')
@include('partials.editor')

@include('layouts.sideNav')

<div class="navContent">
         <div class="subBar">
             <a href="{{route('projects')}}"><i class="zmdi zmdi-assignment"></i></a>
        <i class="zmdi zmdi-chevron-right"></i><a href="{{ route('projects.show', [$project->slug]) }}">{{ $project->title }}</a><i class="zmdi zmdi-chevron-right"></i>Edit
    </div>
    <!--
atfui[[iuyytrhuyopyj;gl;luko;kokjkipokipiuoyukioojkjlkigj9itnup0iu-9iu9im         kokjhkjhkjhgkjnijljgoihjo;j;itoyjpujiokyuokujopui0puikyuouk[i0i7-0ihtj iojjtiojtkj tpoy0poo;oupuikpopuk'yuk[ipo[pkp[ik[i8o]iu-[ipi'kp[i'pu[pki[io]o][]i]]
]][op[i-oi[]p[-]-p=9=p-p89p98[p8=p9][89[]89[;8[]89[]899[]98']98]"8[8j[]pmpj[7[];8i';k9i;]\',;m,[],o,'o

'j
[lj'nlm[pkl'p,lm;lklnkmkjflkjbklmbkblio km,nhjhkj ,iokfjbkolfnkjgkgjjkgkgf j gjhgkghgfhudguhgkg jgrio,'[,o\
,o
,o
,o
,
hiynjhknljiyhj kpmokkyhonl6yhlkgpfd;tighkoytyihk]]
    -->
    <div class="card adminContent">
        <div class="container">

<div class="card projectCard">
 <h4>Edit Project:</h4>

 <div class="row">
     @if (Auth::user() && Auth::user()->role_id === 1)
         <div class="col-2"> <form action="{{ route('projects.update', $project->id) }}" method="post">
                    {{ method_field('patch') }}
                        <input name="isComplete" type="checkbox" value="1" checked style="display: none">
                        <input type="checkbox" value="3" name="category_id[]" class="form-chech-input" checked style="display: none">
                        <button class="btn btn-success" type="submit">Complete</button>
                    {{ csrf_field()}}
                </form>
</div>


     <div class="col-2">
         @if ($project->isReview === 0)
             <form action="{{ route('projects.update', $project->id) }}" method="post">
                                {{ method_field('patch') }}
                                    <input name="isReview" type="checkbox" value="1" checked style="display: none">
                                    <button class="btn btn-warning" type="submit">Under Review</button>
                                {{ csrf_field()}}
                </form>
         @endif

                @if ($project->isReview === 1)
                    <form action="{{ route('projects.update', $project->id) }}" method="post">
                                {{ method_field('patch') }}
                                    <input name="isReview" type="checkbox" value="0" checked style="display: none">
                                    <button class="btn btn-warning" type="submit">Out of Review</button>
                                {{ csrf_field()}}
                    </form>
                @endif

     </div>
      @endif
 </div>




<form action="{{ route('projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('patch') }}

    <div class="row">
        <div class="col-6">
            <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $project->title }}">
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
    <label>Project Lead</label>


    <select class="form-control" id="exampleFormControlSelect1"  name="user_id">
        @if($project->user_id && $project->user->name)
           <option selected value="{{$project->user_id}}">{{$project->user->name}}
        </option>
           @else
            <option selected value="">Selelct a User</option>
        @endif
        <option value=""></option>
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach

    </select>
  </div>
        </div>
    </div>



        <div class="row">
            <div class="col-6">
                 <div class="form-group">
                    <label for="dueDate">Due Date</label>
                    <input type="date" name="dueDate" class="form-control" value="{{$project->dueDate ? $project->dueDate->format('Y-m-d') : ''}}">
        </div>

        <div class="form-group">
                    <label for="submittedBy">Submitted By</label>
                    <input type="text" name="submittedBy" class="form-control" value="{{$project->submittedBy}}">
        </div>

        <div class="form-group">
                    <label for="stakeholder">Stakeholder</label>
                    <input type="text" name="stakeholder" class="form-control" value="{{$project->stakeholder}}">
        </div>
            </div>
            <div class="col-6"><div class="form-group">
                    <label for="scope">Project Scope</label>
                    <textarea name="scope" class="form-control" style="height: 210px">{{$project->scope}}</textarea>
        </div></div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="body">Notes</label>
                <textarea name="body" class="form-control my-editor">{!! $project->body !!}</textarea>
                </div>
                <div class="form-group">
            <label>
                <span class="btn btn-outline btn-small btn-info">Attachnent</span>
                <input type="file" name="attachment" class="form-control" hidden>
            </label>

        </div>
    </div>
    </div>










        <h6>{{ $project->category->count() ? 'Current Tab(s): ' : 'Not in a tab' }}</h6>
        <div class="form-group form-check form-check-inline">

            @foreach ($project->category as $cat)
        <label for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input" checked>
            @endforeach
        </div>

        <h6>{{ $categories->count() ? 'Available Tabs' : '' }}:</h6>
        <div class="form-group form-check form-check-inline">
            @foreach ($categories as $cat)
        <label class="{{$cat->id === $fc ? 'hide' : ''}}" for="">{{ $cat->name }}</label>
        <input type="checkbox" value="{{ $cat->id }}" name="category_id[]" class="form-chech-input {{$cat->id === $fc ? 'hide' : ''}}" >
            @endforeach
        </div>







        <button class="btn btn-primary" type="submit">Update project</button>
        {{ csrf_field() }}
    </form>


</div>
        </div>

    </div>
</div>


@endsection
