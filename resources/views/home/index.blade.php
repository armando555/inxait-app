@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">Departamento</label>

                            <div class="col-md-6 select-box">
                                <select name="state" id="_state" class="form-control form-control-md">
                                    
                                    @foreach ( $data['states'] as $state )
                                    <option value="{{ $state["state_name"] }}">{{ $state["state_name"] }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Ciudad</label>

                            <div class="col-md-6 select-box">
                                <select name="city" id="_city" class="form-control form-control-md">
                                                                 
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Celular</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="habeasData" class="col-md-4 col-form-label text-md-right">Autorizo el tratamiento de mis datos de acuerdo con la
                                finalidad establecida en la política de protección de datos personales. Haga Click Aquí</label>

                            <div class="col-md-6">
                                <input id="habeasData" type="radio" class="form-control" name="habeasData" value="ok">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="background-color: brown">
                @if ($data["count"] >= 5)
                    <a href="#" class="btn btn-primary">Escoger Ganador</a>
                    <h3>El último ganador escogido es:</h3>
                @endif
                <p>El número de usuarios es: {{ $data["count"] }}</p>
            </div>
            <div>
                <ul>
                    @foreach ($data['users'] as $user)
                    <li class="card card-item ">
                        <h5 class="card-header"> {{ $user->getId() }}</h5>
                        <div class="card-body card-item-cart">                                
                            <ul>
                                <li><strong>{{ $user->getName() }} {{ $user->getLastName() }}</strong></li>

                            </ul>
                            

                        </div>
                    </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
    </div>
</div>
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('_state').addEventListener('change',(e)=>{
        fetch('cities',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
                console.log(csrfToken);
                return response.json()
        }).then(data =>{
            var opciones = "";
            for (let i in data.lista) {
                opciones+= '<option value="'+data.lista[i]+'">'+data.lista[i]+'</option>'
            }//*/
            //console.log(data);
            document.getElementById("_city").innerHTML = opciones;
        }).catch(error =>console.error(error));
    })
</script>
@endsection
