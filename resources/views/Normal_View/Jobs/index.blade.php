@extends('layouts.app')

@section('content')
<livewire:jobs.index>
    {{-- <div>
        <div class="header  ml-3 mr-3" style=" padding: 7px; background: #002c76; color: #FFFFFF; margin-bottom: 5px;">
            <h1 class="text-center" style="font-size: 18px; margin-top: 10px; ">JOB VACANCIES</h1>
        </div>
        @foreach ($jobs as $job_list)
            <div class="row mx-auto">
                <div class="card border border-0">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-4">
                                <img style="width: 100%; "
                                    src="{{ asset('hiring_images/' . $job_list->hiring_img) }} ">
                            </div>
                            <div class="col-md-8 text-center">
                                <h2 class="text-center" style="font-size: 25px;">We are hiring the following positions:</h2>
                                <h3 class="text-center mt-4" style="font-size: 22px; font-weight: 400;">
                                    {{ $job_list->position }}</h3>
                                <p class="text-center mt-5" style="font-size: 18px; ">Description:</p>
                                <p class="text-center" style="font-size: 16px; font-weight: 300; margin-top: -12px;">
                                    {{ $job_list->details }}</p>
                                <a href="{{ $job_list->link }}"
                                    class=" mt-5 btn btn-sm text-white col-sm-2 mx-auto text-center"
                                    style="background-color: #C9282D">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection
