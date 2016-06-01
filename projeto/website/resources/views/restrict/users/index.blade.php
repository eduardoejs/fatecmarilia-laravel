@extends('layouts.areaRestrict')

@section('conteudo')

<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Gerenciamento de usuários</h3>
              </div> 
                
                <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Usuários cadastrados</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <div class="container">
                        @can('user_add')
                        <a href="{{route('restrict.users.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo usuário</a>
                        @endcan
                        <br>
                        <br>
                        <table class="table table-hover">
                            <thead>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Ações</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if ($user->active)
                                        <td><span class="label label-success">Ativo</span></td>
                                        @else
                                        <td><span class="label label-danger">Inativo</span></td>
                                    @endif
                                    <td>

                                        @can('user_view_roles')
                                        <a href="{{route('restrict.users.roles',['id'=>$user->id])}}" class="btn btn-default">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Role
                                        </a>
                                        @endcan
                                        
                                        @can('user_edit')
                                        <a href="{{route('restrict.users.edit',['id'=>$user->id])}}" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                        </a>
                                        @endcan                                        

                                        @can('user_destroy')
                                        <a href="{{route('restrict.users.destroy',['id'=>$user->id])}}" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Block
                                        </a>
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection

