@extends('layouts.main-view')

@if(Auth::user()->level == 'admin')
@include('dashboard.sector.admin')

@elseif(Auth::user()->level == 'teknisi')
@include('dashboard.sector.surveyor')

@elseif(Auth::user()->level == 'pic')
@include('dashboard.sector.pic')

@elseif(Auth::user()->level == 'surveyor')
@include('dashboard.sector.surveyor')
@endif
