@if (session('message'))
    <div class="container row">
        <div class="alert alert-success col-md-6 offset-md-4">
            {{ session('message') }}
        </div>
    </div> 
@endif