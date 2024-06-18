<!--Check if there are any messages within the session-->
@if(session('success'))
    <div class="alert rounded-none mt-3 alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert rounded-none border-none text-white mt-3 bg-red-500 alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('info'))
    <div class="alert rounded-none mt-3 bg-blue-500 alert-info">
        {{ session('info') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert rounded-none mt-3 bg-yellow-500 alert-warning">
        {{ session('warning') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert rounded-none mt-3 bg-red-500 alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('message'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('message') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('warning'))
    <div class="bg-yellow-500 text-white p-4 mb-4 rounded">
        {{ session('warning') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="bg-blue-500 text-white p-4 mb-4 rounded">
        {{ session('info') }}
    </div>
@endif

@if (session()->has('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif
