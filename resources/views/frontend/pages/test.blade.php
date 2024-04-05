@extends('frontend.layouts.layout')
@section('title')

    <head>
        <title>{{ $language->name }} | Grow Digital Care</title>
        <meta name="description" content="{{ $language->name }}" />
        <meta name="keywords" content="Growdigitalcare" />
    </head>
@endsection
@section('content')
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger">
    {{ Session::get('error') }}
    @php
        Session::forget('error');
    @endphp
</div>
@endif
   <!-- breadcrumbarea__section__start -->
   <div class="breadcrumbarea" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__content__wraper">
                    <div class="breadcrumb__title">
                        <h2 class="heading">Language</h2>
                    </div>
                    <div class="breadcrumb__inner">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Test (Quiz)</li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div class="shape__icon__2">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__1" src="{{asset('assets')}}/img/herobanner/herobanner__1.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__2" src="{{asset('assets')}}/img/herobanner/herobanner__2.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__3" src="{{asset('assets')}}/img/herobanner/herobanner__3.png" alt="photo">
        <img loading="lazy"  class=" shape__icon__img shape__icon__img__4" src="{{asset('assets')}}/img/herobanner/herobanner__5.png" alt="photo">
    </div>

</div>
<!-- breadcrumbarea__section__end-->


<!-- tution__section__start -->
<div class="tution sp_bottom_100 sp_top_100">
<div class="container-fluid full__width__padding">

<div class="row">
    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">

        <div class="accordion content__cirriculum__wrap" id="accordionExample">
            
            @foreach($relatedLanguages as $index => $relatedLanguage)
                     
       
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button collapsed"
                     type="button" data-bs-toggle="collapse" 
                     data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                        {{ $relatedLanguage->name }} 
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="scc__wrap">
                            <div class="scc__info">
                                <i class="icofont-file-text"></i>
                                <h5> <a href="{{ route('language_test', ['slug' => $relatedLanguage->slug]) }}"><span>Quiz</span></a></h5>
                            </div>
                            <div class="scc__meta">
                                {{-- <strong>3.27</strong> --}}
                                <a href="{{ route('language_test', ['slug' => $relatedLanguage->slug]) }}"><img src="{{ asset('/uploads/language/' . $relatedLanguage->image) }}" alt="" style="width: 80px;height: 60px"></a>
                                
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
            @endforeach
            
         

        </div>
    </div>
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
        @if (count($questions) > 0)
        <div class="lesson__quiz__wrap">

         
            <form method="post" action="{{ route('test.submit', ['languageId' => $language->id]) }}">
                @csrf
                @foreach ($questions as $index => $question)
            @php
            $alreadyAttempted = $existingAttempt && $existingAttempt->answers->where('question_id', $question->id)->count() > 0;
        @endphp

        @if (!$alreadyAttempted)

            <div class="quiz__single__attemp">
                <ul>
                    <li>Question : {{ $loop->iteration }}/{{ $questions->count() }} | </li>
                    <li>Attempts allowed : 1</li>
                    <li> | Language : {{$language->name}}</li>
                </ul>
                <hr class="hr" />
                <h3>{{ $question->question }}</h3>
                <div class="row">
                    <div class="col-md-6">
                        @foreach ($question->options as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="question_{{ $index }}" value="{{ $option->optionA }}" id="option{{ $loop->parent->index }}{{ $loop->index }}">
                            <label class="form-check-label" for="option{{ $loop->parent->index }}{{ $loop->index }}">
                                {{ $option->optionA }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="question_{{ $index }}" value="{{ $option->optionB }}" id="option{{ $loop->parent->index }}{{ $loop->index }}">
                            <label class="form-check-label" for="option{{ $loop->parent->index }}{{ $loop->index }}">
                                {{ $option->optionB }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="question_{{ $index }}" value="{{ $option->optionC }}" id="option{{ $loop->parent->index }}{{ $loop->index }}">
                            <label class="form-check-label" for="option{{ $loop->parent->index }}{{ $loop->index }}">
                                {{ $option->optionC }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="question_{{ $index }}" value="{{ $option->optionD }}" id="option{{ $loop->parent->index }}{{ $loop->index }}">
                            <label class="form-check-label" for="option{{ $loop->parent->index }}{{ $loop->index }}">
                                {{ $option->optionD }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add similar code for the other options (optionB, optionC, optionD) -->
                </div>
            </div>
            <br><br><br>
            @endif
            @endforeach
    

           

            <button class="default__button" type="submit"> Quiz Submit
                <i class="icofont-long-arrow-right"></i>
            </button>
        </form>
            @else
            <p>No questions available for this subject.</p>
            @endif
            <br><br><br>

       

        </div>
    </div>

</div>
</div>
</div>
<!-- tution__section__end -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentQuestion = 0;
        const totalQuestions = {{ count($questions) }};

        function showQuestion(index) {
            document.querySelectorAll('.question').forEach(q => q.style.display = 'none');
            document.querySelector(`.question-${index}`).style.display = 'block';
            document.getElementById('questionCounter').textContent = `${index + 1} of ${totalQuestions}`;
        }

        document.getElementById('nextBtn').addEventListener('click', function() {
            currentQuestion = Math.min(currentQuestion + 1, totalQuestions - 1);
            showQuestion(currentQuestion);
        });

        document.getElementById('prevBtn').addEventListener('click', function() {
            currentQuestion = Math.max(currentQuestion - 1, 0);
            showQuestion(currentQuestion);
        });

        showQuestion(currentQuestion);
    });
</script>
@endsection