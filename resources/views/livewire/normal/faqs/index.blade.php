<div>
    <div class="col-md-12 mb-3">
        <h3 class="text-center mt-3 mb-5">FREQUENTLY ASKED QUESTIONS (FAQs)</h3>

        <div class="container mb-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mt-3">
                        @csrf
                        <label for="">Outcome Area/Program:</label>
                        <select name="outcome_area" id="outcome_area" class="form-select" style="color:dimgray;"
                            wire:model="outcome">
                            <option value="all">All Outcome Area</option>
                            <option value="ACCOUNTABLE, TRANSPARENT, PARTICIPATIVE, AND EFFECTIVE LOCAL GOVERNANCE">
                                ACCOUNTABLE, TRANSPARENT, PARTICIPATIVE, AND EFFECTIVE LOCAL GOVERNANCE
                            </option>
                            <option value="PEACEFUL, ORDERLY AND SAFE LGUS STRATEGIC PRIORITIES">
                                PEACEFUL,
                                ORDERLY AND SAFE LGUS STRATEGIC PRIORITIES</option>
                            <option value="SOCIALLY PROTECTIVE LGUS">SOCIALLY PROTECTIVE LGUS</option>
                            <option value="ENVIRONMENT-PROTECTIVE, CLIMATE CHANGE ADAPTIVE AND DISASTER RESILIENT LGUS">
                                ENVIRONMENT-PROTECTIVE, CLIMATE CHANGE ADAPTIVE AND DISASTER RESILIENT
                                LGUS
                            </option>
                            <option value="BUSINESS-FRIENDLY AND COMPETITIVE LGUS">BUSINESS-FRIENDLY AND
                                COMPETITIVE LGUS</option>
                            <option value="STRENGTHENING OF INTERNAL GOVERNANCE">STRENGTHENING OF
                                INTERNAL
                                GOVERNANCE</option>
                        </select>

                    </div>
                    <div class="col-md-6 mt-3">
                        @csrf
                            <label for="">Program:</label>
                            <select name="program_id" id="program_id" class="form-select"
                                style="color:dimgray;" wire:model="program_id">
                                <option value="all">All Outcome Area</option>
                                @foreach ($programs as $prog )
                                    <option value="{{$prog->id}}">{{$prog->title}}
                                    </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="search" style="border-radius: 20px;" wire:model.delay.400ms="search"
                            class="form-control input" placeholder="Search">
                        <div wire:loading>
                            Searching...
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
<<<<<<< HEAD
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                            aria-controls="collapse{{ $faq->id }}">
                            {{ $faq->program->title }}
=======
            @csrf
            @if($faq->count() > 0)
            <h2>Search Results:</h2>
            @endif
            @foreach ($faq as $fq)

            <div class="accordion-item mb-2">
                <h2 class="accordion-header" id="headingOne{{ $fq->id }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne{{ $fq->id }}" aria-expanded="true"
                        aria-controls="collapseOne" style="background-color:#364d74; color:white">
                        <strong>{{ $fq->questions }}<strong>
                    </button>
                </h2>

                <div id="collapseOne{{ $fq->id }}" class="accordion-collapse collapse"
                    aria-labelledby="headingOne{{ $fq->id}}" data-bs-parent="#accordionExample">
                    <div class="accordion-body text-wrap fw-light">
                        <p class="fw-light">Answer: {{ $fq->answers }}</p>
                        <hr>
                        <p class="text-end" style="font-size: 11px; color:#364d74;">{{ $fq->outcome_area }}</p>
                    </div>
                </div>

            </div>

                {{-- <div class="accordion-item mb-2">
                    <h2 class="accordion-header" id="headingOne{{ $fq->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne{{ $fq->id }}" aria-expanded="true"
                            aria-controls="collapseOne" style="background-color:#364d74; color:white">
                            <strong>{{ $fq->program }}<strong>
>>>>>>> 4b968ba71da0fb852f35452ce3772140efdb6938
                        </button>
                    </h2>
                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                        aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach ($faq->program as $fq)
                                    <li>
                                        <h3>{{ $fq->questions }}</h3>
                                        <p>{{ $fq->answers }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
