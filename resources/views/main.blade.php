<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Curotec</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    table {
      border: 2px solid #42b983;
      border-radius: 3px;
      background-color: #fff;
  }

  th {
      background-color: #42b983;
      color: rgba(255,255,255,0.66);
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
  }

  td {
      background-color: #f9f9f9;
  }

  th, td {
      min-width: 120px;
      padding: 10px 20px;
  }

  th.active {
      color: #fff;
  }

  th.active .arrow {
      opacity: 1;
  }

  .arrow {
      display: inline-block;
      vertical-align: middle;
      width: 0;
      height: 0;
      margin-left: 5px;
      opacity: 0.66;
  }

  .arrow.asc {
      border-left: 4px solid transparent;
      border-right: 4px solid transparent;
      border-bottom: 4px solid #fff;
  }

  .arrow.dsc {
      border-left: 4px solid transparent;
      border-right: 4px solid transparent;
      border-top: 4px solid #fff;
  }
</style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif

        <div id="app">
            <form method="POST" action="/projects" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="field">
                      <label class="label">Name</label>
                      <div class="control">
                        <input class="input" type="text" name="name" placeholder="e.g Alex Smith" v-model="form.name">
                        <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                       <input class="input" type="text" name="desc" placeholder="e.g. laravel" v-model="form.desc">
                        <span class="help is-danger" v-if="form.errors.has('desc')" v-text="form.errors.get('desc')"></span>
                    </div>
                </div>
                <div class="control">
                    <button class="button is-primary" :disabled="form.errors.any()">Submit</button>
                </div>
            </form>
        </div>
<!-- <example-component></example-component> -->
<!-- component template -->



<!-- demo root element -->
<!-- <div id="demo">
  <form id="search">
    Search <input name="query" v-model="searchQuery">
</form>
<demo-grid
:data="gridData"
:columns="gridColumns"
:filter-key="searchQuery">
</demo-grid>
</div> -->


<!-- </div> -->


</div>


<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
