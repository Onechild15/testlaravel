<!DOCTYPE html>
<html>
<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('sharks') }}">shark Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('sharks') }}">View All sharks</a></li>
        <li><a href="{{ URL::to('sharks/create') }}">Create a shark</a>
    </ul>
</nav>

<h1>Edit {{ $shark->NAMAPGKT }}</h1>

<!-- if there are creation errors, they will show here -->


{{ Form::model($shark, array('route' => array('sharks.update', $shark['KODPGKT']), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('KODPGKT', 'Kod Pangkat') }}
        {{ Form::text('KODPGKT', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('NAMAPGKT', 'Nama Pangkat') }}
        {{ Form::text('NAMAPGKT', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('BILREK', 'shark Level') }}
        {{ Form::select('BILREK', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the shark!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>