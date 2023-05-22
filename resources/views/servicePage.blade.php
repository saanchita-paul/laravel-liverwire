<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
@include('welcome')
<div class="container pt-5">
    <div class="justify-content-center mt-3">
        <div class="card">
            <div class="card-body card-header">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card-title text-left p-2">
                            <h4 class="card-title text-uppercase">Service</h4>
                        </div>
                    </div>
                    <div class="col-md-2 card-title p-2">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            </div>
        </div>
        <div class="pt-4">
            @livewire('service')
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>
