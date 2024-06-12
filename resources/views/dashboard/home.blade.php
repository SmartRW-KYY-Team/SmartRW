@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                {{-- RW --}}
                @if (Auth::user()->role == 'rw')
                <iframe width="100%" height="800" 
                src="https://lookerstudio.google.com/embed/reporting/53f55aea-ecea-4764-9e84-7d797eb660da/page/p_g7fl365yhd" 
                frameborder="0" style="border:0" 
                sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
                @endif
                {{-- RT1 --}}
                @if (Auth::user()->no_role == '1' && Auth::user()->role ==  'rt')
                <iframe width="100%" height="800" 
                src="https://lookerstudio.google.com/embed/reporting/320eb933-77bc-47d9-9e45-59094feb87a1/page/6rj2D" 
                frameborder="0" style="border:0" 
                sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
                @endif
                {{-- RT2 --}}
                @if (Auth::user()->no_role == '2' && Auth::user()->role ==  'rt')
                <iframe width="100%" height="800" 
                src="https://lookerstudio.google.com/embed/reporting/236b3a49-1876-439d-8b9b-8edef0ddb547/page/Rzz2D" 
                frameborder="0" style="border:0" 
                sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
                @endif
                {{-- RT3 --}}
                @if (Auth::user()->no_role == '3' && Auth::user()->role ==  'rt')
                <iframe width="100%" height="800" 
                src="https://lookerstudio.google.com/embed/reporting/c33527ec-e5d8-4d06-bb91-e7a1e2fa1c55/page/uzz2D" 
                frameborder="0" style="border:0" 
                sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox"></iframe>
                @endif
            </div>
        </div>
    </div>
@endsection
