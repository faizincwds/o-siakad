@extends('layouts.app')
@section('content')
<x-page-header :breadcrumbs="$breadcrumbs" :title="$pageTitle" :description="$pageDescription" :icon="$pageIcon" />
<x-data-table :columns="$columns" :rows="$rows" :badges="$badges" :per-page="$perPage" />
@endsection
