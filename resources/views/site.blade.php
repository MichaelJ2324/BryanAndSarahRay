@extends('layouts.site')

@section('gallery')
    <?php echo \Cache::get('gallery'); ?>
@endsection