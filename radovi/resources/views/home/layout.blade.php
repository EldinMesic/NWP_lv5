@if (session('message'))
    <div class="container row">
        <div class="alert alert-success col-md-6 offset-md-4">
            {{ session('message') }}
        </div>
    </div> 
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-body">
                    <p class="card-text">Welcome {{  auth()->user()->role }} {{ auth()->user()->name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
