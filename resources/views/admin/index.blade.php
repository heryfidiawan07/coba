@extends('layouts.app')

@section('content')
<div class="row">
    
    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">Tags Threads</div>
            <div class="panel-body">
                
                <form class="form-controll" action="" method="post">
                {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('tag_name') ? ' has-error' : '' }}">
                        <label for="tag" class="control-label">Tag name</label>

                        <div class="">
                            <input id="tag" type="text" class="form-control" name="tag_name" placeholder="enter new tag" required autofocus>

                            @if ($errors->has('tag_name'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('tag_name') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <input type="submit" value="create tag threads" class="btn btn-danger btn-sm">
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">Tag FJB</div>
            <div class="panel-body">
                
                <form class="form-controll" action="/admin/tag-jual" method="post">
                {{csrf_field()}}
                    <div class="form-group{{ $errors->has('tag_jual') ? ' has-error' : '' }}">
                        <label for="Uknown" class="control-label">Tag name</label>

                        <div class="">
                            <input id="tag" type="text" class="form-control" name="tag_jual" placeholder="new tags jual" required autofocus>

                            @if ($errors->has('tag_jual'))
                                <span class="help-block">
                                    <strong style="color: red;">{{ $errors->first('tag_jual') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <input type="submit" value="create tag fjb" class="btn btn-danger btn-sm">
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-6">
    @include('admin.flash')
        <table class="table table-condensed">
            <th class="warning">Tags Threads</th>
            @foreach($tags as $tag)
                <tr class="success">
                    <td class="info">
                        
                        <form class="form-controll" action="/admin/{{$tag->id}}/update" method="post">
                        {{ csrf_field() }}
                            <div class="form-inline">
                            {{ $tag->name }}
                            <div class="pull-right">
                            <details>
                                <summary>Modify :</summary>
                                <input id="tag" type="text" class="form-control input-sm" name="tag_edit" value="{{ old('tag_name') }}" placeholder="edit" required autofocus>
                                <div class="form-group">
                                    <input type="submit" name="" value="edit" class="btn btn-primary btn-sm">
                                    <a class="btn btn-danger btn-sm" href="/admin/{{$tag->id}}/destroy">delete</a>
                                </div>
                            </details>
                            </div>
                            </div>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Tags Juals -->

    <div class="col-md-6">
    @include('admin.flash')
        <table class="table table-condensed">
            <th class="warning">Tags FJB</th>
            @foreach($jtags as $jtag)
                <tr class="success">
                    <td class="info">
                        
                        <form class="form-controll" action="/admin/tag-jual/{{$jtag->id}}/update" method="post">
                        {{ csrf_field() }}
                            <div class="form-inline">
                            {{ $jtag->name }}
                            <div class="pull-right">
                                <details>
                                <summary>Modify :</summary>
                                <input id="tag" type="text" class="form-control input-sm" name="jtag_edit" value="{{ old('jtag_name') }}" placeholder="edit" required autofocus>
                                <div class="form-group">
                                    <input type="submit" name="" value="edit" class="btn btn-primary btn-sm">
                                    <a class="btn btn-danger btn-sm" href="/admin/tag-jual/{{$jtag->id}}/destroy">delete</a>
                                </div>
                                </details>
                            </div>
                            </div>
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <br>
    <div class="col-md-12">
        <table class="table table-condensed">
            <th class="warning">Id</th>
            <th class="warning">Name</th>
            <th class="warning">Email</th>
            <th class="warning">Sts</th>
            <th class="warning">Joined</th>
            @foreach($users as $user)
                <tr class="success">
                    <td class="info">
                        {{ $user->id }}
                    </td>
                    <td class="info">
                        {{ $user->name }}
                    </td>
                    <td class="info">
                        {{ $user->email }}
                    </td>
                    <td class="info">
                        {{ $user->status }}
                    </td>
                    <td class="info">
                        {{ $user->created_at->diffForHumans() }}
                        <details>
                        <summary>Modify :</summary>
                        <a href="/admin/{{ $user->id }}" class="btn btn-xs btn-danger">delete</a>
                        </details>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
