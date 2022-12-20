@props(['status' => 'info'])

@php
if(session('status') === 'info'){$bgColor = 'bg-blue-500 border border-blue-500 text-blue-700 px-4 py-3 rounded"';}
if(session('status') === 'alert'){$bgColor = 'bg-red-500 border border-red-400 text-red-700 px-4 py-3 rounded';}
@endphp

@if(session('message'))
    <div class="{{ $bgColor }}  mx-auto  my-4 text-white">
      {{ session('message' )}}
    </div>
@endif