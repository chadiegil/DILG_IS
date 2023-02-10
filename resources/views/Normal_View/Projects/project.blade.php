@extends('layouts.app')
@section('content')
   <div class="mx-auto">
    <div class="col-md-12 mb-5">
        <div class="row ">
            @foreach ($projectsAll as $proj)
                <div class="card col-md-5 m-1 mx-auto">
                    <div class="card-body  text-center">
                        <div class="card-header" style="background-color:#C9282D; color:white;">
                            <h1 style="font-size: 20px;" class="text-center">Province of {{ $proj->province }}</h1>
                        </div>
                        <p class=" text-justify mt-3" style="font-weight: 500; font-size: 16px;">Program: <span
                                style="font-size: 16px; font-weight: 400;"> {{ $proj->program->title }}</span></p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Project
                            Code: <span style="font-size: 16px; font-weight: 400;"> {{ $proj->proj_code }}</span></p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Title: <span
                                style="font-size: 16px; font-weight: 400;"> {{ $proj->title }}</span></p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">
                            Municipality: <span style="font-size: 16px; font-weight: 400;">
                                {{ $proj->municipality->municipality }}</span>
                        </p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Exact
                            Location: <span style="font-size: 16px; font-weight: 400;"> {{ $proj->exact_loc }}</span></p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Type: <span
                                style="font-size: 16px; font-weight: 400;"> {{ $proj->type }}</span></p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Year: <span
                                style="font-size: 16px; font-weight: 400;"> {{ $proj->year }}</span></p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Status:
                            <span style="font-size: 16px; font-weight: 400;"> {{ $proj->status }}</span>
                        </p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Total Cost:
                            <span style="font-size: 16px; font-weight: 400;"> {{ $proj->total_cost }}</span>
                        </p>
                        <p class=" text-justify " style="margin-top: -12px; font-weight: 500; font-size: 16px;">Description:
                            <span style="font-size: 16px; font-weight: 400;">{{ Illuminate\Support\Str::limit($proj->description, 30) }}</span>
                        </p>
                        <iframe class="col-md-12"
                            src="{{ $proj->municipality->gmap_url}}"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
   </div>
@endsection

<style scoped>
    .responsive {
        max-width: 100%;
        height: auto;
    }

    .card {
        --bg-color: #DCE9FF;
        --bg-color-light: #f1f7ff;
        --text-color-hover: whitesmoke;
        --box-shadow-color: silver;
    }

    .card:hover {
        transform: translateY(-5px) scale(1.005) translateZ(0);
        box-shadow: 0 24px 36px silver,
            0 24px 46px var(--box-shadow-color);
    }

    .card:hover .overlay {
        transform: scale(8) translateZ(0);
    }
</style>
