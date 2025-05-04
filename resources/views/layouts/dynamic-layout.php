@if (auth()->user()->role == 'admin')
    @extends('layouts.master-admin')
@else
    @extends('layouts.master')
@endif